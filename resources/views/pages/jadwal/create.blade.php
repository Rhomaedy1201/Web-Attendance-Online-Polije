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
            <form action="{{ route('master-data.jadwal.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    Prodi @include('components.text-required')
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    Hari @include('components.text-required')
                                </label>
                                <select class="form-control" name="hari" required>
                                    <option value="">-- Pilih Hari --</option>
                                    <option value="senin">Senin</option>
                                    <option value="selasa">Selesa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>
                                    Semester @include('components.text-required')
                                </label>
                                <select class="form-control" name="semester" required>
                                    <option value="">-- Pilih Semester --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
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
                    </div>
                    <br>
                    <div class="content-dynamis" id="content-dynamis">
                        <div class="row" id="card">
                            <div class="col-md-11">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Jam Masuk @include('components.text-required')</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control timePicker jam-masuk" name="jam_masuk[]" placeholder="Jam Masuk">
                                                        <div class="input-group-append input-group-addon">
                                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Toleransi Jam Masuk @include('components.text-required')</label>
                                                    <input type="text" class="form-control" name="jam_toleransi_masuk[]" placeholder="Contoh. 15">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Jam Selesai @include('components.text-required')</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control timePicker jam-selesai" name="jam_selesai[]" placeholder="Jam Selesai">
                                                        <div class="input-group-append input-group-addon">
                                                            <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="durasi">Durasi</label>
                                                    <input type="text" class="form-control durasi" name="durasi[]" placeholder="Durasi" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>
                                                        Mata Kuliah @include('components.text-required')
                                                    </label>
                                                    <select class="form-control" name="id_mk[]" required>
                                                        <option value="">-- Pilih Mata Kuliah --</option>
                                                        @foreach ($matkul as $item)
                                                            <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">
                                                        Ruang @include('components.text-required')
                                                    </label>
                                                    <select class="form-control" name="id_ruang[]" required>
                                                        <option value="">-- Pilih Ruang --</option>
                                                        @foreach ($ruang as $item)
                                                            <option value="{{ $item->id }}" 
                                                                {{ old('id') == $item->id ? 'selected' : '' }}>
                                                                {{ $item->jurusan->nama }} - {{ $item->nama_kelas }}
                                                            </option>
                                                        @endforeach
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
@push('extraScript')
<script>
$(document).ready(function () {
    var idCard = 1;

    // Fungsi untuk menginisialisasi timepicker
    function initializeTimePicker(element) {
        element.datetimepicker({
            useCurrent: false,
            format: "HH:mm",
            icons: {
                time: 'fa fa-clock-o',
                date: 'fa fa-calendar',
                up: 'fa fa-chevron-up',
                down: 'fa fa-chevron-down',
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-crosshairs',
                clear: 'fa fa-trash',
                close: 'fa fa-times'
            }
        });
    }

    initializeTimePicker($('.timePicker'));

    // Fungsi untuk menghitung durasi otomatis
    function hitungDurasi(row) {
        var jamMasuk = row.find('.jam-masuk').val();
        var jamSelesai = row.find('.jam-selesai').val();
        var durasiInput = row.find('.durasi');

        if (jamMasuk && jamSelesai) {
            var startTime = moment(jamMasuk, "HH:mm");
            var endTime = moment(jamSelesai, "HH:mm");

            if (endTime.isBefore(startTime)) {
                endTime.add(1, 'days');
            }

            var duration = moment.duration(endTime.diff(startTime));
            var totalJam = duration.asHours();

            durasiInput.val(totalJam + " Jam");
        }
    }
    
    // $('#content-dynamis').on('dp.change', '.jam-masuk, .jam-selesai', function () {
    //     hitungDurasi($(this).closest('.row'));
    // });

    $('#content-dynamis').on('click', '#add-content', function () {
        var newRow = $(`
            <div class="row mt-3" id="card-${idCard}">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Masuk @include('components.text-required')</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control timePicker jam-masuk" name="jam_masuk[]" placeholder="Jam Masuk">
                                            <div class="input-group-append input-group-addon">
                                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Toleransi Jam Masuk @include('components.text-required')</label>
                                        <input type="text" class="form-control" name="jam_toleransi_masuk[]" placeholder="Contoh. 15">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jam Selesai @include('components.text-required')</label>
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control timePicker jam-selesai" name="jam_selesai[]" placeholder="Jam Selesai">
                                            <div class="input-group-append input-group-addon">
                                                <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Durasi</label>
                                        <input type="text" class="form-control durasi" name="durasi[]" placeholder="Durasi" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>
                                            Mata Kuliah @include('components.text-required')
                                        </label>
                                        <select class="form-control" name="id_mk[]" required>
                                            <option value="">-- Pilih Mata Kuliah --</option>
                                            @foreach ($matkul as $item)
                                                <option value="{{ $item->id }}" {{ old('id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">
                                            Ruang @include('components.text-required')
                                        </label>
                                        <select class="form-control" name="id_ruang[]" required>
                                            <option value="">-- Pilih Ruang --</option>
                                            @foreach ($ruang as $item)
                                                <option value="{{ $item->id }}" 
                                                    {{ old('id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->jurusan->nama }} - {{ $item->nama_kelas }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-danger mt-2 remove-content" data-id="${idCard}">-</button>
                </div>
            </div>
        `);

        $('#content-dynamis').append(newRow);

        // Inisialisasi timepicker pada elemen baru
        initializeTimePicker(newRow.find('.timePicker'));

        idCard++;
    });

    // Menghapus elemen dinamis
    $('#content-dynamis').on('click', '.remove-content', function () {
        $(this).closest('.row').remove();
    });

    // Event listener untuk elemen dinamis saat terjadi perubahan
    $('#content-dynamis').on('dp.change', '.jam-masuk, .jam-selesai', function () {
        hitungDurasi($(this).closest('.row'));
    });
});
</script>
@endpush