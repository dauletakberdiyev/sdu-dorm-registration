<?php

namespace App\Repositories\AccountingPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\RegisterInfo;
use Illuminate\Support\Facades\Auth;

class AccountingPageRepository
{
    public function manage(){
        $studentsList = RegisterInfo::with('email', 'gender', 'faculty_code', 'program_code', 'resident_info')
            ->get()->toArray();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $studentsList
        ], 200);
    }
}
