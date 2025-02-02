@extends('layouts.second_app')
@section('title', 'Prodi')
@section('content')
<div class="page-header">
    <h4 class="page-title">Edit Dosen</h4>
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
            <a href="{{ route('master-data.dosen') }}">Dosen</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.dosen.edit', '10') }}">Edit Dosen</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah</div>
            </div>
            <form action="{{ route('master-data.dosen.update', $dosen->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Nip</label>
                                <input type="text" class="form-control" name="nip" placeholder="Masukkan Nip" value="{{ $dosen->nip }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Dosen</label>
                                <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Dosen" value="{{ $dosen->nama }}">
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