<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\FacultyCodeRepository;
use App\Repositories\ProgramCodeRepository;
use Illuminate\Http\Request;

class FacultyCodeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Repositories\FacultyCodeRepository  $repository
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FacultyCodeRepository $repository)
    {
        return $repository->manage();
    }

    public function getProgramCode(Request $request, ProgramCodeRepository $programCode)
    {
        return $programCode->manage($request);
    }
}
