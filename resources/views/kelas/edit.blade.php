@extends('layouts.app')

@section('title') Edit Kelas @endsection 

@section('main')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Kelas</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Edit kelas</h2>
            <p class="section-lead">Silahkan isi form untuk mengubah elemen kelas.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Kelas Form</h4>
                            
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('kelas.update', [$kelas->id])}}" method="POST">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <label for="kelas_number">Kelas</label>
                                <input
                                value="{{ $kelas->kelas_number }}" 
                                class="form-control {{$errors->first('kelas_number') ? "is-invalid": ""}}"
                                placeholder="Kelas"
                                type="text"
                                name="kelas_number"
                                id="kelas_number"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('kelas_number')}}
                                </div>
                                <br>

                                <label for="kelas_name">Nama Kelas</label>
                                <input
                                value="{{ old('kelas_name', $kelas->kelas_name) }}"
                                class="form-control {{$errors->first('kelas_name') ? "is-invalid": ""}}"
                                placeholder="Nama Kelas"
                                type="text"
                                name="kelas_name"
                                id="kelas_name"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('kelas_name')}}
                                </div>
                                <br>

                                <label for="walikelas_1">Wali Kelas</label>
                                <input
                                value="{{ old('walikelas_1', $kelas->walikelas_1) }}" 
                                class="form-control {{$errors->first('walikelas_1') ? "is-invalid": ""}}"
                                placeholder="Wali Kelas"
                                type="text"
                                name="walikelas_1"
                                id="walikelas_1"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('walikelas_1')}}
                                </div>
                                <br>

                                <label for="walikelas_2">Wali Kelas</label>
                                <input
                                value="{{ old('walikelas_2', $kelas->walikelas_2) }}"
                                class="form-control {{$errors->first('walikelas_2') ? "is-invalid": ""}}"
                                placeholder="Wali Kelas"
                                type="text"
                                name="walikelas_2"
                                id="walikelas_2"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('walikelas_2')}}
                                </div>
                                <br>
                                
                                <br>
                            
                                <button type="submit" name="action" value="cancel" class="btn btn-danger me-3">Cancel</button>
                                <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>

                            </form>
                        </div>
            </div>
        </div>
    </section>
</div>
@endsection 
