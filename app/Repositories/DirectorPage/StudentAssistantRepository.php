<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Http\Controllers\Helpers\ApiHelper;
use App\Models\Tables\RegisterInfo;
use App\Models\Tables\RoomModel;
use App\Models\User;

class StudentAssistantRepository
{
    use ApiHelper;

    public function manage($assistantType)
    {
        $roomModel = new RoomModel();
        $userInfo = new RegisterInfo();
        $params['gender'] = $this->userGender();
        $params['assistantType'] = $assistantType;

        $assistants = $userInfo->assistantList($params);

//        $assistants = User::with('assistantInfo', 'speciality', 'room')
//            ->where('status', $assistantType)
//            ->paginate(5);


        if($assistantType == 'h'){
            $params['roomType'] = 1;
        }
        elseif ($assistantType == 'k'){
            $params['roomType'] = 2;
        }

        $rooms = $roomModel->getRooms($params);

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => [
                'assistants' => $assistants,
                'rooms' => $rooms
            ]
        ], 200);
    }
}
