<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Http\Controllers\Helpers\ApiHelper;
use App\Models\Tables\RegisterInfo;
use App\Models\Tables\RoomModel;
use App\Models\User;

class DirectorStudentListRepository
{
    use ApiHelper;

    public function manage($request){
        $userModel = new User();
        $roomModel = new RoomModel();
        $userInfo = new RegisterInfo();

        $params['roomType'] = 0;
        $params['sortBy'] = $request['sort_by'];
        $params['desc'] = $request['desc'];
        $params['search_value'] = $request['search_value'];
        $params['gender'] = $this->userGender();

        $studentsList = $userModel->studentList($params);

        $rooms = $roomModel->getRooms($params);

        $assistants = $userInfo->getAssistants($params);

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => [
                'studentList' => $studentsList,
                'rooms' => $rooms,
                'assistants' => $assistants
            ]
        ], 200);
    }
}
