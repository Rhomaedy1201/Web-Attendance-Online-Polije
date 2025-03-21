@extends('layouts.app')

@section('title', 'Jurusan')
@section('title_header', 'Jurusan')
@section('desc_header', 'Master Data / Jurusan')
@section('btnAdd')
<a href="{{ route('master-data.jurusan.create') }}" class="btn btn-white btn-border btn-round mr-2">
	<i class="fas fa-plus"></i>
	Tambah Jurusan
</a>
@endsection

@section('modal')
<div id="modalDelete"></div>
@endsection

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Data Jurusan</h4>
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
										<th>No.</th>
										<th>Kode Jurusan</th>
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
									@foreach ($jurusan as $item)
									<tr>
										<td>{{ $i++ }}</td>
										<td>{{ $item->kode_jurusan }}</td>
										<td>{{ $item->nama }}</td>
										<td>
											<a href="{{ route('master-data.jurusan.edit', $item->id) }}"
												class="btn btn-warning">
												<span class="btn-label">
													<i class="fas fa-edit"></i>
												</span>
												Edit
											</a>
											<button type="button" class="btn btn-danger modal-delete-item" data-target="#alert_warning{{ $item->id }}" 
												data-toggle="modal" data-formid="{{ $item->id }}" data-formname="{{ $item->nama }}">
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
								{{ $jurusan->links('pagination::bootstrap-5') }}
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
	$('#page_length').on('change', function() {
            $('#form').submit();
    });

	$('.modal-delete-item').on('click', function(){
		var formId = $(this).data('formid');
        var formname = $(this).data('formname');

		$('#modalDelete').empty();
		$('#modalDelete').html(`
			<div class="modal fade" id="alert_warning${formId}" tabindex="-1" role="dialog"
			aria-labelledby="alert_warningLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title font-weight-bold" id="alert_warningLabel">
								Warning!
							</h4>
							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Apakah anda ingin menghapus jurusan <i><b>${formname}?</b></i>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
							<form action="{{ route('master-data.jurusan.delete') }}" method="POST">
								@csrf
								<input type="hidden" name="formId" value="${formId}">
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		`);
	});
</script>
@endpush