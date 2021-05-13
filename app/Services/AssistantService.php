<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class AssistantService
{
    public static function createAssistant($params){
        return DB::transaction(function () use ($params){
            DB::select('call createAssistant(?,?,?,?,?,?,?,?,?,@uRes)',
                array(
                    $params['email'],$params['first_name'],$params['last_name'],
                    $params['faculty_code'],$params['program_code'],$params['course'],
                    $params['self_number'],$params['room_id'],$params['status'],
                ));

            return DB::select('select @uRes as uRes');
        });
    }

    public static function updateAssistant($params){
        return DB::transaction(function () use ($params){
            DB::select('call updateAssistant(?,?,?,?,?,?,?,?,?,@uRes)',
                array(
                    $params['email'],$params['first_name'],$params['last_name'],
                    $params['faculty_code'],$params['program_code'],$params['course'],
                    $params['self_number'],$params['room_id'],$params['applicant_id'],
                ));

            return DB::select('select @uRes as uRes');
        });
    }

    public static function connectStudent($params){
        return DB::transaction(function () use ($params){
           DB::select('call connectStudent(?,?,@uRes)',
               array(
                   $params['applicant_id'], $params['assistant_id']
               ));

           return DB::select('select @uRes as uRes');
        });
    }
}
