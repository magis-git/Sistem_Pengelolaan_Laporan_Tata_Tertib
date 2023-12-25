@extends('layouts.wali-app')

@section('title', 'Dashboard')

@section('main')

<div class="main-content">
    <section class="section">
        
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Guru Dashboard</h2>
       
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

                <div class="section-footer">
                    <form action="{{route("logout")}}" method="GET">
                        @csrf
                        <button class="btn btn-danger" style="cursor:pointer">Sign Out</button>
                       </form>
                </div>
            </div>
    </section>
</div>
@endsection
