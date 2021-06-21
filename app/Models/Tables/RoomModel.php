<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoomModel extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $primaryKey = 'id';

    //return rooms by building_id and roomType
    public function getRooms($params){
        return DB::table($this->table, 'r')
            ->select('r.id as room_id',
                'r.free_place'
            )
            ->where('r.building_id', $params['buildingId'])
            ->where('r.room_type', $params['roomType'])
            ->get()->toArray();
    }

    //return count of free place
    /*public function getFreePlace($params){
        return DB::table($this->table, 'r')
            ->where('r.building_id', $params['building_id'])
            ->where('r.room_type', 0)
            ->sum('r.free_place');
    }*/
}
