<?php

namespace App\Http\Controllers\RegistrationDashboard;

use App\Http\Controllers\Controller;
use App\Repositories\RegistrationDashboard\GenderRepository;

class GenderController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Repositories\FacultyCodeRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function __invoke(GenderRepository $repository)
    {
        return $repository->manage();
    }

}
