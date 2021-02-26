<?php
namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Http\Controllers\Helpers\DB\MySqlProcedure;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginRepository
{
    public function manage($credentials){
        $mail = $credentials['email'];
        $pass = $credentials['password'];

        DB::select('call checkMailPassword(?,?,@isVerified)',array($mail, $pass));
        $isVerified = DB::select('select @isVerified as isVerified');

        if($isVerified[0]->isVerified > 0) {
            $temp = User::where('applicant_email', $mail)->first();
            Auth::login($temp);

            $user = Auth::user();
            $token = $user->createToken(env('APP_PASSPORT_KEY'));

            return response()->json([
                'status' => ApiOutputStatus::SUCCESS,
                'status_code' => ApiOutputStatusCode::SUCCESS,
                'message' => __('success.authed'),
                'data' => [
                    "token_type"    => "Bearer",
                    "expires_in"    => $token->token->expires_at->diffInSeconds(Carbon::now()),
                    'access_token'  => $token->accessToken,
                    'user'          => $user->toArray()
                ]
            ], 200);
        }
        else{
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('auth.failed'),
                'data' => []
            ], 200);
        }
    }
}
