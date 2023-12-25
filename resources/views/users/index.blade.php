@extends("layouts.app")

@section("title") Users List @endsection

@section("main")

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manage Users</h1>
            
        </div>

        <div class="section-body">
            <h2 class="section-title">List User </h2>
            <p class="section-lead">Silahkan cari user melalui kolom pencarian.</p>

            <div class="row">
                <div class="col-12 col-lg-15">
                    <div class="card">
        
                        <div class="card-header">
                            <a href="{{ route('admin.dashboard') }}"><button type="submit" name="action" 
                                class="btn btn-primary me-3"><i class="fas fa-home"></i> Home</button></a>    
                            <a href="{{route('users.create')}}">
                                <button class="btn btn-primary"><i class="fas fa-plus"></i> Create User</button>
                            </a>
                        </div>

                            <div class="card-body">

                                <table id="users-table" class="table table-bordered">
                                    <thead>
                                        <th><b>Name</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>Level</b></th>
                                        <th><b>Action</b></th>
                                    </thead>

                                    <tbody>
                                        @foreach ($users as $user )

                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->level }}</td>
                                                <td>
                                                    <a 
                                                    class="btn btn-primary text-white btn-sm" 
                                                    href="{{route('users.edit', [$user->id])}}">Edit</a>
                                                    
                                                    <form 
                                                        onsubmit="return confirm('Delete this user permanently?')" 
                                                        class="d-inline" 
                                                        action="{{route('users.destroy', [$user->id ])}}" 
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
                $('#users-table').DataTable();
            });

        </script>    

@endsection