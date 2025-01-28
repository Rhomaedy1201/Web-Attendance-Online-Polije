@extends('layouts.app')

@section('title', 'Jadwal')
@section('title_header', 'Jadwal')
@section('desc_header', 'Master Data / Jadwal')

@section('btnAdd')
<a href="{{ route('master-data.jadwal.create') }}" class="btn btn-white btn-border btn-round mr-2">
	<i class="fas fa-plus"></i>
	Tambah Jadwal
</a>
@endsection

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-body">
					<div class="row d-flex align-items-end">
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Prodi</label>
								<select class="form-control" id="exampleFormControlSelect1">
									<option>-- Pilih Prodi --</option>
									<option>Teknik Informatika</option>
								</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Semester</label>
								<select class="form-control" id="exampleFormControlSelect1">
									<option>-- Pilih Semester --</option>
									<option>1</option>
									<option>2</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="exampleFormControlSelect1">Kelas</label>
								<select class="form-control" id="exampleFormControlSelect1">
									<option>-- Pilih Kelas --</option>
									<option>A</option>
									<option>B</option>
								</select>
							</div>
						</div>
						<div class="mb-2">
							<button class="btn btn-primary" id="alert_warning">
								<span class="btn-label">
									<i class="fas fa-filter"></i>
								</span>
								Filter
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Jadwal</h4>
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
								<tr>
									<td>Senin</td>
									<td>07:30</td>
									<td>15 Menit</td>
									<td>09:30</td>
									<td>2 Jam</td>
									<td>Matematika</td>
									<td>Gedung Teknologi Informatika - Kelas 3.12</td>
									<td>Bu Vany</td>
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
								<tr>
									<td>Senin</td>
									<td>09:30</td>
									<td>15 Menit</td>
									<td>11:30</td>
									<td>2 Jam</td>
									<td>Basis Data</td>
									<td>Gedung Teknologi Informatika - Lantai 4</td>
									<td>Pak Denny</td>
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
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('extraScript')
<script>
	$('#alert_warning').click(function(e) {
		swal({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			type: 'warning',
			buttons:{
				cancel: {
					visible: true,
					text : 'No, cancel!',
					className: 'btn btn-danger'
				},        			
				confirm: {
					text : 'Yes, delete it!',
					className : 'btn btn-success'
				}
			}
		}).then((willDelete) => {
			if (willDelete) {
				swal("Poof! Your imaginary file has been deleted!", {
					icon: "success",
					buttons : {
						confirm : {
							className: 'btn btn-success'
						}
					}
				});
			} else {
				swal("Your imaginary file is safe!", {
					buttons : {
						confirm : {
							className: 'btn btn-success'
						}
					}
				});
			}
		});
	})
</script>
@endpush