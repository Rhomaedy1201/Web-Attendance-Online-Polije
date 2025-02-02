@extends('layouts.app')

@section('title', 'Prodi')
@section('title_header', 'Prodi')
@section('desc_header', 'Master Data / Prodi')

@section('btnAdd')
<a href="{{ route('master-data.prodi.create') }}" class="btn btn-white btn-border btn-round mr-2">
	<i class="fas fa-plus"></i>
	Tambah Prodi
</a>
@endsection

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Prodi</h4>
				</div>
				<div class="card-body">
					<form id="form" method="get">
						<div class="table-responsive">
							<div class="row">
								<div class="col-md-10">
									<div class="d-flex align-items-center gap-8">
										<label for="page_length" class="mb-0">Show</label>
										<select name="page_length" class="form-select form-select-sm w-auto"
											id="page_length">
											<option value="5" @isset($_GET['page_length']) {{ $_GET['page_length']==5
												? 'selected' : '' }} @endisset>
												5</option>
											<option value="10" @isset($_GET['page_length']) {{ $_GET['page_length']==10
												? 'selected' : '' }} @endisset>
												10</option>
											<option value="20" @isset($_GET['page_length']) {{ $_GET['page_length']==20
												? 'selected' : '' }} @endisset>
												20</option>
											<option value="50" @isset($_GET['page_length']) {{ $_GET['page_length']==50
												? 'selected' : '' }} @endisset>
												50</option>
										</select>
										<label for="page_length" class="mb-0">entries</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-icon">
										<input type="text" class="form-control" placeholder="Search..." name="search"
											value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
										<span class="input-icon-addon">
											<i class="fa fa-search"></i>
										</span>
									</div>
								</div>
							</div>
							<table id="basic-datatables" class="display table table-striped table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Kode Prodi</th>
										<th>Nama Prodi</th>
										<th>Nama Jurusan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@php
									// $no = 1;
									$page = isset($_GET['page']) ? $_GET['page'] : 1;
									$page_length = isset($_GET['page_length']) ? $_GET['page_length'] : 5;
									$i = $page == 1 ? 1 : $page * $page_length - $page_length + 1;
									@endphp
									@foreach ($prodi as $item)
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{ $item->kode_prodi }}</td>
											<td>{{ $item->nama }}</td>
											<td>{{ $item->jurusan->nama }}</td>
											<td>
												<a href="{{ route('master-data.prodi.edit', $item->id) }}" class="btn btn-warning">
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
									@endforeach
								</tbody>
							</table>
							<nav aria-label="Page navigation example">
								{{ $prodi->links('pagination::bootstrap-5') }}
							</nav>
						</div>
					</form>
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