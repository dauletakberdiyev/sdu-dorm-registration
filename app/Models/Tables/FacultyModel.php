<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyModel extends Model
{
    use HasFactory;

    protected $table = 'faculty_title';

    protected $primaryKey = 'faculty_code';
    protected $keyType = 'string';
    public $incrementing = false;
}
