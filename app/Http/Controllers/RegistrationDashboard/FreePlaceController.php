<?php

namespace App\Http\Controllers\RegistrationDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\FreePlaceRequest;
use App\Repositories\RegistrationDashboard\FreePlaceRepository;

class FreePlaceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FreePlaceRepository $repository)
    {
        return $repository->manage();
    }
}
