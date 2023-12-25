@extends("layouts.global")

@section("title") Surat Peringatan Wali @endsection

@section("main")

<div class="main-content">
    <section class="section">
        
       
            <div class="section-header">
                <h1>Surat Peringatan</h1>
                
            </div>

            <div class="section-body">
                <h2 class="section-title">List Surat Peringatan</h2>
                <p class="section-lead">Silahkan cari siswa melalui kolom pencarian.</p>
                
                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                    <a href="{{ route('wali.dashboard') }}"><button type="submit" name="action" 
                                        class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button>
                                    </a>
                                    <a href="{{route('suratPeringatan.create')}}">
                                        <button class="btn btn-success"><i class="fas fa-plus"></i> Add Surat Peringatan</button>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No Surat Peringatan</th>
                                                <th>NIS</th>
                                                <th>Nama Siswa</th>
                                                <th>Kelas</th>
                                                <th>Deskripsi Pelanggaran</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($suratPeringatans as $suratPeringatan)
                                                <tr>
                                                    
                                                    <td>{{ $suratPeringatan->no_sp }}</td>
                                                    <td>{{ $suratPeringatan->student_nis }}</td>
                                                    <td>{{ $suratPeringatan->student_name }}</td>
                                                    <td>{{ $suratPeringatan->student_kelas }}</td>
                                                    <td>{{ $suratPeringatan->sp_desc }}</td>
                                                    
                                                </tr>
                                            @endforeach
                                        </tbody>
        
                                    </table>
                                </div>
                            </div>
                        </div>
                
            </div>
        </div>
    </section>
</div>

            

        <script>
            $(document).ready(function(){
                $('#students-table').DataTable();
            });

        </script>    

@endsection