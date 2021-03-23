<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    public static function updateStudent($params){
        $uRes = DB::transaction(function () use ($params){
            DB::select('call updateStudent(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@uRes)',
                array(
                    $params['firstName'],$params['lastName'],$params['father'],
                    $params['birthDate'],$params['city'],$params['typeOfStudy'],
                    $params['facultyCode'],$params['programCode'],$params['course'],
                    $params['school'],$params['address'],$params['fatherNumber'],
                    $params['motherNumber'],$params['selfNumber'],$params['checkPath'],
                    $params['applicantId'],$params['registerYear'],$params['registerTerm']
                ));
            return DB::select('select @uRes as uRes');
        });

        return $uRes;
    }

    public static function createStudent($params){
        $uRes = DB::transaction(function () use ($params) {
            DB::select('call insertNewStudent(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,@uRes)',
                array(
                    $params['firstName'], $params['lastName'], $params['father'],
                    $params['birthDate'], $params['city'], $params['typeOfStudy'],
                    $params['facultyCode'], $params['programCode'], $params['course'],
                    $params['school'], $params['address'], $params['fatherNumber'],
                    $params['motherNumber'], $params['selfNumber'], $params['checkPath'],
                    $params['applicantId'], $params['registerYear'], $params['registerTerm']
                ));
            return DB::select('select @uRes as uRes');
        });

        return $uRes;
    }

    public static function uploadCheckImage($image){
        $user = Auth::user();
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $path = public_path('uploads').'\\'.$user->applicant_id;
        $image->move($path, $imageName);

        $pathName = $path.'\\'.$imageName;

        return $pathName;
    }
}
