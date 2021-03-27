<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\StudyTypeRepository;
use Illuminate\Http\Request;

class GetTypeOfStudyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Repositories\StudyTypeRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function __invoke(StudyTypeRepository $repository)
    {
        return $repository->manage();
    }
}
