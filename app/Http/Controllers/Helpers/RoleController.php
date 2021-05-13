<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Repositories\Helpers\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Repositories\FacultyCodeRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RoleRepository $repository)
    {
        return $repository->manage();
    }
}
