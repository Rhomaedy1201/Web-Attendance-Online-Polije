@extends('layouts.second_app')
@section('title', 'Mahasiswa')
@section('content')
<div class="page-header">
    <h4 class="page-title">Edit Mahasiswa</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="{{ url('/') }}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.mahasiswa') }}">Mahasiswa</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.mahasiswa.edit', '10') }}">Edit Mahasiswa</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit {{ $id }}</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nim">Nim</label>
                            <input type="text" class="form-control" id="Nim" placeholder="Enter Nim">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="Enter Nama">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                Jenis Kelamin @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih --</option>
                                <option value="P">Perempuan</option>
                                <option value="L">Laki-laki</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <input type="text" class="form-control" id="Alamat" placeholder="Enter Alamat">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Telp">Telp</label>
                            <input type="text" class="form-control" id="Telp" placeholder="Enter Telp">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                Angkatan @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih Angkatan --</option>
                                <option value="388">2020</option>
                                <option value="388">2021</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="semester">Semester Sekarang</label>
                            <input type="text" class="form-control" id="semester" placeholder="Enter Semester Kelas">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                Nama Prodi @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih Prodi --</option>
                                <option value="388">Teknologi Informasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Kelas</label>
                            <input type="email" class="form-control" id="nama" placeholder="Enter Nama Kelas">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary ml-2 mt-2" id="alert_success">
                    <span class="btn-label">
                        <i class="far fa-save"></i>
                    </span>
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('extraScript')
    <script>
        $('#alert_success').click(function(e) {
            swal("Good job!", "You clicked the button!", {
                icon : "success",
                buttons: {        			
                    confirm: {
                        className : 'btn btn-success'
                    }
                },
            });
        });
    </script>
@endpush