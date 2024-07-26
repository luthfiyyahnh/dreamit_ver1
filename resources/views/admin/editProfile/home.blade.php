@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Profile</h1>
@stop

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@2.1.0/dist/iconify-icon.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
    @if (session('success'))
        <script>
            Swal.fire(
                'Berhasil!',
                '{{ session('success') }}',
                'success'
            )
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire(
                'Gagal!',
                '{{ session('error') }}',
                'error'
            )
        </script>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{route('editProfile.post')}}" method="post" class="w-100" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::id() }}">
                <div class="w-100 row">
                    <div class="form-group col-md-6">
                        <label for="username" class="">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="{{$user->username ?? ''}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="name" class="">name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="name" value="{{$user->name ?? ''}}">
                    </div>
                </div>
                <div class="w-100 row">
                    <div class="form-group col-md-6">
                        <label for="email" class="">email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{$user->email ?? ''}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cv" class="">cv</label>
                        <input type="file" name="cv" id="cv" class="form-control" placeholder="cv">
                        @if ($user->userDetail->cv)
                            <a href="{{Storage::url($user->userDetail->cv)}}" target="_blank" rel="noopener noreferrer">Lihat CV</a>
                        @endif
                    </div>
                </div>
                <div class="w-100 row">
                    <div class="form-group col-md-6">
                        <label for="photo" class="">photo</label>
                        <input type="file" name="photo" id="photo" class="form-control" placeholder="photo">
                        @if ($user->userDetail->photo)
                            <a href="{{Storage::url($user->userDetail->photo)}}" target="_blank" rel="noopener noreferrer">Lihat Photo</a>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal_lahir" class="">tanggal_lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="tanggal_lahir" value="{{ $user->userDetail->tgl_lahir ? \Carbon\Carbon::parse($user->userDetail->tgl_lahir)->format('Y-m-d') : '' }}">
                    </div>
                </div>
                <div class="w-100 row">
                    <div class="form-group col-md-6">
                        <label for="profesi" class="">Profesi</label>
                        <input type="text" name="profesi" id="profesi" class="form-control" placeholder="Profesi" value="{{$user->userDetail->profesi ?? ''}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="work_at" class="">work_at</label>
                        <input type="text" name="work_at" id="work_at" class="form-control" placeholder="work_at" value="{{$user->userDetail->work_at ?? ''}}">
                    </div>
                </div>
                <div class="w-100 row">
                    <div class="form-group col-md-12">
                        <label for="About" class="">About</label>
                        <textarea name="about" id="about" class="form-control">{{$user->userDetail->about ?? ''}}</textarea>
                    </div>
                </div>
                <div class="w-100 row justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
@stop
