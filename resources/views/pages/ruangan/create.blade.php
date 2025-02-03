@extends('layouts.second_app')
@section('title', 'Ruangan')
@section('content')
<div class="page-header">
    <h4 class="page-title">Tambah Ruangan</h4>
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
            <a href="{{ route('master-data.ruangan') }}">Ruangan</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.ruangan.create') }}">Tambah Ruangan</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah</div>
            </div>
            <form action="{{ route('master-data.ruangan.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    Nama Gedung @include('components.text-required')
                                </label>
                                <select class="form-control" name="kode_jurusan" required>
                                    <option value="">-- Pilih Gedung --</option>
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->kode_jurusan }}" {{ old('kode_jurusan') == $item->kode_jurusan ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Kelas</label>
                                <input type="text" class="form-control" name="nama_kelas" placeholder="Enter Nama Kelas">
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