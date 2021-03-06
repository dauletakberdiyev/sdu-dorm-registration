<?php

namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ResetPasswordRepository
{
    public function manage($credentials){
        try {
            $decrypted = Crypt::decryptString($credentials->token);
            $data = explode("$", $decrypted);

            $due = strtotime($data[1]);
            $now = strtotime('now');

            if ($now < $due) {

                $newPassword = $credentials->new_password;
                $email = $data[0];

                $uRes = DB::transaction(function () use($email, $newPassword){
                    DB::select('call updatePassword(?,?,@uRes)', array($email, $newPassword));
                    return DB::select('select @uRes as uRes');
                });

                if($uRes[0]->uRes == 1){
                    return response()->json([
                        'status' => ApiOutputStatus::SUCCESS,
                        'status_code' => ApiOutputStatusCode::SUCCESS,
                        'message' => __('success.password_changed'),
                        'data' => []
                    ], 200);
                }

                return response()->json([
                    'status' => ApiOutputStatus::ERROR,
                    'status_code' => ApiOutputStatusCode::ERROR,
                    'message' => __('error.reset_database_error'),
                    'data' => []
                ], 406);
            }

            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('error.token_expired'),
                'data' => []
            ], 406);

        } catch (DecryptException $e) {
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('error.token_not_valid'),
                'data' => []
            ], 406);
        }
    }
}
