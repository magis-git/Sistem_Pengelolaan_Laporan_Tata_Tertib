<?php

namespace App\Http\Controllers;

use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Report;
use App\Models\User;
use App\Models\Kelas;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ClassReportExport;
use App\Exports\StudentReportExport;


class ExportController extends Controller
{
    //
    public function export()
    {
        $user = Auth::user();
        $username = $user -> name;

        $kelas_users= \App\Models\Kelas::where('walikelas_1','=',$username)
                ->orWhere('walikelas_2','=',$username)
                // ->select('kelas_number')
                ->get();

        foreach($kelas_users as $kelas_user)
        $students = \App\Models\Student::where('kelas','=',$kelas_user->kelas_number)
                    ->select('nis', 'name', 'total_poin')
                    ->get();
        $headers = ['NIS', 'Nama', 'Total Poin'];

        $fileName = 'Laporan-Kelas-' . $kelas_user->kelas_number . '.xlsx';
        
        return Excel::download(new ClassReportExport($students, $headers), $fileName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function export2($id)
    {
        $student = \App\Models\Student::findOrFail($id);

        $reports = Student::with('reports') 
         ->select('reports.created_at', 'reports.reporter_name', 'reports.report_desc'
                   ,'reports.p1', 'reports.p2', 'reports.p3', 'reports.p4', 'reports.p5', 'reports.total_poin')
         ->join('reports', 'students.id', '=', 'reports.student_id')   
         ->where('students.id', '=', $id)
         ->get();
        $headers = ['Tanggal Lapor', 'Nama Pelapor', 'Deskripsi Pelanggaran', 
                    'Pelanggaran Tingkat-1', 'Pelanggaran Tingkat-2', 'Pelanggaran Tingkat-3', 'Pelanggaran Tingkat-4', 'Pelanggaran Tingkat-5', 'Total Poin'];
        
        $fileName = 'Laporan-' . $student->name . '.xlsx';

        return Excel::download(new StudentReportExport($reports, $headers), $fileName);
    }

}
