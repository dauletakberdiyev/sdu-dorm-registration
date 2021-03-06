<?php

namespace App\Repositories;


use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Events\SendForgotPasswordLinkMailEvent;
use App\Models\User;

class ForgotPasswordRepository
{
    /**
     * Handle an incoming request, check if the request user exist in database by using User model.
     * If model gives user it sends user's email an email by generating link with token and return
     * json response with code 200 else 406 status code with error message where errors can be caused by
     * not valid user, attempt limit or not valid captcha.
     * @param  $credentials - passed from App\Http\Controllers\Auth\ForgotPasswordController
     * @return json
     */

    public function manage($credentials){
        $user = User::where('applicant_email', $credentials['email'])->first();

        if(is_null($user) || strlen($credentials->captcha) < 5){
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('error.forgot-password-first-level-validation'),
                'data' => []
            ], 406);
        }

        if($credentials->attempts > 3){
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('auth.throttle-minutes', ['minutes' => 30]),
                'data' => []
            ], 406);
        }

        event(new SendForgotPasswordLinkMailEvent($user));

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success-reset-mail-sent'),
            'data' => []
        ], 200);
    }
}
