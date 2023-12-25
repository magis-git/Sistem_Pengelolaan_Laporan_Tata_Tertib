@extends('layouts.app')

@section('title', 'Dashboard')

@section('main')

<div class="main-content">
    <section class="section">
        
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Admin Dashboard</h2>
        {{-- <p class="section-lead">Components that can be used to make something bigger than the header.</p> --}}

            <div class="row">

                <div class="col-12 mb-4">
                    <div class="hero bg-warning text-white">
                        <div class="hero-inner">
                            <h2>Lapor Pelanggaran</h2>
                            <p class="lead">Laporkan pelanggaran yang dilakukan siswa-siswi melalui form.</p>
                            <div class="mt-4">
                                <a href="{{route('reports.index')}}"
                                    class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-pen"></i>
                                    Lapor</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <h2 class="section-title">Manage Menu</h2> --}}
                
                <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-users"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Manage Users</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{route('users.create')}}">
                                            <button class="btn btn-info">Add Users</button>
                                        </a>
                                        
                                        <a href="{{route('users.index')}}">
                                            <button class="btn btn-info">List Users</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-file-alt"></i>
                                       </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Manage Pelanggaran</h4>
                                            </div>
                                            <div class="card-body">
                                                <a href="{{route('violation.create')}}">
                                                    <button class="btn btn-info">Add Pelanggaran</button>
                                                </a>
                                                <a href="{{route('violation.index')}}">
                                                    <button class="btn btn-info">List Pelanggaran</button>
                                                </a>        
                                            </div>
                                    </div>
                                </div>
                            </div>

                    <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-cube"></i>
                                   </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Manage Kelas</h4>
                                        </div>
                                        <div class="card-body">
                                            <a href="{{route('kelas.create')}}">
                                                <button class="btn btn-info">Add Kelas</button>
                                            </a>
                                            <a href="{{route('kelas.index')}}">
                                                <button class="btn btn-info">List Kelas</button>
                                            </a>        
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="far fa-user"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Manage Siswa</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{route('reports.create')}}">
                                            <button class="btn btn-info">Add Siswa</button>
                                        </a>
                                        
                                        <a href="{{route('reports.admin-index')}}">
                                            <button class="btn btn-info">List Siswa</button>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-envelope"></i>
                               </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Manage Surat Peringatan</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{route('suratPeringatan.create')}}">
                                            <button class="btn btn-info">Add SP</button>
                                        </a>
                                        <a href="{{route('suratPeringatan.index')}}">
                                            <button class="btn btn-info">List SP</button>
                                        </a>        
                                    </div>
                            </div>
                        </div>
                    </div>

                <div class="section-footer">
                    <form action="{{route("logout")}}" method="GET">
                        @csrf
                        <button class="btn btn-danger" style="cursor:pointer">Sign Out</button>
                    </form>
                </div>
            </section>
        </div>

@endsection
