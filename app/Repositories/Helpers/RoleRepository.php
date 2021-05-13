<?php

namespace App\Repositories\Helpers;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use Illuminate\Support\Facades\Auth;

class RoleRepository
{
    public function manage(){
        $role = Auth::user()->getUserRole();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $role
        ], 200);
    }
}
