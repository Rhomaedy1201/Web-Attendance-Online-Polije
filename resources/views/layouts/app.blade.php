<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('template/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('template/assets/css/fonts.min.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ asset('template/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template/assets/css/atlantis.min.css') }}">
</head>
<body>
	<div class="wrapper">
		@include('partials.header')
		@include('partials.sidebar')
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">@yield('title_header', 'Dashboard')</h2>
								<h5 class="text-white op-7 mb-2">@yield('desc_header')</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								@yield('btnAdd')
							</div>
						</div>
					</div>
				</div>
				@yield('content')
			</div>
			@include('partials.footer')
		</div>
    </div>
	@include('partials.scripts')
	@stack('extraScript')
</body>
</html>