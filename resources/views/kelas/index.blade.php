@extends("layouts.app")

@section("title") Kelas List @endsection

@section("main")

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Kelas</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">List Kelas </h2>
            <p class="section-lead">Silahkan cari kelas melalui kolom pencarian.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('admin.dashboard') }}"><button type="submit" name="action" 
                                class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button></a>    
                            <a href="{{route('kelas.create')}}">
                                <button class="btn btn-primary"><i class="fas fa-plus"></i> Create Kelas</button>
                            </a>    
                        </div>

                            <div class="card-body">

                                <table id="kelas-table" class="table table-bordered">
                                    <thead>
                                        <th><b>Kelas</b></th>
                                        <th><b>Nama Kelas</b></th>
                                        <th><b>Walikelas</b></th>
                                        <th><b>Action</b></th>
                                    </thead>

                                    <tbody>
                                        @foreach ($kelas as $kelas )

                                            <tr>
                                                <td>{{ $kelas->kelas_number }}</td>
                                                <td>{{ $kelas->kelas_name }}</td>
                                                <td>{{ $kelas->walikelas_1 }} <br> {{ $kelas->walikelas_2 }}</td>
                                                <td>
                                                    <a 
                                                    class="btn btn-primary text-white btn-sm" 
                                                    href="{{route('kelas.edit', [$kelas->id])}}">Edit</a>
                                                    
                                                    <form 
                                                        onsubmit="return confirm('Delete this kelas permanently?')" 
                                                        class="d-inline" 
                                                        action="{{route('kelas.destroy', [$kelas->id ])}}" 
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

        <script>
            $(document).ready(function(){
                $('#kelas-table').DataTable();
            });

        </script>    

@endsection