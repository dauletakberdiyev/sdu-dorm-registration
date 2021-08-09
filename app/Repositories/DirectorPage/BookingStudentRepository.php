<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\User;

class BookingStudentRepository
{
    public function manage($request){
        $user = new User();

        $params['gender'] = $request['building_id'];
        $bookingStudents = $user->bookingStudents($params);

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => [
                'bookingStudents' => $bookingStudents
            ]
        ], 200);
    }
}
