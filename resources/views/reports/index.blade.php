@extends("layouts.global")

@section("title") Students List @endsection

@section("main")

<div class="main-content">
    <section class="section">
        
        {{-- <div class="card"> --}}
            {{-- <div class="card-header">{{ __('Students List') }}</div> --}}

            <div class="section-header">
                <h1>Lapor Pelanggaran</h1>
                
            </div>

            <div class="section-body">
                <h2 class="section-title">List Pelanggaran</h2>
                <p class="section-lead">Silahkan cari pelanggaran melalui kolom pencarian lalu tekan tombol report.</p>
                
                    <div class="row">
                        <div class="col-12 col-lg-15">
                            <div class="card">
                                <div class="card-header">
                                    <form>
                                        <button type="submit" name="action" 
                                            value="home" class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button>
                                        
                                        </form>
                                </div>
                                <div class="card-body">
                                    <table id="students-table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nama Pelanggaran</th>
                                                                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($violations as $violation)
                                                <tr>
                                                    <td>{{ $violation->violation_name }}</td>
                                                                                                        
                                                    <td>
                                                        <a 
                                                        class="btn btn-info text-white btn-sm" 
                                                        href="{{route('verification.edit', [$violation->id])}}">Report</a>
                                        
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