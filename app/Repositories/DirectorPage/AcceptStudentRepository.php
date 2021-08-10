<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Services\RegistrationService;

class AcceptStudentRepository
{
    public function manage($request){
        $uRes = RegistrationService::acceptStudent($request);

        if($uRes[0]->uRes == 1) {
            return response()->json([
                'status' => ApiOutputStatus::SUCCESS,
                'status_code' => ApiOutputStatusCode::SUCCESS,
                'message' => __('success.success'),
                'data' => $uRes
            ], 200);
        }

        return response()->json([
            'status' => ApiOutputStatus::ERROR,
            'status_code' => ApiOutputStatusCode::ERROR,
            'message' => __('error.insert_database_error'),
            'data' => []
        ], 406);
    }
}
