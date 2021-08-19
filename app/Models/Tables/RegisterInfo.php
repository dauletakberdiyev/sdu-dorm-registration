<?php

namespace App\Models\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function relatedStudents($params, $isAssistant = 0){
        $students = DB::table($this->table.' as dri')
            ->leftJoin('dorm_residents as dre', 'dre.applicant_id', '=', 'dri.applicant_id')
            ->leftJoin('dorm_register as dr', 'dr.applicant_id', '=', 'dri.applicant_id')
            ->leftJoin('rooms as rm', 'rm.id', '=', 'dre.room_id')
            ->leftJoin('faculty_title as ft', 'ft.faculty_code', '=', 'dri.faculty_code')
            ->leftJoin('program_title as pt', 'pt.program_code', '=', 'dri.program_code')
            ->select('dri.first_name',
                'dri.last_name',
                'dri.city',
                'ft.title_en as faculty',
                'pt.title_en as speciality',
                'dri.course',
                'dri.school',
                'dre.room_id',
                'dri.applicant_id',
                'dri.assistant_id')
            ->where('dri.gender', $params['gender']);

        if(!$isAssistant){
            $students->where('dr.status', 'h');
        }else{
            $students->where('rm.related_room', $params['related_room']);
        }

            return $students->get()->toArray();
    }

    public function getAssistants($params){
        $assistants = DB::table($this->table, 'dri')
            ->leftJoin('dorm_register as dr','dr.applicant_id','=','dri.applicant_id')
            ->select('dri.applicant_id',
                'dri.first_name',
                'dri.last_name'
            )
            ->where('dri.gender', $params['gender'])
            ->where('dr.status','h')
            ->get()->toArray();

        return $assistants;
    }

    public function assistantList($params){
        $assistants = DB::table($this->table, 'dri')
            ->leftJoin('dorm_register as dr','dr.applicant_id','=','dri.applicant_id')
            ->leftJoin('dorm_residents as dre','dre.applicant_id','=','dri.applicant_id')
            ->leftJoin('program_title as pt', 'pt.program_code','=','dri.program_code')
            ->select('dr.applicant_id',
                'dri.first_name',
                'dri.last_name',
                'dri.course',
                'dri.self_number',
                'dre.room_id as room',
                'pt.title_en as speciality'
            )
            ->where('dri.gender', $params['gender'])
            ->where('dr.status', $params['assistantType'])
            ->paginate(5);;

        return $assistants;
    }
}
