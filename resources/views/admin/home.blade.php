@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    <div class="row justify-content-center">
        <div class="card col-md-2 col-sm-4 col-8 m-2 p-3 text-center">Lamaran <strong>100</strong></div>
        <div class="card col-md-2 col-sm-4 col-8 m-2 p-3 text-center">Test <strong>100</strong></div>
        <div class="card col-md-2 col-sm-4 col-8 m-2 p-3 text-center">Interview <strong>100</strong></div>
        <div class="card col-md-2 col-sm-4 col-8 m-2 p-3 text-center">Onboarding <strong>100</strong></div>
    </div>
    <div class="card">
        <div class="card-body">
            <table id="table-lamaran" class="w-100 border border-1">
                <thead>
                    <th>No</th>
                    <th>Nama Perusahaan</th>
                    <th>Lokasi</th>
                    <th>Alamat</th>
                    <th>Tentang Perusahaan</th>
                    <th>Tempat melamar</th>
                    <th>Dihubungi Via</th>
                    <th>Nomor Penghubung</th>
                    <th>Action</th>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script>
        $("#table-lamaran").dataTable();
    </script>
@stop
