@extends('layouts.app')

@section('title', 'Golongan')
@section('title_header', 'Golongan')
@section('desc_header', 'Master Data / Golongan')

@section('btnAdd')
<a href="{{ route('master-data.golongan.create') }}" class="btn btn-white btn-border btn-round mr-2">
	<i class="fas fa-plus"></i>
	Tambah Golongan
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
					<h4 class="card-title">Data Golongan</h4>
				</div>
				<form id="form" method="get">
					<div class="card-body">
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
										<th>Golongan</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@php
									$page = isset($_GET['page']) ? $_GET['page'] : 1;
									$page_length = isset($_GET['page_length']) ? $_GET['page_length'] : 5;
									$i = $page == 1 ? 1 : $page * $page_length - $page_length + 1;
									@endphp
									@forelse ($golongan as $item)
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{ $item->golongan }}</td>
											<td>
												{{-- <a href="{{ route('master-data.golongan.edit', $item->golongan) }}" class="btn btn-warning">
													<span class="btn-label">
														<i class="fas fa-edit"></i>
													</span>
													Edit
												</a> --}}
												<button type="button" class="btn btn-danger modal-delete-item" data-target="#alert_warning{{ $item->golongan }}" 
													data-toggle="modal" data-formid="{{ $item->golongan }}" data-formname="{{ $item->golongan }}">
													<span class="btn-label">
														<i class="far fa-trash-alt"></i>
													</span>
													Hapus
												</button>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="4" class="text-center"><b>Data Golongan Kosong.</b></td>
										</tr>
									@endforelse
								</tbody>
							</table>
							<nav aria-label="Page navigation example">
								{{ $golongan->links('pagination::bootstrap-5') }}
							</nav>
						</div>
					</div>
				</form>
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
							Apakah anda ingin menghapus golongan <i><b>${formname}?</b></i>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
							<form action="{{ route('master-data.golongan.delete') }}" method="POST">
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