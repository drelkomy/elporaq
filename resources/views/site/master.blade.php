<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>@yield('title','البراق للاستشارات الاقتصادية ودراسات الجدوى')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="مشروع ,استشارات اقتصادية, دراسات جدوى, خدمات">
    <meta name="google-site-verification" content="_k4bjG8HX2eeoOFLx3AjbIewB0xIZtttMgLFJZqiHxw" />
    <meta name="description" content="البراق للاستشارات الاقتصادية ودراسات الجدوى تقدم خدمات متميزة في مجال الاستشارات والدراسات.">
    <link href="{{ asset('site/img/favicon.ico') }}" rel="icon">
   <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('site/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">


        
</head>
<body>
    <!-- Header Start -->
    @include('site.top')
    @include('site.nav')
    <!-- Header End -->

    <!-- Carousel Start -->
    @include('site.carsoul')
    <!-- Carousel End -->
	@include('site.whatsapp')
    <!-- Content Sections -->
    @include('site.about')
    @include('site.number')
    @include('site.investment-categories')
    @include('site.service')
    @include('site.roadmap')
    @include('investment-opportunities.recent-invest')
    @include('site.partner')
    @include('site.recentPosts')

    <!-- Back to Top -->
    <a href="#" class="btn btn-square rounded-circle back-to-top" style="background-color:#d98c29;"><i class="fa fa-arrow-up text-white"></i></a>

    <!-- Footer -->
    @include('site.footer')
     <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('site/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('site/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('site/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('site/js/main.js') }}"></script>
</body>
</html>
