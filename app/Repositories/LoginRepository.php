<?php
namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;

class LoginRepository
{
    public function manage($credentials){
        return response()->json([
            'status'        => ApiOutputStatus::SUCCESS,
            'status_code'   => ApiOutputStatusCode::SUCCESS,
            'message'       => __('success.authed'),
            'data' => [
                'email' => $credentials['email']
            ]
        ], 200);
    }
}
