@extends("layouts.app")

@section("title") Create Pelanggaran @endsection

@section("main")
    
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Pelanggaran</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new pelanggaran</h2>
            <p class="section-lead">Silahkan isi form untuk menambah pelanggaran baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Pelanggaran Form</h4>
                            
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

                            <form 
                                enctype="multipart/form-data" class="bg-white shadow-sm p-3"
                                action="{{ route('violation.store') }}" method="POST">
                                
                                @csrf

                                <label for="violation_name">Nama Pelanggaran</label>
                                <input
                                value="{{old('violation_name')}}" 
                                class="form-control {{$errors->first('violation_name') ? "is-invalid": ""}}"
                                placeholder="Nama Pelanggaran"
                                type="text"
                                name="violation_name"
                                id="violation_name"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('violation_name')}}
                                </div>
                                <br>


                                <label for="violation_level">
                                    <span class=""> Tingkat Pelanggaran: </span>
                                    <select class="block w-full mt-1" name="violation_level">
                                        <option value=" " class="form-control {{$errors->first('violation_level') ? "is-invalid": ""}}">Pilih Tingkatan Pelanggaran</option>
                                        <option value="p1" class="form-control {{$errors->first('violation_level') ? "is-invalid": ""}}">Pelanggaran Tingkat-1</option>
                                        <option value="p2" class="form-control {{$errors->first('violation_level') ? "is-invalid": ""}}">Pelanggaran Tingkat-2</option>
                                        <option value="p3" class="form-control {{$errors->first('violation_level') ? "is-invalid": ""}}">Pelanggaran Tingkat-3</option>
                                        <option value="p4" class="form-control {{$errors->first('violation_level') ? "is-invalid": ""}}">Pelanggaran Tingkat-4</option>
                                        <option value="p5" class="form-control {{$errors->first('violation_level') ? "is-invalid": ""}}">Pelanggaran Tingkat-5</option>
                                    </select>
                                </label>
                                <div class="invalid-feedback">
                                    {{$errors->first('violation_level')}}
                                </div>
                                <br/>
                               

                                
                                
                                <button type="submit" name="action" value="cancel" class="btn btn-danger me-3">Cancel</button>
                                <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>

                            </form>
                            
                        </div>
            </div>
        </div>
    </section>
</div>

@endsection