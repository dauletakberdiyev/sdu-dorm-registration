<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\RegisterInfo;
use App\Models\User;

class DirectorStudentListRepository
{
    public function manage(){
        $studentsList = new User();
        $studentsList = $studentsList->studentList();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $studentsList
        ], 200);
    }
}
