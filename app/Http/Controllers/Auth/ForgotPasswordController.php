<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use App\Models\ResetPassword;
use App\Notification\ResetPasswordNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

abstract class ForgotPasswordController extends Controller
{

    public function sendReset(Request $request)
    {
        $data = $request->all('email');

        $validator = $this->validator($data);
        if ($validator->fails())
            return $this->liteResponse(config('code.request.VALIDATION_ERROR'), $validator->errors(),"Account not found");

        try {
            $model = $this->getModel($data["email"]);
            $data['code'] = random_int(100000, 999999);
            $data['token'] = Hash::make($data["email"]);
            $data['model'] = basename(get_class($model));
            $data['created_at'] = Carbon::now();
            self::destroy($data);
            $this->create($data);
            Notification::send($model, new ResetPasswordNotification($data['token'], $data['code']));
            return $this->liteResponse(config('code.request.SUCCESS'));
        } catch (Exception $exception) {
            return $this->liteResponse(config('code.request.FAILURE'),null, $exception->getMessage());
        }
    }

    abstract function getModel($email): BaseModel;

    /**
     * Destroy reset in database
     *
     * @param array $data
     */
    public static function destroy(array $data)
    {
        ResetPassword::where('model', $data['model'])->where('email', $data['email'])->delete();
    }

    public function create(array $data): Model
    {
        return ResetPassword::create($data);
    }
}
