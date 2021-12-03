<?php

namespace App\Services;

use App\Models\Tables\ResindentModel;
use App\Models\Tables\RoomModel;
use Illuminate\Support\Facades\DB;

class AssistantService
{
    public static function createAssistant($params){
        return DB::transaction(function () use ($params){
            DB::select('call createAssistant(?,?,?,?,?,?,?,?,?,?,@uRes)',
                array(
                    $params['email'],$params['first_name'],$params['last_name'],
                    $params['faculty_code'],$params['program_code'],$params['course'],
                    $params['self_number'],$params['room_id'],$params['status'],$params['gender']
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
           DB::select('call connectStudent(?,?,?,@uRes)',
               array(
                   $params['applicant_id'],$params['assistant_id'],
                   $params['room_id'],
               ));

           return DB::select('select @uRes as uRes');
        });
    }

    public static function updateAssistantRoom($params){
        return DB::transaction(function () use($params){
           DB::select('call updateAssistantRoom(?,?,?,@uRes)',
               array(
                   $params['applicant_id'],$params['room_id'],$params['old_room_id'],
               ));

           return DB::select('select @uRes as uRes');
        });
    }

    public static function updateAssistantRoomNew($params){
        return DB::transaction(function () use($params){
            ResindentModel::findOrFail($params['applicant_id'])
                ->update([
                    'room_id' => $params['room_id']
                ]);

            RoomModel::findOrFail($params['old_room_id'])
                ->increment('free_place');

            RoomModel::findOrFail($params['room_id'])
                ->decrement('free_place');

            return 1;
        });
    }
}
