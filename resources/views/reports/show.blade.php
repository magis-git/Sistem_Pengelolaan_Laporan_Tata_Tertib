@extends("layouts.global")

@section("title") Student Details @endsection

@section("main")

<div class="main-content">
    <section class="section">
        
        {{-- <div class="card">
            <div class="card-header">
                
                <button class="btn btn-primary" onclick="window.history.back()">
                    <i class="fas fa-home"></i></button>
                
            </div> --}}

            <div class="section-header">
                <h1>Laporan Pelanggaran</h1>
                
            </div>

            <div class="section-body">
                <h2 class="section-title">Rincian Laporan </h2>
                {{-- <p class="section-lead">Silahkan cari siswa melalui kolom pencarian lalu tekan tombol detail.</p> --}}
    
                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                
                                    <button class="btn btn-primary" onclick="window.history.back()">
                                        <i class="fas fa-home"></i> Home</button>

                                        <a href="{{ route('export2' , [$student->id]) }}" class="btn btn-success">
                                            <i class="fas fa-print"></i>Export to Excel</a>

                                </div>
                     
                        <div class="card-body">
                            <h4>{{ $student->name }}</h4>
                            
                            <h6>{{ $student->nis }}</h6>
                            
                            <br/> 
                            <table id="student-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th>Pelanggaran Tingkat-1</th>
                                        <th>Pelanggaran Tingkat-2</th>
                                        <th>Pelanggaran Tingkat-3</th>
                                        <th>Pelanggaran Tingkat-4</th>
                                        <th>Pelanggaran Tingkat-5</th>
                                        <th>Total Poin</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                                                       
                                            <td>{{ $student->p1 }}</td>
                                            <td>{{ $student->p2 }}</td>
                                            <td>{{ $student->p3 }}</td>
                                            <td>{{ $student->p4 }}</td>
                                            <td>{{ $student->p5 }}</td>
                                            <td>{{ $student->total_poin }}</td>
                                            
                                            
                                        </tr>
                                
                                </tbody>

                            </table>
                            <br>

                            <table id="reports-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th>Tanggal Lapor</th>
                                        <th>Deskripsi Pelanggaran</th>
                                        <th>Nama Pelapor</th>
                                                                        
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            @foreach ($reports as $report)
                                            <td>{{ $report->created_at }}</td>
                                            <td>{{ $report->report_desc }}</td>
                                            <td>{{ $report->reporter_name }}</td>
                                            
                                            
                                            
                                        </tr>
                                        @endforeach
                                </tbody>

                                </table>
                                
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
                

        <script>
            $(document).ready(function(){
                $('#reports-table').DataTable();
                $('#student-table').DataTable();
            });

        </script>    


@endsection