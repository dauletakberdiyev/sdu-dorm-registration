<?php

namespace App\Repositories\RegistrationDashboard;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;
use App\Models\Tables\RegisterInfo;
use App\Services\RegistrationService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationDashboardRepository
{
    public function manage($credentials){
        $user = Auth::user();

        $infoArray = [];

        if($credentials->hasFile('passportPhoto')){
            $pathName = RegistrationService::uploadCheckImage($credentials->file('passportPhoto'));
        }
        else{
            // TODO: Implement else method.
        }

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
        $infoArray['passportPath'] = $pathName;
        $infoArray['applicantId'] = $user->applicant_id;
        $infoArray['registerYear'] = 2020;
        $infoArray['registerTerm'] = 2;
        $infoArray['gender'] = $credentials->input('gender');
        $infoArray['iin'] = $credentials->input('iin');
        $infoArray['motherName'] = $credentials->input('motherName');
        $infoArray['fatherName'] = $credentials->input('fatherName');

        if(RegisterInfo::where('applicant_id', $infoArray['applicantId'])->first()){
            $uRes = RegistrationService::updateStudent($infoArray);
        }
        else {
            $uRes = RegistrationService::createStudent($infoArray);
        }

        if($uRes[0]->uRes == 1){
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
