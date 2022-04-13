<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, [
            'email' => 'bail|required|email|max:60',
            'password' => 'bail|required|min:6|max:20',
        ]);

        if ($validator->fails())
            return $this->liteResponse(config("code.request.VALIDATION_ERROR"), $validator->errors());

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->liteResponse(config('code.auth.WRONG_CREDENTIALS'), null, 'Invalid email or password');
            }
            JWTAuth::setToken($token);
            $user = JWTAuth::toUser();
        } catch (Exception $e) {
            return $this->liteResponse(config('code.request.FAILURE'),null, $e->getMessage());
        }
        return $this->liteResponse(config('code.request.SUCCESS'), $user,null, $token);
    }

    public function logout(Request $request)
    {
        JWTAuth::parseToken()->invalidate();
        return $this->liteResponse(config('code.request.SUCCESS'));
    }
}
