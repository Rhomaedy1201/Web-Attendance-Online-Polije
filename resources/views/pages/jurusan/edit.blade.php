@extends('layouts.second_app')
@section('title', 'Jurusan')
@section('content')
<div class="page-header">
    <h4 class="page-title">Edit Jurusan</h4>
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
            <a href="{{ route('master-data.jurusan') }}">Jurusan</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.jurusan.create') }}">Edit Jurusan</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit</div>
            </div>
            <form action="{{ route('master-data.jurusan.update', $jurusan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Kode Jurusan</label>
                                <input type="text" class="form-control" id="kode" name="kode_jurusan" placeholder="Enter Kode Jurusan" value="{{ $jurusan->kode_jurusan }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Jurusan</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Jurusan" value="{{ $jurusan->nama }}">
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary ml-2 mt-2" type="submit">
                        <span class="btn-label">
                            <i class="far fa-save"></i>
                        </span>
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection