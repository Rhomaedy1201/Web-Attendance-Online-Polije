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
            <a href="{{ route('master-data.matkul.edit') }}">Edit Mata Kuliah</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Edit</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode">Nama</label>
                            <input type="text" class="form-control" id="kode" placeholder="Nama Mata Kuliah" value="{{ $id }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                SKS @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih SKS --</option>
                                <option value="388">4</option>
                                <option value="388">6</option>
                                <option value="388" selected>8</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Dosen</label>
                            <input type="email" class="form-control" id="nama" placeholder="Nama Dosen Koordinator">
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