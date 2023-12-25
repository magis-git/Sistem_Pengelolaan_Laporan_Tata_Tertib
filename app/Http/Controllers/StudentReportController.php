<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Report;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Violation;
use DataTables;

class StudentReportController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        switch ($request->input('action')) {
            case 'home':
                $user = Auth::user();
                switch($user->level){
                    
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                        break;
                    case 'wali':
                        return redirect()->route('wali.dashboard');
                        break;
                    case 'guru':
                        return redirect()->route('guru.dashboard');
                        break;
                    default:
                        return redirect()->back();
                }
        }


        $students = \App\Models\Student::all();
        $violations = \App\Models\Violation::all();

        $groups = $students->groupBy('kelas');
        foreach($students as $student)
        $student->total_poin = ($student->p1 * 10) + ($student->p2 * 25) +($student->p3 * 250) +($student->p4 * 500) +($student->p5 * 1000);

        

        return view('reports.index', compact('students', 'violations'));
       
    }

     //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        $students = \App\Models\Student::all();

        $groups = $students->groupBy('kelas');
        foreach($students as $student)
        $student->total_poin = ($student->p1 * 10) + ($student->p2 * 25) +($student->p3 * 250) +($student->p4 * 500) +($student->p5 * 1000);

        return view('reports.admin-index', ['students' => $students]);
    }

     //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function waliIndex()
    {
        $user = Auth::user();
        $username = $user -> name;

        $kelas_users= \App\Models\Kelas::where('walikelas_1','=',$username)
                ->orWhere('walikelas_2','=',$username)
                ->get();

        foreach($kelas_users as $kelas_user)
        $students = \App\Models\Student::where('kelas','=',$kelas_user->kelas_number)
                    ->get();

        $groups = $students->groupBy('kelas');
        foreach($students as $student)
        $student->total_poin = ($student->p1 * 10) + ($student->p2 * 25) +($student->p3 * 250) +($student->p4 * 500) +($student->p5 * 1000);

        return view('reports.wali-index', ['students' => $students, 'kelas_user'=>$kelas_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Membuat student
        return view("reports.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menyimpan siswa ke database
        switch ($request->input('action')) {
            case 'cancel':
                return redirect()->route("reports.admin-index");
    
            case 'save':
                $validation = \Validator::make($request->all(),[
                    "nis" => "required|max:17|regex:/^[0-9.]+$/|unique:students",
                    "name" => "required|min:5|max:100|unique:students",
                    "kelas" => "required|max:2"
                  ])->validate();
                // Store the data to database
                $new_student = new \App\Models\Student;
                // $new_student-> nisn= $request->get('nisn');
                $new_student-> nis= $request->get('nis');
                $new_student-> name= $request->get('name');
                $new_student-> kelas= $request->get('kelas');
                
                
                $new_student->save();
                return redirect()->route('reports.admin-index')->with('status', 'Siswa Berhasil Ditambahkan');
        }
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $student = \App\Models\Student::findOrFail($id);
        
        $student->total_poin = ($student->p1 * 10) + ($student->p2 * 25) +($student->p3 * 250) +($student->p4 * 500) +($student->p5 * 1000);

        $reports = Student::with('reports') 
         ->select('reports.created_at','reports.report_desc','reports.reporter_name')
         ->join('reports', 'students.id', '=', 'reports.student_id')   
         ->where('students.id', '=', $id)
         ->get();

        return view('reports.show', ['student' => $student, 'reports' => $reports]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $report = \App\Models\Report::findOrFail($id);
        $studentId = $report -> student_id;
        $student = \App\Models\Student::findOrFail($studentId);

        $user = Auth::user();
        $username = $user -> name;

        return view('reports.edit', ['student' => $student,'report' =>$report], compact('username'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update user
        switch ($request->input('action')) {
            case 'cancel':
                $user = Auth::user();
                switch($user->level){
                    
                    case 'admin':
                        return redirect()->route('admin.dashboard');
                        break;
                    case 'wali':
                        return redirect()->route('wali.dashboard');
                        break;
                    case 'guru':
                        return redirect()->route('guru.dashboard');
                        break;
                    default:
                        return redirect()->back();
                }
                
    
            case 'save':
                \Validator::make($request->all(), [
                    "p1" => "required|min:0|max:100",
                    "p2" => "required|min:0|max:40",
                    "p3" => "required|min:0|max:4",
                    "p4" => "required|min:0|max:2",
                    "p5" => "required|min:0|max:1",
                    "report_desc" => "required|min:5|max:300",
                    "reporter_name" => "required|min:5|max:100"
                    
                    
                ])->validate();
                
                $report = \App\Models\Report::findOrFail($id);
                $studentId = $report -> student_id;
                $student = \App\Models\Student::findOrFail($studentId);
        
                $p1 = $request->get('p1') + ($student -> p1);
                $student->update(['p1' => $p1]);

                $p2 = $request->get('p2') + ($student -> p2);
                $student->update(['p2' => $p2]);
  
                $p3 = $request->get('p3') + ($student -> p3);
                $student->update(['p3' => $p3]);
  
                $p4 = $request->get('p4') + ($student -> p4);
                $student->update(['p4' => $p4]);
  
                $p5 = $request->get('p5') + ($student -> p5);
                $student->update(['p5' => $p5]);

                $total_poin = ($p1 * 10) + ($p2 * 25) +($p3 * 250) +($p4 * 500) +($p5 * 1000);
                $student->update(['total_poin' => $total_poin]);
                
                $student->save();

                $report_desc = $request->get('report_desc');
                $report->update(['report_desc' => $report_desc]);

                $reporter_name = $request->get('reporter_name');
                $report->update(['reporter_name' => $reporter_name]);

                $p1_report = $request->get('p1');
                $report->update(['p1' => $p1_report]);

                $p2_report = $request->get('p2');
                $report->update(['p2' => $p2_report]);
  
                $p3_report = $request->get('p3');
                $report->update(['p3' => $p3_report]);
  
                $p4_report = $request->get('p4');
                $report->update(['p4' => $p4_report]);
  
                $p5_report = $request->get('p5');
                $report->update(['p5' => $p5_report]);

                $total_poin_report = ($p1_report * 10) + ($p2_report * 25) +($p3_report * 250) +($p4_report * 500) +($p5_report * 1000);
                $report->update(['total_poin' => $total_poin_report]);

                $report->update(['status_verify' => 'accepted']);
                $report->save();
                
        
                return redirect()->route('verification.index')->with('status', 'Report succesfully add');       
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        
        $students = \App\Models\Student::all();

        foreach ($students as $student) {
            $student->update([
                $student->p1 = 0,
                $student->p2 = 0,
                $student->p3 = 0,
                $student->p4 = 0,
                $student->p5 = 0,
                $student->total_poin = 0
                
            ]);
        }

        return redirect()->back()->with('status', 'Student successfully reset');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // Delete user
        $student = \App\Models\Student::findOrFail($id);

        $student->delete();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->route('reports.admin-index')->with('status', 'Student successfully delete');
        
    }
    
}
