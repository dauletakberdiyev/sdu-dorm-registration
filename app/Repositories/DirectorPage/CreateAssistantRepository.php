<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Http\Controllers\Helpers\ApiHelper;
use App\Services\AssistantService;

class CreateAssistantRepository
{
    use ApiHelper;

    public function create($credentials, $assistantType)
    {
        $assistantInfo = [];

        $assistantInfo['email'] = $credentials['email'];
        $assistantInfo['first_name'] = $credentials['first_name'];
        $assistantInfo['last_name'] = $credentials['last_name'];
        $assistantInfo['faculty_code'] = $credentials['faculty_code'];
        $assistantInfo['program_code'] = $credentials['program_code'];
        $assistantInfo['course'] = $credentials['course'];
        $assistantInfo['self_number'] = $credentials['self_number'];
        $assistantInfo['room_id'] = $credentials['room_id'];
        $assistantInfo['status'] = $assistantType;
        $assistantInfo['gender'] = $this->userGender();

        $uRes = AssistantService::createAssistant($assistantInfo);

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
