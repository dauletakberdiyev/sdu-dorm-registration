<?php

namespace App\Repositories\RegistrationDashboard;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\GenderModel;

class GenderRepository
{
    public function manage(){
        $genderTitle = GenderModel::select(
            'id',
            'gender_title_en as title'
        )->get()->toArray();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $genderTitle,
        ], 200);
    }
}
