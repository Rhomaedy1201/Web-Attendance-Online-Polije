@extends('layouts.app')

@section('title', 'Teknisi')
@section('title_header', 'Teknisi')
@section('desc_header', 'Master Data / Teknisi')

@section('btnAdd')
<a href="{{ route('master-data.teknisi.create') }}" class="btn btn-white btn-border btn-round mr-2">
	<i class="fas fa-plus"></i>
	Tambah Teknisi
</a>
@endsection

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Teknisi</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="basic-datatables" class="display table table-striped table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nip</th>
									<th>Nama</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>1232423776</td>
									<td>habibi</td>
									<td>
										<a href="{{ route('master-data.teknisi.edit', '10') }}" class="btn btn-warning">
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