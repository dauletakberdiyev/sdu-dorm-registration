<?php

namespace App\Http\Controllers\Helpers;

use App\Exports\BulkExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;


class ImportExportController extends Controller
{
    use ApiHelper;

    public function export()
    {
        return Excel::download(new BulkExport, 'studentList.xls');
    }
}
