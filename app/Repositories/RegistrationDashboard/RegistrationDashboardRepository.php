<?php

namespace App\Repositories\RegistrationDashboard;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use Illuminate\Support\Facades\Auth;

class RegistrationDashboardRepository
{
    public function manage($credentials){
        $user = Auth::user();

        $applicant_id = $user->applicant_id;

        $filename = time().'.png';

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => [
                'data' => $applicant_id
            ]
        ], 200);
    }
}
