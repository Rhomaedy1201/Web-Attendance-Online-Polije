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
					<div class="table-responsive">
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
								<tr>
									<td>1</td>
									<td>0937776</td>
									<td>Teknik Informatika</td>
									<td>Teknologi Informasi</td>
									<td>
										<a href="{{ route('master-data.prodi.edit', '10') }}" class="btn btn-warning">
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
