<?php

namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\FacultyModel;

class FacultyCodeRepository
{
    public function manage(){
        $facultyTitle = FacultyModel::select(
            'faculty_code as id',
            'title_en as title'
            )->get()->toArray();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $facultyTitle
        ], 200);
    }
}
