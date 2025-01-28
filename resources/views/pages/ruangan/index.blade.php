@extends('layouts.app')

@section('title', 'Ruangan')
@section('title_header', 'Ruangan')
@section('desc_header', 'Master Data / Ruangan')

@section('btnAdd')
<a href="{{ route('master-data.ruangan.create') }}" class="btn btn-white btn-border btn-round mr-2">
	<i class="fas fa-plus"></i>
	Tambah Ruangan
</a>
@endsection

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Ruangan</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="basic-datatables" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Gedung</th>
									<th>Nama Kelas</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>Teknologi Informasi</td>
									<td>4.13</td>
									<td>
										<a href="{{ route('master-data.ruangan.edit', '10') }}" class="btn btn-warning">
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