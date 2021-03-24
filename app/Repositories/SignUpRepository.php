<?php

namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SignUpRepository
{
    public function manage($credentials){

        $email = $credentials['email'];
        $password = $credentials['password'];

        $existUser = User::where('applicant_email',$email)->first();

        if(!is_null($existUser)){
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('error.already_exist_user'),
                'data' => []
            ], 406);
        }

        $uRes = DB::transaction(function () use($email, $password){
            DB::select('call insertNewRegister(?,?,@uRes)', array($email, $password));
            return DB::select('select @uRes as uRes');
        });


        if($uRes[0]->uRes == 1){
            $temp = User::where('applicant_email', $email)->first();
            Auth::login($temp);

            $user = Auth::user();
            $token = $user->createToken(env('APP_PASSPORT_KEY'));

            $user->assignRole('user');

            return response()->json([
                'status' => ApiOutputStatus::SUCCESS,
                'status_code' => ApiOutputStatusCode::SUCCESS,
                'message' => __('success.signup'),
                'data' => [
                    "token_type"    => "Bearer",
                    "expires_in"    => $token->token->expires_at->diffInSeconds(Carbon::now()),
                    'access_token'  => $token->accessToken,
                ]
            ], 200);
        }

        return response()->json([
            'status' => ApiOutputStatus::ERROR,
            'status_code' => ApiOutputStatusCode::ERROR,
            'message' => __('error.signup_database_error'),
            'data' => [
                'uRes' => $uRes
            ]
        ], 406);

    }
}
