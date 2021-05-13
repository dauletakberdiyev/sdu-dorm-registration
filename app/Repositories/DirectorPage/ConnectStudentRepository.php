<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Services\AssistantService;

class ConnectStudentRepository
{
    public function manage($credentials){
        $info = [];

        $info['applicant_id'] = $credentials['applicant_id'];
        $info['assistant_id'] = $credentials['assistant_id'];

        $uRes = AssistantService::connectStudent($info);

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
