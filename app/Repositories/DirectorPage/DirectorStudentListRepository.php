<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\RegisterInfo;
use App\Models\Tables\RoomModel;
use App\Models\User;

class DirectorStudentListRepository
{
    public function manage($request){
        $userModel = new User();
        $roomModel = new RoomModel();

        $params['roomType'] = 0;
        $params['buildingId'] = $request['building_id'];
        $params['sortBy'] = $request['sort_by'];
        $params['desc'] = $request['desc'];
        $params['search_value'] = $request['search_value'];

        $studentsList = $userModel->studentList($params);

        $rooms = $roomModel->getRooms($params);

        $assistants = User::with('assistantInfo')
            ->select('applicant_id',
                'applicant_email',
                'status'
            )
            ->where('status', 'h')
            ->get()->toArray();

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
