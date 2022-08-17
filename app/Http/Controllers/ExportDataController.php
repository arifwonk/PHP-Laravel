<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DataExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportDataController extends Controller
{
    public function export() 
    {
        // return Excel::download(new DataExport, 'export.xlsx');
        // return (new DataExport)->download('data.xlsx');
        // return new DataExport();
        return (new DataExport)->download('joss.xlsx');
    }
}
