<?php

namespace App\Http\Controllers\AdminPage\DirectorPage;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConnectStudentRequest;
use App\Repositories\DirectorPage\ConnectStudentRepository;
use Illuminate\Http\Request;

class ConnectStudentController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ConnectStudentRequest $request, ConnectStudentRepository $repository)
    {
        return $repository->manage($request);
    }
}
