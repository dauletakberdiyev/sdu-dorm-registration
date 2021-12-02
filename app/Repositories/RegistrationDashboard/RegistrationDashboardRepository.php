<?php

namespace App\Repositories\RegistrationDashboard;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\DB;

class RegistrationDashboardRepository
{
    public function manage($credentials){
        $userIin = DB::table('dorm_register_info', 'dri')
            ->select('dri.iin')
            ->where('dri.iin', $credentials->input('iin'))
            ->first();

        if (isset($userIin->iin) && $credentials->input('iin') === $userIin->iin){
            return response()->json([
                'status' => ApiOutputStatus::ERROR,
                'status_code' => ApiOutputStatusCode::ERROR,
                'message' => __('error.already_exist_user'),
                'data' => []
            ], 406);
        }

//        if (intval($credentials->input('course')) === 1){
//            return response()->json([
//                'status' => ApiOutputStatus::ERROR,
//                'status_code' => ApiOutputStatusCode::ERROR,
//                'message' => __('error.first_course_student'),
//                'data' => []
//            ], 406);
//        }

        $infoArray = [];

        $passportPath = '';
        $photoPath = '';

//        if($credentials->hasFile('passportPhoto')){
//            $passportPath = RegistrationService::uploadCheckImage($credentials->file('passportPhoto'),'passport', $credentials->input('iin'));
//        }
//        if($credentials->hasFile('personalPhoto')){
//            $photoPath = RegistrationService::uploadCheckImage($credentials->file('personalPhoto'), 'photo', $credentials->input('iin'));
//        }
//        else{
//            // TODO: Implement else method.
//        }

        $infoArray['firstName'] = $credentials->input('firstName');
        $infoArray['lastName'] = $credentials->input('lastName');
        $infoArray['father'] = $credentials->input('father');
        $infoArray['birthDate'] = $credentials->input('birthDate');
        $infoArray['city'] = $credentials->input('city');
        $infoArray['facultyCode'] = $credentials->input('facultyCode');
        $infoArray['programCode'] = $credentials->input('programCode');
        $infoArray['course'] = $credentials->input('course');
        $infoArray['school'] = $credentials->input('school');
        $infoArray['address'] = $credentials->input('address');
        $infoArray['fatherNumber'] = $credentials->input('fatherNumber');
        $infoArray['motherNumber'] = $credentials->input('motherNumber');
        $infoArray['selfNumber'] = $credentials->input('selfNumber');
        $infoArray['passportPath'] = $passportPath;
        $infoArray['photoPath'] = $photoPath;
        $infoArray['applicantEmail'] = $credentials->input('email');
        $infoArray['registerYear'] = 2020;
        $infoArray['registerTerm'] = 2;
        $infoArray['gender'] = $credentials->input('gender');
        $infoArray['iin'] = $credentials->input('iin');
        $infoArray['motherName'] = $credentials->input('motherName');
        $infoArray['fatherName'] = $credentials->input('fatherName');
        ($credentials->input('agree'))? $infoArray['agreement'] = 1 : $infoArray['agreement'] = 0;
        //$infoArray['agreement'] = $credentials->input('agree');

        $uRes = RegistrationService::createStudent($infoArray);

        if($uRes == 1){
            return response()->json([
                'status' => ApiOutputStatus::SUCCESS,
                'status_code' => ApiOutputStatusCode::SUCCESS,
                'message' => __('success.success'),
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => ApiOutputStatus::ERROR,
            'status_code' => ApiOutputStatusCode::ERROR,
            'message' => __('error.insert_database_error'),
            'data' => []
        ], 406);
    }
}
