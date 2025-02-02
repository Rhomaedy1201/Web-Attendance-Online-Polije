@extends('layouts.second_app')
@section('title', 'Prodi')
@section('content')
<div class="page-header">
    <h4 class="page-title">Edit Mata Kuliah</h4>
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
            <a href="{{ route('master-data.matkul') }}">Mata Kuliah</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.matkul.edit', '10') }}">Edit Mata Kuliah</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit</div>
            </div>
            <form action="{{ route('master-data.matkul.update', $matkul->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    Prodi @include('components.text-required')
                                </label>
                                <select class="form-control" name="kode_prodi" required>
                                    <option value="">-- Pilih Prodi --</option>
                                    @foreach ($prodi as $item)
                                        <option value="{{ $item->kode_prodi }}" {{ old('kode_prodi', $item->kode_prodi) == $item->kode_prodi ? 'selected' : '' }}>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode">Nama @include('components.text-required')</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Mata Kuliah" value="{{ $matkul->nama }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    SKS @include('components.text-required')
                                </label>
                                <select class="form-control" name="sks" required>
                                    <option value="">-- Pilih SKS --</option>
                                    <option value="2" {{ $matkul->sks == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $matkul->sks == 3 ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ $matkul->sks == 4 ? 'selected' : '' }}>4</option>
                                    <option value="6" {{ $matkul->sks == 6 ? 'selected' : '' }}>6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">
                                    Dosen Koordinator @include('components.text-required')
                                </label>
                                <select class="form-control" name="id_dosen" required>
                                    <option value="">-- Pilih Dosen --</option>
                                    <@foreach ($dosen as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ old('id', $item->id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
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