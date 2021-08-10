<?php

namespace App\Http\Controllers\AdminPage\DirectorPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcceptStudentRequest;
use App\Repositories\DirectorPage\AcceptStudentRepository;
use Illuminate\Http\Request;

class AcceptStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  AcceptStudentRequest  $request
     * @param  AcceptStudentRepository $repository
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AcceptStudentRequest $request, AcceptStudentRepository $repository)
    {
        return $repository->manage($request);
    }
}
