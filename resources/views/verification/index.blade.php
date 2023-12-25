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
                                                                                
                                </div>
                                <div class="card-body">
        
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nama Siswa</th>
                                                
                                                <th>Pelapor</th>
                                                
                                                <th>Deskripsi Laporan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            @foreach($reports as $report)
                                                <tr>
                                                    
                                                    <td>{{ $report->student_name }}</td>
                                                    
                                                    <td>{{ $report->reporter_name }}</td>
                                                    
                                                    <td>{{ $report->report_desc }}</td>
                                                    <td>
                                                                                
                                                        <a 
                                                        class="btn btn-info text-white btn-sm" 
                                                        href="{{route('reports.edit', [$report->id])}}">Review</a>
                                                        
                                                        <form 
                                                        onsubmit="return confirm('Delete this report permanently?')" 
                                                        class="d-inline" 
                                                        action="{{route('verification.destroy', [$report->id ])}}" 
                                                        method="POST">

                                                        @csrf

                                                        <input 
                                                        type="hidden" 
                                                        name="_method" 
                                                        value="DELETE">
                                                        
                                                        <input 
                                                        type="submit" 
                                                        value="Delete" 
                                                        class="btn btn-danger btn-sm">
                                                    </form>
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