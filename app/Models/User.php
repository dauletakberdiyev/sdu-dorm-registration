<?php

namespace App\Models;

use App\Models\Tables\ProgramModel;
use App\Models\Tables\RegisterInfo;
use App\Models\Tables\ResindentModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    protected $table = 'dorm_register';

    protected $primaryKey = 'applicant_id';

    protected $hidden = [
        'password',
        'check_path',
        'registration_year',
        'registration_term'
    ];

    public function getUserRole(){
        $roles = '';

        foreach (Role::all() as $role){
            if(Auth::user()->hasRole($role->name)){
                $roles = $role->name;
            }
        }

        return $roles;
    }

    public function assistantInfo(){
        return $this->hasOne(RegisterInfo::class, 'applicant_id')
            ->select('applicant_id',
                    'first_name',
                    'last_name',
                    'course',
                    'self_number');
    }

    public function room(){
        return $this->hasOne(ResindentModel::class, 'applicant_id')
            ->select('applicant_id',
                    'room_id');
    }

    public function speciality(){
        return $this->hasOneThrough(ProgramModel::class, RegisterInfo::class,'applicant_id', 'program_code', 'applicant_id', 'program_code')
            ->select('title_en');
    }

    public function studentList(){
        return DB::table($this->table.' as dr')
            ->leftJoin('dorm_register_info as dri', 'dri.applicant_id', '=', 'dr.applicant_id')
            ->leftJoin('dorm_residents as dre', 'dre.applicant_id', '=', 'dr.applicant_id')
            ->leftJoin('rooms as rm', 'rm.id', '=', 'dre.room_id')
            ->leftJoin('faculty_title as ft', 'ft.faculty_code', '=', 'dri.faculty_code')
            ->leftJoin('program_title as pt', 'pt.program_code', '=', 'dri.program_code')
            ->select('dr.applicant_id as id',
                'dr.applicant_email as email',
                'dri.first_name',
                'dri.last_name',
                'dri.city',
                'ft.title_en as faculty',
                'pt.title_en as speciality',
                'dri.school',
                'dri.course',
                'dri.self_number',
                'dre.room_id')
            ->where('dre.is_active', '1')
            ->where('dr.status', '=', 'a')
            ->paginate(10);
    }

    public function info(){
        return $this->hasOne(RegisterInfo::class, 'applicant_id')
            ->select('applicant_id', 'first_name', 'last_name');
    }
}
