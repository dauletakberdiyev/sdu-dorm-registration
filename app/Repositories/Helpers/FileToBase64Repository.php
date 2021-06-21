<?php

namespace App\Repositories\Helpers;

use App\Enums\ApiOutputStatus;
use App\Enums\ApiOutputStatusCode;

class FileToBase64Repository
{
    public function manage($request){
        $handle = fopen($request['file_path'], 'r');
        $fstats = fstat($handle);
        fseek($handle, 0);
        $contents = fread($handle, $fstats['size']);
        return response()->json([
            'status' => ApiOutputStatus::SUCCESS,
            'status_code' => ApiOutputStatusCode::SUCCESS,
            'message' => __('success.success'),
            'data' => base64_encode($contents)
        ], 200);
    }
}
