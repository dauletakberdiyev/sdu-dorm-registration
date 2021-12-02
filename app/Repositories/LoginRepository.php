<?php
namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Http\Controllers\Helpers\DB\MySqlProcedure;
use App\Models\User;
use App\Services\AuthService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginRepository
{
    public function manage($credentials){

        $isVerified = AuthService::checkLoginCredentials($credentials);

        if($isVerified > 0) {
            $temp = User::where('applicant_email', $credentials['email'])->first();
            Auth::login($temp);

            $user = Auth::user();
            $token = $user->createToken(env('APP_PASSPORT_KEY'));
            $userRole = $user->getUserRole();

            return response()->json([
                'status' => ApiOutputStatus::SUCCESS,
                'status_code' => ApiOutputStatusCode::SUCCESS,
                'message' => __('success.authed'),
                'data' => [
                    "token_type"    => "Bearer",
                    "expires_in"    => $token->token->expires_at->diffInSeconds(Carbon::now()),
                    'access_token'  => $token->accessToken,
                    'user'          => $user->toArray(),
                    'user_role'     => $userRole
                ]
            ], 200);
        }
        else{
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('auth.failed'),
                'data' => []
            ], 406);
        }
    }
}
