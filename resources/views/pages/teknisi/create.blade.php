@extends('layouts.second_app')
@section('title', 'Teknisi')
@section('content')
<div class="page-header">
    <h4 class="page-title">Tambah Teknisi</h4>
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
            <a href="{{ route('master-data.teknisi') }}">Teknisi</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.teknisi.create') }}">Tambah Teknisi</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah</div>
            </div>
            <form action="{{ route('master-data.teknisi.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            Password otomatis dibuat berdasarkan NIP yang di daftarkan!.
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">NIP</label>
                                <input type="text" class="form-control" name="nip" placeholder="NIP Teknisi">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Teknisi">
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