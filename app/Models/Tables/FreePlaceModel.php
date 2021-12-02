<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FreePlaceModel extends Model
{
    use HasFactory;

    protected $table = 'free_place';
    protected $primaryKey = 'building_id';
    public $timestamps = false;

    public function getFreePlace($params){
        return DB::table($this->table, 'fp')
            ->select('fp.place_count')
            ->where('fp.building_id', $params['building_id'])
            ->first();
    }

    public function getFreePlaceGeneral(){
        return DB::table($this->table, 'fp')
            ->get()->toArray();
    }
}
