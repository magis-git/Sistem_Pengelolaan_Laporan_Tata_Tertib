@extends("layouts.wali-app")

@section("title") Students List @endsection

@section("main")

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Laporan Pelanggaran</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">List Siswa </h2>
            <p class="section-lead">Silahkan cari siswa melalui kolom pencarian lalu tekan tombol detail.</p>

                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                   <a href="{{ route('wali.dashboard') }}"><button type="submit" name="action" 
                                    class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button></a> 
                                                                       
                                    <a href="{{ route('export') }}" class="btn btn-success">
                                        <i class="fas fa-print"></i>Export to Excel</a>
                                </div>
                                <div class="card-body">
        
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Kelas</th>
                                                <th>Total Poin</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    
                                                    <td>{{ $student->nis }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->kelas }}</td>
                                                    <td>{{ $student->total_poin }}</td>
                                                    <td>
                                                                                
                                                        <a 
                                                        href="{{route('reports.show', [$student->id])}}" 
                                                        class="btn btn-primary btn-sm">Detail</a>
                                        
                                                    </td>
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