<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentInfoModel extends Model
{
    use HasFactory;

    protected $table = 'parent_info';
    protected $primaryKey = 'applicant_id';
    public $timestamps = false;
}
