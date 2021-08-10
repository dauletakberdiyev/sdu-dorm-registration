<?php

namespace App\Services;

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
        $path = public_path('uploads').'\\'.$iin.'\\'.$folderTitle;
        $image->move($path, $imageName);

        $pathName = $path.'\\'.$imageName;

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
}
