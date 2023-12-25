<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Violation;

class ViolationController extends Controller
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
        $violations = \App\Models\Violation::all();

        return view('violation.index', ['violations'=>$violations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Membuat user
        return view("violation.create");
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
                return redirect()->route("violation.index");
    
            case 'save':
                $validations = \Validator::make($request->all(),[
                    "violation_name" => "required|max:100|unique:violations",
                    "violation_level" => "required|max:2"
                  ])->validate();
                // Store the data to database
                $new_violation = new \App\Models\Violation;
                $new_violation-> violation_name= $request->get('violation_name');
                $new_violation-> violation_level= $request->get('violation_level');
               
                
                $new_violation->save();
                return redirect()->route('violation.index')->with('status', 'Pelanggaran Berhasil Ditambahkan');
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
        $violation = \App\Models\Violation::findOrFail($id);

        return view('violation.edit', ['violation' => $violation]);
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
                return redirect()->route("violation.index");
    
            case 'save':
                \Validator::make($request->all(), [
                    "violation_name" => "required|max:100|unique:violations",
                    "violation_level" => "required|max:2"
                    
                    
                ])->validate();
        
                $violations = \App\Models\Violation::findOrFail($id);
        
                $violations->violation_name = $request->get('violation_name');
                $violations->violation_level = $request->get('violation_level');
                
                
                $violations->save();
        
                return redirect()->route('violation.index', [$id])->with('status', 'Pelanggaran succesfully updated');
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
        $violation = \App\Models\Violation::findOrFail($id);

        $violation->delete();

        return redirect()->route('violation.index')->with('status', 'Pelanggaran successfully delete');
    }


}
