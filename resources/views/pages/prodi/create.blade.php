@extends('layouts.second_app')
@section('title', 'Prodi')
@section('content')
<div class="page-header">
    <h4 class="page-title">Tambah Prodi</h4>
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
            <a href="{{ route('master-data.prodi') }}">Prodi</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.prodi.create') }}">Tambah Prodi</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah</div>
            </div>
            <form action="{{ route('master-data.prodi.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    Nama Jurusan @include('components.text-required')
                                </label>
                                <select class="form-control" id="exampleFormControlSelect1" name="kode_jurusan" required>
                                    <option value="">-- Pilih Jurusan --</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->kode_jurusan }}" {{ old('kode_jurusan') == $item->kode_jurusan ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                    @endforeach
                                </select>                                                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Kode Prodi</label>
                                <input type="text" class="form-control" id="kode" name="kode_prodi" placeholder="Enter Kode Prodi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Prodi</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Enter Nama Prodi">
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
            </form>
        </div>
    </div>
</div>
@endsection