<?php

namespace App\Http\Controllers;

use App\models\Post;
use Illuminate\Http\Request;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportDataController extends Controller
{
    public function list()
    {
        return view('dashboard.posts.import', [
            'title' => 'Import Data'
        ]);
    }


    public function import_data(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls,csv'
        ]);

        try {

            Excel::import(new DataImport, $request->file('excel_file'));
            return redirect('/dashboard/posts')->with('success', 'Data Successfully imported');
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return redirect()->back()->with('import_errors', $failures);

        }
    }
}
