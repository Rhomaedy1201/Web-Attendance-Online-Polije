@extends('layouts.app')

@section('title', 'History Presensi')
@section('title_header', 'History Presensi')
@section('desc_header', 'Master Data / History Presensi')

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card full-height">
				<form action="{{ route('master-data.jadwal') }}" method="GET">
					<div class="card-body">
						<div class="row d-flex align-items-end">
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Prodi</label>
									<select class="form-control" name="kode_prodi" required>
										<option value="">-- Pilih Prodi --</option>
										{{-- @foreach ($prodi as $item)
											<option value="{{ $item->kode_prodi }}" 
												{{ request()->kode_prodi == $item->kode_prodi ? 'selected' : '' }}>
												{{ $item->nama }}
											</option>
										@endforeach --}}
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Semester</label>
									<select class="form-control" name="semester" required>
										<option value="">-- Pilih Semester --</option>
										<option value="1" {{ request()->semester == 1 ? 'selected' : '' }}>1</option>
										<option value="2" {{ request()->semester == 2 ? 'selected' : '' }}>2</option>
										<option value="3" {{ request()->semester == 3 ? 'selected' : '' }}>3</option>
										<option value="4" {{ request()->semester == 4 ? 'selected' : '' }}>4</option>
										<option value="5" {{ request()->semester == 5 ? 'selected' : '' }}>5</option>
										<option value="6" {{ request()->semester == 6 ? 'selected' : '' }}>6</option>
										<option value="7" {{ request()->semester == 7 ? 'selected' : '' }}>7</option>
										<option value="8" {{ request()->semester == 8 ? 'selected' : '' }}>8</option>
									</select>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="exampleFormControlSelect1">Golongan</label>
									<select class="form-control" name="golongan" required>
										<option value="">-- Pilih Golongan --</option>
										{{-- @foreach ($golongan as $item)
											<option value="{{ $item->golongan }}" {{ request()->golongan == $item->golongan ? 'selected' : ''}}>
												{{ $item->golongan }}</option>
										@endforeach --}}
									</select>
								</div>
							</div>
							<div class="mb-2">
								<button class="btn btn-primary" type="submit">
									<span class="btn-label">
										<i class="fas fa-filter"></i>
									</span>
									Filter
								</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data History Presensi</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="basic-datatables" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>Hari</th>
									<th>Jam Masuk</th>
									<th>Toleransi Masuk</th>
									<th>Jam Selesai</th>
									<th>Durasi</th>
									<th>Mata Kuliah</th>
									<th>Ruang</th>
									<th>Dosen Koordinator</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								{{-- @forelse ($jadwal as $item)
									<tr>
										<td>{{ $item->hari }}</td>
										<td>{{ $item->jam_masuk }}</td>
										<td>{{ $item->jam_toleransi_masuk }}</td>
										<td>{{ $item->jam_selesai }}</td>
										<td>{{ $item->durasi }}</td>
										<td>{{ $item->matkul->nama }}</td>
										<td>Gedung {{ $item->ruangan->jurusan->nama }} - Kelas {{ $item->ruangan->nama_kelas }}</td>
										<td>{{ $item->matkul->dosen->nama }}</td>
										<td>
											<a href="{{ route('master-data.jadwal.edit', '10') }}" class="btn btn-warning">
												<span class="btn-label">
													<i class="fas fa-edit"></i>
												</span>
												Edit
											</a>
											<button class="btn btn-danger" id="alert_warning">
												<span class="btn-label">
													<i class="far fa-trash-alt"></i>
												</span>
												Hapus
											</button>
										</td>
									</tr>
								@empty
									@php
										if (request()->kode_prodi && request()->golongan) {
											$prodi = request()->kode_prodi ?? App\Models\Prodi::where('kode_prodi', request()->kode_prodi)->first();
											$golongan = request()->golongan ?? App\Models\Golongan::where('golongan', request()->golongan)->first();
										} else {
											$prodi = "";
											$golongan = "";
										}
										
									@endphp
									@if (request()->kode_prodi && request()->golongan && count($jadwal) != 0)
										<tr>
											<td colspan="9" class="text-center"><b>Data Jadwal Berdasarkan dengan Prodi: {{ $prodi->nama }}, Semester: {{ request()->semester }} dan Golongan: {{ $golongan->golongan }} Kosong.</b></td>
										</tr>
									@else
										<tr>
											<td colspan="9" class="text-center"><b>Untuk melihat data jadwal silahkan filter data.</b></td>
										</tr>
									@endif
								@endforelse --}}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection