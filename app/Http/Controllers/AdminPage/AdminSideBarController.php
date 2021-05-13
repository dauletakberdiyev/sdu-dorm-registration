<?php

namespace App\Http\Controllers\AdminPage;

use App\Http\Controllers\Controller;
use App\Repositories\AdminSideBar\AdminSideBarRepository;
use Illuminate\Http\Request;

class AdminSideBarController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AdminSideBarRepository $repository)
    {
        return $repository->manage();
    }
}
