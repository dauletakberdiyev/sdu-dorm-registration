<?php


namespace App\Repositories;


use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\StudyTypeModel;

class StudyTypeRepository
{
    public function manage(){
        $data = StudyTypeModel::select(
            'study_type_code as id',
            'study_title_en as title'
            )->get()->toArray();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $data
        ], 200);
    }
}
