<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Http\Controllers\Helpers\ApiHelper;
use App\Models\User;

class BookingStudentRepository
{
    use ApiHelper;

    public function manage($request){
        $user = new User();

        $params['gender'] = $this->userGender();
        $params['search_value'] = $request['search_value'];

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
