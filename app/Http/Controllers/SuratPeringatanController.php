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
use App\Models\SuratPeringatan;
use DataTables;

class SuratPeringatanController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 

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

        $suratPeringatans = \App\Models\SuratPeringatan::all();

        return view('suratPeringatan.index', ['suratPeringatans'=>$suratPeringatans]);
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
        $suratPeringatans = \App\Models\SuratPeringatan::where('student_kelas','=',$kelas_user->kelas_number)
                    ->get();

        

        return view('suratPeringatan.wali-index', ['suratPeringatans' => $suratPeringatans, 'kelas_user'=>$kelas_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
        $user = Auth::user();
        $userLevel = $user -> level;
        $username = $user -> name;

        $kelas_users= \App\Models\Kelas::where('walikelas_1','=',$username)
                ->orWhere('walikelas_2','=',$username)
                ->get();

        if ($userLevel == 'wali'){
            foreach($kelas_users as $kelas_user)
            $students = \App\Models\Student::where('total_poin','>=',500)
                    ->where('kelas','=',$kelas_user->kelas_number)
                    ->get();
        } else {
            $students = \App\Models\Student::where('total_poin','>=',500)
                    ->get();
        }

        return view("suratPeringatan.create", compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menyimpan user ke database
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
                $suratPeringatans = \Validator::make($request->all(),[
                    "no_sp" => "required|max:20|unique:surat_peringatans",
                    "selected_students" => "required",
                    "sp_desc" => "required|min:5|max:300",
                  ])->validate();
                // Store the data to database
                $new_suratPeringatan = new \App\Models\SuratPeringatan;
                $selectedStudents = $request->input('selected_students');

                foreach ($selectedStudents as $selectedStudent){
                    $student = \App\Models\Student::findOrFail($selectedStudent);     
                
                    $new_suratPeringatan = new SuratPeringatan([
                        'no_sp' => $request->get('no_sp'),
                        'student_nis' => $student-> nis,
                        'student_name' => $student-> name,
                        'student_kelas' => $student-> kelas,
                        'sp_desc' => $request->get('sp_desc')
                        
                    ]);

                    $new_suratPeringatan->save();
                }
                
                return redirect()->route('suratPeringatan.index')->with('status', 'Surat Peringatan Berhasil Ditambahkan');
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
        $suratPeringatan = \App\Models\SuratPeringatan::findOrFail($id);
       

        return view('suratPeringatan.edit', ['suratPeringatan' => $suratPeringatan]);
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
                return redirect()->route("suratPeringatan.index");
    
            case 'save':
                $suratPeringatan = \Validator::make($request->all(),[
                    "no_sp" => "required|max:20",
                    "sp_desc" => "required|min:5|max:300",
                  ])->validate();
        
                $suratPeringatan = \App\Models\SuratPeringatan::findOrFail($id);
                
                $suratPeringatan->no_sp = $request->get('no_sp');
                $suratPeringatan->sp_desc = $request->get('sp_desc');     
                  
                $suratPeringatan->save();
                return redirect()->route('suratPeringatan.index', [$id])->with('status', 'Pelanggaran succesfully updated');
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
        $suratPeringatan = \App\Models\SuratPeringatan::findOrFail($id);

        $suratPeringatan->delete();

        return redirect()->route('suratPeringatan.index')->with('status', 'SP successfully delete');
    }

}
