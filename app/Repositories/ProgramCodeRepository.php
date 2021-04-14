<?php

namespace App\Repositories;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\ProgramModel;

class ProgramCodeRepository
{
    public function manage($credentials){
        $programCode = ProgramModel::select(
            'program_code as id',
            'title_en as title'
            )
            ->where('faculty_code',$credentials->faculty_code)
            ->get()->toArray();

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $programCode,
        ], 200);
    }
}
