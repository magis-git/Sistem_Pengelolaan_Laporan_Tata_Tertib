<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Report;
use App\Models\User;
use App\Models\Kelas;
use App\Imports\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function showForm()
    {
        return view('import.form');
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        
        Excel::import(new StudentsImport(), $file);

        return redirect()->back()->with('success', 'Import successful!');
    }

}
