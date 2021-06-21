<?php

namespace App\Http\Controllers\Helpers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FileToBase64Request;
use App\Repositories\Helpers\FileToBase64Repository;
use Illuminate\Http\Request;

class FileToBase64Controller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  FileToBase64Request  $request
     * @param  FileToBase64Repository  $repository
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FileToBase64Request $request, FileToBase64Repository $repository)
    {
        return $repository->manage($request);
    }
}
