
<!DOCTYPE html>
<html lang="en">
	<head>

        @php
            $homeContent = \App\Models\HomePage::first();
        @endphp
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="{{ $homeContent->meta_description }}">
		<meta name="keywords" content="{{ $homeContent->meta_keywords }}">
		<meta name="author" content="doctorinfobd">
		<meta property="og:url" content="{{ route('home') }}">
		<meta property="og:type" content="website">
		<meta property="og:title" content="404">
		<meta property="og:description" content="{{ $homeContent->meta_description }}">
		<meta property="og:image" content="assets/img/preview-banner.jpg">
		<meta name="twitter:card" content="summary_large_image">
		<meta property="twitter:domain" content="{{ route('home') }}">
		<meta property="twitter:url" content="{{ route('home') }}">
		<meta name="twitter:title" content="{{ $homeContent->meta_title }}">
		<meta name="twitter:description" content="{{ $homeContent->meta_description }}">
		<meta name="twitter:image" content="{{ asset('frontend/assets/img/preview-banner.jpg') }}">
		<title>404 - Not Found| Doctorinfobd</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.png') }}" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/fontawesome/css/all.min.css') }}">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="{{ asset('frontend/assets/css/feather.css') }}">

		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

	</head>		
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<section class="error-section d-flex justify-content-center align-items-center" style="height:100vh">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-12 text-center">
							<div class="error-info">
								<div class="error-404-img">
									<img src="{{ asset('frontend/assets/img/error-404.png') }}" class="img-fluid" alt="error-404-image">
									<div class="error-content error-404-content">
										<h2>Oops! That Page Can't Be Found.</h2>
										<p>The page you are looking for was never existed.</p>
										<a href="{{ route('home') }}" class="btn btn-primary prime-btn">Back to Home</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Error 404 -->			

		</div>		
		<!-- /Main Wrapper -->
	
		<!-- jQuery -->
		<script src="assets/js/jquery-3.7.0.min.js"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js"></script>
				
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
	
	</body>
</html>