<?php

namespace App\Http\Controllers\AdminPage\AccountingPage;

use App\Http\Controllers\Controller;
use App\Repositories\AccountingPage\AccountingPageRepository;
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
}
