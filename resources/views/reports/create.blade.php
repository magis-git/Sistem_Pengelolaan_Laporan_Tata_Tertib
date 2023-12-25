@extends("layouts.app")

@section("title") Create Student @endsection

@section("main")
    
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Manage Siswa</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new siswa</h2>
            <p class="section-lead">Silahkan isi form untuk menambah siswa baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Siswa Form</h4>
                            
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
                                action="{{ route('reports.store') }}" method="POST">
                                
                                @csrf

                                <label for="nis">NIS</label>
                                <input
                                value="{{old('nis')}}" 
                                class="form-control {{$errors->first('nis') ? "is-invalid": ""}}"
                                placeholder="NIS"
                                type="text"
                                name="nis"
                                id="nis"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('nis')}}
                                </div>
                                <br>

                                <label for="name">Nama</label>
                                <input
                                value="{{old('name')}}" 
                                class="form-control {{$errors->first('name') ? "is-invalid": ""}}"
                                placeholder="Name"
                                type="text"
                                name="name"
                                id="name"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </div>
                                <br>

                                <label for="kelas">Kelas</label>
                                <input
                                value="{{old('kelas')}}" 
                                class="form-control {{$errors->first('kelas') ? "is-invalid": ""}}"
                                placeholder="Kelas"
                                type="text"
                                name="kelas"
                                id="kelas"/>
                                <div class="invalid-feedback">
                                    {{$errors->first('kelas')}}
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