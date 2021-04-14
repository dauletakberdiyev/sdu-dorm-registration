<?php

namespace App\Models\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterInfo extends Model
{
    use HasFactory;

    protected $table = 'dorm_register_info';

    protected $primaryKey = 'applicant_id';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function email(){
        return $this->hasOne(User::class, 'applicant_id')
            ->select('applicant_id', 'applicant_email');
    }

    public function gender(){
        return $this->hasOne(GenderModel::class, 'id', 'gender')
            ->select('id', 'gender_title_en');
    }

    public function faculty_code(){
        return $this->hasOne(FacultyModel::class, 'faculty_code', 'faculty_code')
            ->select('faculty_code', 'title_en');
    }

    public function program_code(){
        return $this->hasOne(ProgramModel::class, 'program_code', 'program_code')
            ->select('program_code', 'title_en');
    }

    public function resident_info(){
        return $this->hasOne(ResindentModel::class, 'applicant_id')
            ->select('applicant_id', 'is_active', 'deposit', 'deposit_status');
    }
}
