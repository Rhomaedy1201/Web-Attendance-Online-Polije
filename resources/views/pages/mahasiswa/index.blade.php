@extends('layouts.app')

@section('title', 'Mahasiswa')
@section('title_header', 'Mahasiswa')
@section('desc_header', 'Master Data / Mahasiswa')

@section('btnAdd')
<a href="{{ route('master-data.mahasiswa.create') }}" class="btn btn-white btn-border btn-round mr-2">
	<i class="fas fa-plus"></i>
	Tambah Mahasiswa
</a>
@endsection

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Mahasiswa</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="basic-datatables" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>NIM</th>
									<th>Nama</th>
									<th>JK</th>
									<th>Alamat</th>
									<th>Telp</th>
									<th>Gol</th>
									<th>Angkatan</th>
									<th>Semester</th>
									<th>Prodi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>E41211041</td>
									<td>Muhamad Rhomaedi</td>
									<td>Laki-laki</td>
									<td>Bondowoso</td>
									<td>085678098765</td>
									<td>C</td>
									<td>2021</td>
									<td>8</td>
									<td>Teknik Informatika</td>
									<td>
										<button class="btn btn-primary" id="alert_warning">
											<span class="btn-label">
												<i class="far fa-trash-alt"></i>
											</span>
											Reset Password
										</button>
										<a href="{{ route('master-data.mahasiswa.edit', '10') }}" class="btn btn-warning">
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