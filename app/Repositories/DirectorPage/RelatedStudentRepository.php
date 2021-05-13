<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\RegisterInfo;

class RelatedStudentRepository
{
    public function manage($credentials){
        $students = new RegisterInfo();
        $students = $students->relatedStudents($credentials);

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $students
        ], 200);
    }
}
