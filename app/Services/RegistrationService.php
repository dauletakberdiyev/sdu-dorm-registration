<?php

namespace App\Services;

use App\Models\Tables\ParentInfoModel;
use App\Models\Tables\RegisterInfo;
use App\Models\Tables\ResindentModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    public static function updateStudent($params){
        $uRes = DB::transaction(function () use ($params){
            DB::select('call updateStudent(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@uRes)',
                array(
                    $params['firstName'],$params['lastName'],$params['father'],
                    $params['birthDate'],$params['city'],$params['facultyCode'],
                    $params['programCode'],$params['course'],$params['school'],
                    $params['address'],$params['fatherNumber'],$params['motherNumber'],
                    $params['selfNumber'],$params['passportPath'],$params['applicantId'],
                    $params['registerYear'],$params['registerTerm'],$params['fatherName'],
                    $params['gender'],$params['iin'],$params['motherName'],$params['photoPath'],
                ));
            return DB::select('select @uRes as uRes');
        });

        return $uRes;
    }

    public static function createStudent($params){
        $uRes = DB::transaction(function () use ($params) {
            DB::select('call insertNewStudent(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@uRes)',
                array(
                    $params['firstName'],$params['lastName'],$params['father'],
                    $params['birthDate'],$params['city'],$params['facultyCode'],
                    $params['programCode'],$params['course'],$params['school'],
                    $params['address'],$params['fatherNumber'],$params['motherNumber'],
                    $params['selfNumber'],$params['passportPath'], $params['registerYear'],
                    $params['registerTerm'],$params['fatherName'], $params['gender'],
                    $params['iin'],$params['motherName'],$params['photoPath'],
                    $params['applicantEmail'],$params['agreement'],
                ));
            return DB::select('select @uRes as uRes');
        });

        return $uRes;
    }

    public static function uploadCheckImage($image, $folderTitle, $iin){
        $user = Auth::user();
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $path = public_path('uploads').'/'.$iin.'/'.$folderTitle;
        $image->move($path, $imageName);

        $pathName = $path.'/'.$imageName;

        return $pathName;
    }

    public static function acceptStudent($params){
        $uRes = DB::transaction(function () use ($params) {
            DB::select('call acceptStudent(?,@uRes)',
                array(
                    $params['applicant_id'],
                ));
            return DB::select('select @uRes as uRes');
        });

        return $uRes;
    }

    public static function createStudentNew($params){
         return DB::transaction(function () use ($params){
             $dormRegister = new User();
             $dormRegister->applicant_email = $params['applicantEmail'];
             $dormRegister->status = 'w';
             $dormRegister->registration_year = $params['registerYear'];
             $dormRegister->registration_term = $params['registerTerm'];

             $dormRegister->save();

             $dormRegisterInfo = new RegisterInfo();
             $dormRegisterInfo->first_name = $params['firstName'];
             $dormRegisterInfo->last_name = $params['lastName'];
             $dormRegisterInfo->father = $params['father'];
             $dormRegisterInfo->father = $params['father'];
             $dormRegisterInfo->birth_date = $params['birthDate'];
             $dormRegisterInfo->gender = $params['gender'];
             $dormRegisterInfo->gender = $params['gender'];
             $dormRegisterInfo->iin = $params['iin'];
             $dormRegisterInfo->city = $params['city'];
             $dormRegisterInfo->faculty_code = $params['facultyCode'];
             $dormRegisterInfo->program_code = $params['programCode'];
             $dormRegisterInfo->course = $params['course'];
             $dormRegisterInfo->school = $params['school'];
             $dormRegisterInfo->address = $params['address'];
             $dormRegisterInfo->self_number = $params['selfNumber'];
             $dormRegisterInfo->passport_path = $params['passportPath'];
             $dormRegisterInfo->photo_path = $params['photoPath'];
             $dormRegisterInfo->agreement = $params['agreement'];

             $dormRegisterInfo->save();

             $parentInfo = new ParentInfoModel();
             $parentInfo->mother_name_surname = $params['motherName'];
             $parentInfo->mother_number = $params['motherNumber'];
             $parentInfo->father_name_surname = $params['fatherName'];
             $parentInfo->father_number = $params['fatherNumber'];

             $parentInfo->save();

             $residentInfo = new ResindentModel();
             $residentInfo->is_active = 0;
             $residentInfo->deposit = 15000;
             $residentInfo->deposit_status = 1;
             $residentInfo->save();

             return 1;
        });
    }
}
