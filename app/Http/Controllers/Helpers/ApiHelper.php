<?php

namespace App\Http\Controllers\Helpers;

trait ApiHelper
{
    function getInterfaceLanguage(){
        return request()->header('Content-Language');
    }
}
