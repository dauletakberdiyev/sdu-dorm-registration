<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait ApiHelper
{
    function getInterfaceLanguage(){
        return request()->header('Content-Language');
    }

    function userGender(){
        $gender = DB::table('dorm_register_info', 'dri')
            ->select('dri.gender')
            ->where('dri.applicant_id', Auth::user()->applicant_id)
            ->first();

        return $gender->gender;
    }
}
