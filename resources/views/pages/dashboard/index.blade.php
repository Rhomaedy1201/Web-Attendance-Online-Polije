@extends('layouts.app')

@section('title', 'Halaman Utama')
@section('title_header', 'Dashboard')
@section('desc_header', 'Dashboard')

@section('content')
<div class="page-inner mt--5">
	<div class="row mt--2">
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">Jumlah Jurusan</div>
					<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="v-jurusan" hidden>{{ $jurusan }}</div>
							<div id="jurusan"></div>
							<h6></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">Jumlah Mata Kuliah</div>
					<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="v-matkul" hidden>{{ $matkul }}</div>
							<div id="circles-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card full-height">
				<div class="card-body">
					<div class="card-title">Jumlah Mahasiswa</div>
					<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
						<div class="px-2 pb-2 pb-md-0 text-center">
							<div id="v-mhs" hidden>{{ $mahasiswa }}</div>
							<div id="circles-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push("extraScript")
<script>
	$(document).ready(function () {
		var jurusan = document.getElementById("v-jurusan").innerText;
		var matkul = document.getElementById("v-matkul").innerText;
		var mhs = document.getElementById("v-mhs").innerText;

		Circles.create({
			id:'jurusan',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: jurusan,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
	
		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: matkul,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
	
		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: mhs,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
	});
</script>
@endpush