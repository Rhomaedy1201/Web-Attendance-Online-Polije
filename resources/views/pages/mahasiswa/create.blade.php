@extends('layouts.second_app')
@section('title', 'Mahasiswa')
@section('content')
<div class="page-header">
    <h4 class="page-title">Tambah Mahasiswa</h4>
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
            <a href="{{ route('master-data.mahasiswa.create') }}">Tambah Mahasiswa</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah</div>
            </div>
            <form action="{{ route('master-data.mahasiswa.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Nim">Nim  @include('components.text-required')</label>
                                <input type="text" class="form-control" name="nim" placeholder="Enter Nim">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Nama">Nama  @include('components.text-required')</label>
                                <input type="text" class="form-control" name="nama" placeholder="Enter Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Jenis Kelamin @include('components.text-required')
                                </label>
                                <select class="form-control" name="jk" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="P">Perempuan</option>
                                    <option value="L">Laki-laki</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Alamat">Alamat  @include('components.text-required')</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Enter Alamat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Telp">Telp  @include('components.text-required')</label>
                                <input type="text" class="form-control" name="telp" placeholder="Enter Telp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Angkatan @include('components.text-required')
                                </label>
                                <select class="form-control" name="angkatan" required>
                                    <option value="">-- Pilih Angkatan --</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Nama Prodi @include('components.text-required')
                                </label>
                                <select class="form-control" name="kode_prodi" required>
                                    <option value="">-- Pilih Prodi --</option>
                                    @foreach ($prodi as $item)
                                        <option value="{{ $item->kode_prodi }}" 
                                            {{ old('kode_prodi') == $item->kode_prodi ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    Golongan @include('components.text-required')
                                </label>
                                <select class="form-control" name="golongan" required>
                                    <option value="">-- Pilih Golongan --</option>
                                    @foreach ($golongan as $item)
                                        <option value="{{ $item->golongan }}" {{ old('golongan') == $item->golongan ? 'selected' : ''}}>
                                            {{ $item->golongan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Telp">Semester  @include('components.text-required')</label>
                                <input type="text" class="form-control" name="semester_sekarang" placeholder="Contoh. 1" >
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