<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\RoomModel;
use App\Models\User;

class StudentAssistantRepository
{
    public function manage($assistantType)
    {
        $roomModel = new RoomModel();

        $assistants = User::with('assistantInfo', 'speciality', 'room')
            ->where('status', $assistantType)
            ->paginate(5);

        $params = array();
        $params['buildingId'] = 0;

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
