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
										<th>No</th>
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
									@php
										$page = isset($_GET['page']) ? $_GET['page'] : 1;
										$page_length = isset($_GET['page_length']) ? $_GET['page_length'] : 5;
										$i = $page == 1 ? 1 : $page * $page_length - $page_length + 1;
									@endphp
									@forelse ($mahasiswa as $item)
										<tr>
											<td>{{ $i++ }}</td>
											<td>{{ $item->nim }}</td>
											<td>{{ $item->mahasiswa->nama }}</td>
											@if ($item->jk == "L")
												<td>Laki-laki</td>
											@else
												<td>Perempuan</td>
											@endif
											<td>{{ $item->alamat }}</td>
											<td>{{ $item->telp }}</td>
											<td>{{ $item->golongan }}</td>
											<td>{{ $item->angkatan }}</td>
											<td>{{ $item->semester_sekarang }}</td>
											<td>{{ $item->prodi->nama }}</td>
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
												<button type="button" class="btn btn-danger modal-delete-item" data-target="#alert_warning{{ $item->nim }}" 
													data-toggle="modal" data-formid="{{ $item->nim }}" data-formname="{{ $item->mahasiswa->nama }}">
													<span class="btn-label">
														<i class="far fa-trash-alt"></i>
													</span>
													Hapus
												</button>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="11" class="text-center"><b>Data Mahasiswa Kosong.</b></td>
										</tr>
									@endforelse
								</tbody>
							</table>
							<nav aria-label="Page navigation example">
								{{ $mahasiswa->links('pagination::bootstrap-5') }}
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