<?php

namespace App\Http\Controllers\RegistrationDashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Repositories\RegistrationDashboard\RegistrationDashboardRepository;

class RegistrationDashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegistrationRequest $request, RegistrationDashboardRepository $dash)
    {
        return $dash->manage($request);
    }
}
