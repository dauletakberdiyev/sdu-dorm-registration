<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use App\Repositories\AccountingPage\AccountingPageRepository;
use App\Repositories\DirectorPage\DirectorStudentListRepository;
use Illuminate\Http\Request;

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

    public function directorList(DirectorStudentListRepository $repository)
    {
        return $repository->manage();
    }
}
