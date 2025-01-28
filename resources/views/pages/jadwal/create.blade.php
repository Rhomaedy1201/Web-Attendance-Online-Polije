@extends('layouts.second_app')
@section('title', 'Prodi')
@section('content')
<div class="page-header">
    <h4 class="page-title">Tambah Jadwal</h4>
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
            <a href="{{ route('master-data.jadwal') }}">Jadwal</a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ route('master-data.jadwal.create') }}">Tambah Jadwal</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Tambah</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                Prodi @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih Prodi --</option>
                                <option value="388">Senin</option>
                                <option value="388">Selesa</option>
                                <option value="388">Rabu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                Hari @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih Hari --</option>
                                <option value="388">Senin</option>
                                <option value="388">Selesa</option>
                                <option value="388">Rabu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                Semester @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih Semester --</option>
                                <option value="388">1</option>
                                <option value="388">2</option>
                                <option value="388">3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">
                                Golongan @include('components.text-required')
                            </label>
                            <select class="form-control" id="exampleFormControlSelect1" required>
                                <option value="null">-- Pilih Golongan --</option>
                                <option value="388">A</option>
                                <option value="388">B</option>
                                <option value="388">C</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="content-dynamis" id="content-dynamis">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    Jam Masuk @include('components.text-required')
                                                </label>
                                                <div class="input-group mb-3" id="timePicker">
                                                    <input type="text" class="form-control timePicker"
                                                        placeholder="Jam Masuk" aria-describedby="basic-addon2">
                                                    <div class="input-group-append input-group-addon">
                                                        <span class="input-group-text"><i class="fa fa-clock-o"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    Toleransi Jam Masuk @include('components.text-required')
                                                </label>
                                                <div class="input-group mb-3" id="timePicker">
                                                    <input type="text" class="form-control timePicker"
                                                        placeholder="Toleransi Jam Masuk"
                                                        aria-describedby="basic-addon2">
                                                    <div class="input-group-append input-group-addon">
                                                        <span class="input-group-text"><i class="fa fa-clock-o"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    Jam Selesai @include('components.text-required')
                                                </label>
                                                <div class="input-group mb-3" id="timePicker">
                                                    <input type="text" class="form-control timePicker"
                                                        placeholder="Jam Selesai" aria-describedby="basic-addon2">
                                                    <div class="input-group-append input-group-addon">
                                                        <span class="input-group-text"><i class="fa fa-clock-o"
                                                                aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="durasi">Durasi</label>
                                                <input type="text" class="form-control" id="durasi"
                                                    placeholder="Nama Mata Kuliah" value="2 Jam" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    Mata Kuliah @include('components.text-required')
                                                </label>
                                                <select class="form-control" id="exampleFormControlSelect1" required>
                                                    <option value="null">-- Pilih Mata Kuliah --</option>
                                                    <option value="388">Matematika</option>
                                                    <option value="388">Data WhereHouse</option>
                                                    <option value="388">Basis Data</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    Semester @include('components.text-required')
                                                </label>
                                                <select class="form-control" id="exampleFormControlSelect1" required>
                                                    <option value="null">-- Pilih Semester --</option>
                                                    <option value="388">1</option>
                                                    <option value="388">2</option>
                                                    <option value="388">3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    Golongan @include('components.text-required')
                                                </label>
                                                <select class="form-control" id="exampleFormControlSelect1" required>
                                                    <option value="null">-- Pilih Golongan --</option>
                                                    <option value="388">A</option>
                                                    <option value="388">B</option>
                                                    <option value="388">C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">
                                                    Ruang @include('components.text-required')
                                                </label>
                                                <select class="form-control" id="exampleFormControlSelect1" required>
                                                    <option value="null">-- Pilih Ruang --</option>
                                                    <option value="388">Teknologi Informasi - 3.12</option>
                                                    <option value="388">Teknologi Informasi - 3.13</option>
                                                    <option value="388">Teknologi Informasi - 3.14</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-success mt-2" id="add-content">
                                +
                            </button>
                            <br>
                            <button class="btn btn-danger mt-2">
                                -
                            </button>
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

    var firstOpen = true;
    var time;
    $('#timePicker').datetimepicker({
        useCurrent: false,
        format: "hh:mm A"
    }).on('dp.show', function() {
        if(firstOpen) {
            time = moment().startOf('day');
            firstOpen = false;
        } else {
            time = "01:00 PM"
        }        
        $(this).data('DateTimePicker').date(time);
    });

    var idCard = 1;
    $('#content-dynamis').on('click', '#add-content', function(){
        $('#content-dynamis').append(`
            <div class="row" id="card-${idCard}">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Jam Masuk @include('components.text-required')
                                        </label>
                                        <div class="input-group mb-3" id="timePicker">
                                            <input type="text" class="form-control timePicker"
                                                placeholder="Jam Masuk" aria-describedby="basic-addon2">
                                            <div class="input-group-append input-group-addon">
                                                <span class="input-group-text"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Toleransi Jam Masuk @include('components.text-required')
                                        </label>
                                        <div class="input-group mb-3" id="timePicker">
                                            <input type="text" class="form-control timePicker"
                                                placeholder="Toleransi Jam Masuk"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append input-group-addon">
                                                <span class="input-group-text"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Jam Selesai @include('components.text-required')
                                        </label>
                                        <div class="input-group mb-3" id="timePicker">
                                            <input type="text" class="form-control timePicker"
                                                placeholder="Jam Selesai" aria-describedby="basic-addon2">
                                            <div class="input-group-append input-group-addon">
                                                <span class="input-group-text"><i class="fa fa-clock-o"
                                                        aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="durasi">Durasi</label>
                                        <input type="text" class="form-control" id="durasi"
                                            placeholder="Nama Mata Kuliah" value="2 Jam" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Mata Kuliah @include('components.text-required')
                                        </label>
                                        <select class="form-control" id="exampleFormControlSelect1" required>
                                            <option value="null">-- Pilih Mata Kuliah --</option>
                                            <option value="388">Matematika</option>
                                            <option value="388">Data WhereHouse</option>
                                            <option value="388">Basis Data</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Semester @include('components.text-required')
                                        </label>
                                        <select class="form-control" id="exampleFormControlSelect1" required>
                                            <option value="null">-- Pilih Semester --</option>
                                            <option value="388">1</option>
                                            <option value="388">2</option>
                                            <option value="388">3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Golongan @include('components.text-required')
                                        </label>
                                        <select class="form-control" id="exampleFormControlSelect1" required>
                                            <option value="null">-- Pilih Golongan --</option>
                                            <option value="388">A</option>
                                            <option value="388">B</option>
                                            <option value="388">C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Ruang @include('components.text-required')
                                        </label>
                                        <select class="form-control" id="exampleFormControlSelect1" required>
                                            <option value="null">-- Pilih Ruang --</option>
                                            <option value="388">Teknologi Informasi - 3.12</option>
                                            <option value="388">Teknologi Informasi - 3.13</option>
                                            <option value="388">Teknologi Informasi - 3.14</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-success mt-2" id="add-content">
                        +
                    </button>
                    <br>
                    <button class="btn btn-danger mt-2 remove-content" data-id="${idCard}">
                        -
                    </button>
                </div>
            </div>
        `);
        idCard++;
    });

    $('#content-dynamis').on('click', '.remove-content', function () {
        var idToRemove = $(this).data('id');
        $('#card-' + idToRemove).remove();
    });
</script>
@endpush