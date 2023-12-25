<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Menampilkan User
        $kelas = \App\Models\Kelas::all();

        return view('kelas.index', ['kelas'=>$kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Membuat user
        return view("kelas.create");
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
                return redirect()->route("kelas.index");
    
            case 'save':
                $validation = \Validator::make($request->all(),[
                    "kelas_number" => "required|max:2|unique:kelas",
                    "kelas_name" => "required|max:25|unique:kelas",
                    "walikelas_1" => "required|min:5|max:100|unique:kelas",
                    "walikelas_2" => "required|min:5|max:100|unique:kelas"
                  ])->validate();
                // Store the data to database
                $new_kelas = new \App\Models\Kelas;
                $new_kelas-> kelas_number= $request->get('kelas_number');
                $new_kelas-> kelas_name= $request->get('kelas_name');
                $new_kelas-> walikelas_1= $request->get('walikelas_1');
                $new_kelas-> walikelas_2= $request->get('walikelas_2');
                
                $new_kelas->save();
                return redirect()->route('kelas.index')->with('status', 'Kelas Berhasil Ditambahkan');
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
        $kelas = \App\Models\Kelas::findOrFail($id);

        return view('kelas.edit', ['kelas' => $kelas]);
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
                return redirect()->route("kelas.index");
    
            case 'save':
                \Validator::make($request->all(), [
                    "kelas_number" => "required|max:2|regex:/^[A-Z0-9]+$/",
                    "kelas_name" => "required|max:25",
                    "walikelas_1" => "required|min:5|max:100",
                    "walikelas_2" => "required|min:5|max:100"
                    
                ])->validate();
        
                $kelas = \App\Models\Kelas::findOrFail($id);
        
                $kelas->kelas_number = $request->get('kelas_number');
                $kelas->kelas_name = $request->get('kelas_name');
                $kelas->walikelas_1 = $request->get('walikelas_1');
                $kelas->walikelas_2 = $request->get('walikelas_2');
                
                $kelas->save();
        
                return redirect()->route('kelas.index', [$id])->with('status', 'Kelas succesfully updated');
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
        $kelas = \App\Models\Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()->route('kelas.index')->with('status', 'Kelas successfully delete');
    }


}
