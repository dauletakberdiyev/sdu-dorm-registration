<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterInfo extends Model
{
    use HasFactory;

    protected $table = 'dorm_register_info';

    protected $primaryKey = 'applicant_id';
}
