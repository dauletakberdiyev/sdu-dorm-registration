<?php

namespace App\Models\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResindentModel extends Model
{
    use HasFactory;

    protected $table = 'dorm_residents';

    protected $primaryKey = 'applicant_id';
}