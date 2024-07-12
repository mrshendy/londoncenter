<!-- Title -->
<title> @yield('title') </title>


<!-- Favicon -->
<link rel="icon" href="{{ asset('assets_website/img/Logo.png') }}" type="image/x-icon" />


<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap"
    rel="stylesheet">
<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- Libraries Stylesheet -->

<link href="{{ asset('assets_website/lib/animate/animate.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets_website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />




@if (App::getlocale() == 'ar')
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets_website/css/bootstrapRtl.min.css') }}" rel="stylesheet" />
    <!-- Template Stylesheet -->
    <link href="{{ asset('assets_website/css/styleRtl.css') }}" rel="stylesheet" />
@endif
@if (App::getlocale() == 'en')
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets_website/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- Template Stylesheet -->
    <link href="{{ asset('assets_website/css/style.css') }}" rel="stylesheet" />
@endif
