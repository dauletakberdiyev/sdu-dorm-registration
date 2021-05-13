<?php

namespace App\Repositories\AdminSideBar;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminSideBarRepository
{
    public function manage(){
        $userInfo = User::with('info')
            ->select('applicant_email', 'applicant_id')
            ->where('applicant_id', Auth::user()->applicant_id)
            ->first();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $userInfo
        ], 200);
    }
}
