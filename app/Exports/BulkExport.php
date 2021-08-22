<?php

namespace App\Exports;

use App\Http\Controllers\Helpers\ApiHelper;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class BulkExport implements WithHeadings, FromCollection, WithMapping
{

    // use Exportable;
    use ApiHelper;

    public function headings(): array
    {
        return [
            'ID',
            'Email',
            'Name',
            'Surname',
            'Faculty',
            'Speciality',
            'School',
            'Course',
            'Number',
            'Room'
        ];
    }

    public function collection()
    {
        $params['gender'] = $this->userGender();
        return DB::table('dorm_register as dr')
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
                'dre.room_id')
            ->where('dre.is_active', '1')
            ->where('dr.status', '=', 'a')
            ->where('dri.gender','=',$params['gender'])
            ->get();
        /*you can use condition in query to get required result
         return Bulk::query()->whereRaw('id > 5');*/
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->email,
            $user->first_name,
            $user->last_name,
            $user->faculty,
            $user->speciality,
            $user->school,
            $user->course,
            $user->self_number,
            $user->room_id
        ];
    }

}
