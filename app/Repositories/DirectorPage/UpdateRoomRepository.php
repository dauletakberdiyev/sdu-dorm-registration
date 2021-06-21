<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Services\AssistantService;

class UpdateRoomRepository
{
    public function manage($request)
    {
        $params['applicant_id'] = $request['applicant_id'];
        $params['room_id'] = $request['room_id'];
        $params['old_room_id'] = $request['old_room_id'];

        $uRes = AssistantService::updateAssistantRoom($params);

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
