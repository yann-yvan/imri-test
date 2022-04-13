<?php

namespace App\Http\Controllers;

use App\Exceptions\LiteResponseException;
use App\Http\ResponseParser\Builder;
use App\Http\ResponseParser\DefResponse;
use App\Models\BaseModel;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    /**
     * @license Apache 2.0
     */

    /**
     * @OA\Info(
     *     description="Lumen base App Documentation | Power By N-Y Corp",
     *     version="1.0.0",
     *     title="Lumen base App Documentation | Power By N-Y Corp",
     *     termsOfService="http://swagger.io/terms/",
     *     @OA\Contact(
     *         email="yann.ngalle@outlook.com"
     *     ),
     *     @OA\License(
     *         name="Apache 2.0",
     *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *     )
     * )
     * @OA\SecurityScheme(
     *   description="User token example Bearer <token-value>",
     *   securityScheme="Bearer",
     *   type="apiKey",
     *   in="header",
     *   name="Authorization"
     * )
     *
     *
     */

    /**
     *
     * * @OA\Tag(
     *     name="Response code",
     *     description="
     *     'TOKEN_EXPIRED' => 1, 'BLACK_LISTED_TOKEN' => 2, 'INVALID_TOKEN' => 3, 'NO_TOKEN' => 4,
     *     'USER_NOT_FOUND' => 5,
     *     'WRONG_JSON_FORMAT' => 6,
     *     'SUCCESS' => 1000, 'FAILURE' => 1001, 'VALIDATION_ERROR' => 1002, 'EXPIRED' => 1003, 'DATA_EXIST' => 1004,
     *     'NOT_AUTHORIZED' => 1005,
     *     'ACCOUNT_NOT_VERIFY' => 1100,'WRONG_USERNAME' => 1101,'WRONG_PASSWORD' => 1102,'WRONG_CREDENTIALS' => 1103,
     *     'ACCOUNT_VERIFIED' => 1104,'NOT_EXISTS' => 1105"
     * )
     * @OA\ExternalDocumentation(
     *     description="Find out more about Swagger",
     *     url="http://swagger.io"
     * )
     */
    const ROOT_DIRECTORY = "upload";
    const DRUG_DIRECTORY = "drugs";

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @param bool  $withUUID
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function save(array $data)
    {
        if (array_key_exists("uuid", $data)) {
            $data["uuid"] = Str::uuid();
        }
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return $this->liteResponse(config('code.request.VALIDATION_ERROR'), $validator->errors());
        }
        try {
            $model = $this->create($data);
            $this->saved($model);
            $response = new DefResponse($this->liteResponse(config('code.request.SUCCESS'), $model));
            return $response->getResponse();
        } catch (\Exception $exception) {
            if ($exception instanceof LiteResponseException) {
                return $this->liteResponse($exception->getCode(), $exception->getData(), $exception->getMessage());
            } else {
                return $this->liteResponse(config("code.request.EXCEPTION"), null, $exception->getMessage());
            }
        }
    }

    public function uuid()
    {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

            // 32 bits for "time_low"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );
    }

    /**
     * Default validator in case of non specification
     *
     * @param $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(&$data)
    {
        return Validator::make($data, ['*' => 'required']);
    }

    /**
     * parsing api response according the specification
     *
     * @param      $code
     * @param null $data
     * @param null $message
     * @param null $token
     *
     * @return array|JsonResponse
     * @throws Exception
     */
    public function liteResponse($code, $data = null, $message = null, $token = null)
    {
        $isJsonResponse = request()->isJson() or request()->isXmlHttpRequest() or request()->ajax();

        $builder = new Builder($code, $message);
        $builder->setData($data);
        $builder->setToken($token);
        return $isJsonResponse ? response()->json($builder->reply(), 200, [], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : $builder->reply();
    }

    /**
     * Default create in case of non specification
     *
     * @param array $data
     *
     * @return Response
     */
    public function create(array $data): Model
    {
        return new BaseModel;
    }

    public function saved(Model $model)
    {

    }

    /**
     * Claim authorization to access remote service
     *
     * @param       $data
     * @param       $microservice
     * @param       $service
     * @param       $method
     *
     * @return array|JsonResponse|mixed
     */
    public function call($data, $microservice, $service, $method = "post")
    {
        $http = Http::baseUrl(env($microservice))
            ->withHeaders([
                'Access-Control-Allow-Origin' => encrypt(request()->url()),
            ]);

        foreach (request()->allFiles() as $key => $file) {
            $http->attach($key, fopen($file->getRealPath(), 'r'), $file->getClientOriginalName(), ['Accept' => $file->getClientMimeType()]);
        }

        $response = $http->{$method}($service, $data);

        if ($response->successful()) {
            return response()->json($response->json());
        }
        return $this->liteResponse(config('code.request.SERVICE_NOT_AVAILABLE'), [
            "context" => $http,
            "remote" => $response,
        ]);
    }

    public function storeFile($fileInputName, $directory = self::ROOT_DIRECTORY)
    {
        $file = request()->file($fileInputName);
        $mediaSet = [];
        if (is_array($file)) {
            foreach ($file as $key => $fileItem) {
                array_push($mediaSet, $this->saveMedia($fileItem, $directory, $key));
            }
            return json_encode($mediaSet);
        } else {
            return $this->saveMedia($file, $directory);
        }
    }

    public function saveMedia($file, $directory = self::ROOT_DIRECTORY, $suffix = '')
    {
        if (empty($file)) {
            return null;
        }

        $path = join('/', [self::ROOT_DIRECTORY, Str::replaceLast('/', '', $directory)]);
        $name = hrtime(true) . "$suffix." . strtolower($file->getClientOriginalExtension());
        return $file->move($path, $name)->getPathname();
    }

    public function switchLang($locale)
    {
        if (in_array($locale, Config::get('app.locales'))) {
            Session::put("locale", $locale);
        }
        return redirect(URL::previous());
    }

    public function cleanPhone($phone)
    {
        $phone = str_replace("+", "", $phone);
        $phone = str_replace("237", "", $phone);
        return $phone;
    }

    protected function respondError($exception)
    {
        return $this->liteResponse(config('code.request.FAILURE'), env("APP_ENV") == "local" ? $exception->getTrace() : null, $exception->getMessage());
    }
}
