<?php

namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SignUpRepository
{
    public function manage($credentials){

        $email = $credentials['email'];
        $password = $credentials['password'];

        $uRes = DB::transaction(function () use($email, $password){
            DB::select('call insertNewRegister(?,?,@uRes)', array($email, $password));
            return DB::select('select @uRes as uRes');
        });

        if($uRes[0]->uRes == 1){
            return response()->json([
                'status' => ApiOutputStatus::SUCCESS,
                'status_code' => ApiOutputStatusCode::SUCCESS,
                'message' => __('success.signup'),
                'data' => []
            ], 200);
        }

        else{
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('error.signup_database_error'),
                'data' => [
                    'uRes' => $uRes
                ]
            ], 200);
        }
    }
}
