<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\ResponseParser\DefResponse;
use App\Models\BaseModel;
use App\Models\ResetPassword;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

abstract class ResetPasswordController extends Controller
{

    public function reset(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, $this->rules());
        if ($validator->fails()) {
            return $this->liteResponse(config('code.request.VALIDATION_ERROR'), $validator->errors());
        }

        try {
            //get unexpired token
            $resetPassword = ResetPassword::where('code', $data['code'])->where('email', $data['email'])
                ->where('created_at', '>', Carbon::now()->subHours(2))
                ->first();

            //check if code exist
            if ($resetPassword === null) {
                return $this->liteResponse(config('code.request.EXPIRED'));
            }

            //update user password
            $resetResult = new DefResponse($this->resetPassword($request));
            if ($resetResult->isSuccess()) {
                //Drop Reset record
                ForgotPasswordController::destroy($resetPassword->toArray());
                //Login the user
                return (new LoginController())->login($request);
            } else {
                return $resetResult->getResponse();
            }
        } catch (Exception $exception) {
            return $this->liteResponse(config('code.request.FAILURE'), null, $exception->getMessage());
        }
    }

    protected function rules()
    {
        return [
            'email' => 'required',
            'code' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Change user password
     *
     * @param Request $request
     *
     */
    public function resetPassword(Request $request)
    {
        $data = $request->all(['email', 'password']);

        $model = $this->getModel($data["email"]);
        if (empty($model)) {
            return $this->liteResponse(config('code.token.USER_NOT_FOUND'));
        }
        try {
            if (Hash::check($data['password'], $model->password)) {
                return $this->liteResponse(config('code.request.FAILURE'), null, 'Please use a different password from the current');
            }
            $model->update([
                'password' => Hash::make($data['password']),
            ]);
            return $this->liteResponse(config('code.request.SUCCESS'));
        } catch (\Exception $exception) {
            return $this->liteResponse(config('code.request.FAILURE'), null, $exception->getMessage());
        }
    }

    abstract function getModel($email): BaseModel;
}
