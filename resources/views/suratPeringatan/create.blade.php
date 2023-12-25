@extends("layouts.global")

@section("title") Create Surat Peringatan @endsection

@section("main")
    
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Surat Peringatan</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new Surat Peringatan</h2>
            <p class="section-lead">Silahkan isi form untuk menambah surat peringatan baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Surat Peringatan Form</h4>
                            
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
                                action="{{ route('suratPeringatan.store') }}" method="POST">
                                
                                @csrf

                                <label for="no_sp">Nomor Surat Peringatan</label>
                                <input
                                value="{{old('no_sp')}}" 
                                class="form-control {{$errors->first('no_sp') ? "is-invalid": ""}}"
                                placeholder="Nomor Surat Peringatan"
                                type="text"
                                name="no_sp"
                                id="no_sp"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('no_sp')}}
                                </div>
                                <br>

                                <div class="section-title">Pilih Siswa</div>
                                <label for="selected_students">Pilih siswa:</label><br>
                                <div class="form-group">
                                    <label>List Siswa</label>
                                    <select class="form-control select2"
                                        name="selected_students[]"
                                    >
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                

                                <label for="sp_desc">Deskripsi Pelanggaran</label>
                                <textarea class="form-control {{$errors->first('sp_desc') ? "is-invalid": ""}}" 
                                    id="sp_desc" name="sp_desc" placeholder="Masukkan deskripsi pelanggaran" rows="3"></textarea>
                                <div class="invalid-feedback">
                                    {{$errors->first('sp_desc')}}
                                </div>
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