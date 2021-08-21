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

    public function studentList($params){
        $studentList = DB::table($this->table.' as dr')
            ->leftJoin('dorm_register_info as dri', 'dri.applicant_id', '=', 'dr.applicant_id')
            ->leftJoin('dorm_residents as dre', 'dre.applicant_id', '=', 'dr.applicant_id')
            ->leftJoin('rooms as rm', 'rm.id', '=', 'dre.room_id')
            ->leftJoin('faculty_title as ft', 'ft.faculty_code', '=', 'dri.faculty_code')
            ->leftJoin('program_title as pt', 'pt.program_code', '=', 'dri.program_code')
            ->select('dr.applicant_id as id',
                'dr.applicant_email as email',
                'dri.first_name',
                'dri.last_name',
                'ft.title_en as faculty',
                'pt.title_en as speciality',
                'dri.school',
                'dri.course',
                'dri.self_number',
                'dri.assistant_id',
                'dre.room_id')
            ->where('dre.is_active', '1')
            ->where('dr.status', '=', 'a')
            ->where('dri.gender','=',$params['gender']);

        if($params['search_value'] !== null){
            $studentList = $studentList->where(function($query) use($params){
                $query->where('dri.first_name', 'like', $params['search_value'].'%')
                    ->orWhere('dri.last_name', 'like', $params['search_value'].'%');
            });
        }

        if($params['sortBy'] === 'id'){
            if ($params['desc']){
                $studentList = $studentList->orderByDesc('dri.applicant_id');
            }
            else{
                $studentList = $studentList->orderBy('dri.applicant_id');
            }
        }
        if($params['sortBy'] === 'name'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('dri.first_name');
            }
            else{
                $studentList = $studentList->orderBy('dri.first_name');
            }
        }
        if($params['sortBy'] === 'surname'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('dri.last_name');
            }
            else{
                $studentList = $studentList->orderBy('dri.last_name');
            }
        }
        if($params['sortBy'] === 'faculty'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('ft.title_en');
            }
            else{
                $studentList = $studentList->orderBy('ft.title_en');
            }
        }
        if($params['sortBy'] === 'speciality'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('pt.title_en');
            }
            else{
                $studentList = $studentList->orderBy('pt.title_en');
            }
        }
        if($params['sortBy'] === 'school'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('dri.school');
            }
            else{
                $studentList = $studentList->orderBy('dri.school');
            }
        }
        if($params['sortBy'] === 'course'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('dri.course');
            }
            else{
                $studentList = $studentList->orderBy('dri.course');
            }
        }
        if($params['sortBy'] === 'assistant'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('dri.assistant_id');
            }
            else{
                $studentList = $studentList->orderBy('dri.assistant_id');
            }
        }
        if($params['sortBy'] === 'room'){
            if ($params['desc']) {
                $studentList = $studentList->orderByDesc('dre.room_id');
            }
            else{
                $studentList = $studentList->orderBy('dre.room_id');
            }
        }

        return $studentList->paginate(10);
    }

    public function info(){
        return $this->hasOne(RegisterInfo::class, 'applicant_id')
            ->select('applicant_id', 'first_name', 'last_name');
    }

    public function bookingStudents($params){
        $students = DB::table($this->table, 'dr')
            ->leftJoin('dorm_register_info as dri','dri.applicant_id','=','dr.applicant_id')
            ->select('dr.applicant_id',
                'dr.applicant_email',
                'dri.first_name',
                'dri.last_name',
                'dri.iin',
                'dri.course'
            )
            ->where('dr.status','w')
            ->where('dri.gender', $params['gender']);

        if($params['search_value'] !== null){
            $students = $students->where(function($query) use($params){
                $query->where('dri.first_name', 'like', $params['search_value'].'%')
                    ->orWhere('dri.last_name', 'like', $params['search_value'].'%');
            });
        }

        return $students->get()->toArray();
    }
}
