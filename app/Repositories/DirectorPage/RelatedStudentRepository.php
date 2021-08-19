<?php

namespace App\Repositories\DirectorPage;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Http\Controllers\Helpers\ApiHelper;
use App\Models\Tables\RegisterInfo;

class RelatedStudentRepository
{
    use ApiHelper;

    public function manage($credentials, $isAssistant = 0){
        $students = new RegisterInfo();

        $credentials['gender'] = $this->userGender();

        $students = $students->relatedStudents($credentials, $isAssistant);

        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => $students
        ], 200);
    }
}
