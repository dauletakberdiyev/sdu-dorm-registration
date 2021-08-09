<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentListRequest;
use App\Repositories\AccountingPage\AccountingPageRepository;
use App\Repositories\DirectorPage\BookingStudentRepository;
use App\Repositories\DirectorPage\DirectorStudentListRepository;

class StudentListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Repositories\FacultyCodeRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AccountingPageRepository $repository)
    {
        return $repository->manage();
    }

    public function directorList(StudentListRequest $request, DirectorStudentListRepository $repository)
    {
        return $repository->manage($request);
    }

    public function bookingStudentList(StudentListRequest $request, BookingStudentRepository $repository)
    {
        return $repository->manage($request);
    }
}
