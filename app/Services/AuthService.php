<?php

namespace App\Services;

use App\Models\Tables\RegisterInfo;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthService
{
    public static function checkLoginCredentials($params){
        try {
            $user = User::where('applicant_email', $params['email'])->firstOrFail();
            if (md5($params['password']) !== $user->password) return 0;
            return 1;
        }catch (\Exception $err){
            return 0;
        }
    }
}
