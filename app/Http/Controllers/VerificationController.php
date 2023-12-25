<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Violation;
use App\Models\Kelas;
use App\Models\Report;
use App\Models\User;
use DataTables;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan User
        $user = Auth::user();
        $username = $user -> name;

        $kelas_users= \App\Models\Kelas::where('walikelas_1','=',$username)
                ->orWhere('walikelas_2','=',$username)
                ->get();

        foreach($kelas_users as $kelas_user)
        $reports = \App\Models\Report::where('student_kelas','=',$kelas_user->kelas_number)
                    -> where('status_verify','=','pending')
                    -> get();

        return view('verification.index', compact('reports'),['kelas_user'=>$kelas_user]);
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        // Membuat user

        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan laman edit
        $violation = \App\Models\Violation::findOrFail($id);
        $students = \App\Models\Student::all();
        $user = Auth::user();
        $username = $user -> name;

        return view('verification.edit', ['violation' => $violation, 'students' => $students], compact('username'));
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
                    
                    "report_desc" => "required|min:5|max:300",
                    "reporter_name" => "required|min:5|max:100",


                ])->validate();


                $violation = \App\Models\Violation::findOrFail($id);
                $violation_level = $violation -> violation_level;

                $selectedStudents = $request->input('selected_students');
                
                $new_report = new \App\Models\Report;
                    
                foreach ($selectedStudents as $selectedStudent) {
                    $student = \App\Models\Student::findOrFail($selectedStudent);

                    if ($violation_level == 'p1'){
                        $new_report = new Report([
                            'violation_id' => $id,
                            'student_id' => $selectedStudent,
                            'report_desc' => $request->get('report_desc'),
                            'reporter_name' => $request->get('reporter_name'),
                            'student_name' => $student-> name,
                            'student_kelas' => $student-> kelas,
                            'p1' => 1,
                            'p2' => 0,
                            'p3' => 0,
                            'p4' => 0,
                            'p5' => 0,
                            'total_poin' => 10
                        ]);
                    } elseif ($violation_level == 'p2'){
                        $new_report = new Report([
                            'violation_id' => $id,
                            'student_id' => $selectedStudent,
                            'report_desc' => $request->get('report_desc'),
                            'reporter_name' => $request->get('reporter_name'),
                            'student_name' => $student-> name,
                            'student_kelas' => $student-> kelas,
                            'p1' => 0,
                            'p2' => 1,
                            'p3' => 0,
                            'p4' => 0,
                            'p5' => 0,
                            'total_poin' => 25
                        ]);
                    } elseif ($violation_level == 'p3'){
                        $new_report = new Report([
                            'violation_id' => $id,
                            'student_id' => $selectedStudent,
                            'report_desc' => $request->get('report_desc'),
                            'reporter_name' => $request->get('reporter_name'),
                            'student_name' => $student-> name,
                            'student_kelas' => $student-> kelas,
                            'p1' => 0,
                            'p2' => 0,
                            'p3' => 1,
                            'p4' => 0,
                            'p5' => 0,
                            'total_poin' => 250
                        ]);
                    } elseif ($violation_level == 'p4'){
                        $new_report = new Report([
                            'violation_id' => $id,
                            'student_id' => $selectedStudent,
                            'report_desc' => $request->get('report_desc'),
                            'reporter_name' => $request->get('reporter_name'),
                            'student_name' => $student-> name,
                            'student_kelas' => $student-> kelas,
                            'p1' => 0,
                            'p2' => 0,
                            'p3' => 0,
                            'p4' => 1,
                            'p5' => 0,
                            'total_poin' => 500
                        ]);
                    } elseif ($violation_level == 'p5'){
                        $new_report = new Report([
                            'violation_id' => $id,
                            'student_id' => $selectedStudent,
                            'report_desc' => $request->get('report_desc'),
                            'reporter_name' => $request->get('reporter_name'),
                            'student_name' => $student-> name,
                            'student_kelas' => $student-> kelas,
                            'p1' => 0,
                            'p2' => 0,
                            'p3' => 0,
                            'p4' => 0,
                            'p5' => 1,
                            'total_poin' => 1000
                        ]);
                    }
                    
                    $new_report->save();
                }

                


                return redirect()->route('reports.index')->with('status', 'Report succesfully add');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete user
        $reports = \App\Models\Report::findOrFail($id);

        $reports->delete();

        return redirect()->back()->with('status', 'Report successfully delete');
    }

}

