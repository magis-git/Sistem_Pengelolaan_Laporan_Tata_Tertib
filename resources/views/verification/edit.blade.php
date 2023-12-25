@extends('layouts.global')

@section('title') Edit Student Report @endsection 

@section('main')
<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Lapor Pelanggaran</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">Create new laporan</h2>
            <p class="section-lead">Silahkan isi form untuk menambah laporan baru.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
            
                        <div class="card-header">
                            <h4>Laporan Form</h4>
                        </div>

                <div class="card-body">
                    <div class="card-header">
                        <h4>Description Form</h4>
                    </div>


                    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('verification.update', [$violation->id])}}" method="POST"
                        onsubmit="return confirmSubmit()">
                        @csrf

                        <input type="hidden" value="PUT" name="_method">
                        <label for="report_desc">Deskripsi Laporan</label>
                        <input class="form-control {{$errors->first('report_desc') ? "is-invalid": ""}}" 
                            type="text"
                            id="report_desc" 
                            name="report_desc"
                            value="{{ $violation->violation_name }}"
                            />
                        <div class="invalid-feedback">
                            {{$errors->first('report_desc')}}
                        </div>
                        <br>
                        
                        <label for="reporter_name">Nama Pelapor</label>
                        <input
                        
                        value="{{ $username }}" 
                        class="form-control {{$errors->first('reporter_name') ? "is-invalid": ""}}" 
                        type="text"
                        name="reporter_name"
                        id="reporter_name"/>
                        <div class="invalid-feedback">
                            {{$errors->first('reporter_name')}}
                        </div>

                        
                        <div class="section-title">Pilih Siswa</div>
                        <label for="selected_values">Pilih siswa:</label><br>
                                <div class="form-group">
                                    <label>List Siswa</label>
                                    <select class="form-control select2"
                                        name="selected_students[]" 
                                        multiple>
                                        @foreach($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
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

<script>
    function confirmSubmit() {
        var agree = confirm("Are you sure you want to submit the report?");
        if (agree) {
            document.forms[0].submit();
        }
        else {
            return false;
        }
    }
</script>


@endsection 
