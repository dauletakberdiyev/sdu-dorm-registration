<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyTypeModel extends Model
{
    use HasFactory;

    protected $table = 'study_type_title';

    protected $primaryKey = 'study_type_code';

}
