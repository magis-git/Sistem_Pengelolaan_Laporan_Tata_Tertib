<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Report;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Violation;
use DataTables;

class EditStudentController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $report = \App\Models\Report::findOrFail($id);
        // $studentId = $report -> student_id;
        $student = \App\Models\Student::findOrFail($id);

        $user = Auth::user();
        $username = $user -> name;

        return view('editStudent.edit', ['student' => $student], compact('username'));
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
                    
                    "name" => "required|min:5|max:100",
                    "kelas" => "required|max:2",
                    "p1" => "required|min:0|max:100",
                    "p2" => "required|min:0|max:40",
                    "p3" => "required|min:0|max:4",
                    "p4" => "required|min:0|max:2",
                    "p5" => "required|min:0|max:1",
                    
                ])->validate();
                
               
                
                $student = \App\Models\Student::findOrFail($id);   

                $name = $request->get('name');
                $student->update(['name' => $name]);    

                $kelas = $request->get('kelas');
                $student->update(['kelas' => $kelas]);    

                $p1 = $request->get('p1');
                $student->update(['p1' => $p1]);

                $p2 = $request->get('p2');
                $student->update(['p2' => $p2]);
  
                $p3 = $request->get('p3');
                $student->update(['p3' => $p3]);
  
                $p4 = $request->get('p4');
                $student->update(['p4' => $p4]);
  
                $p5 = $request->get('p5');
                $student->update(['p5' => $p5]);

                $total_poin = ($p1 * 10) + ($p2 * 25) +($p3 * 250) +($p4 * 500) +($p5 * 1000);
                $student->update(['total_poin' => $total_poin]);
                

                $student->save();              
                
                return redirect()->route('reports.admin-index')->with('status', 'Student successfully edited');       
        }
    }

}
