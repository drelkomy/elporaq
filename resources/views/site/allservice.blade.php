<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'خدمات البراق')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="استشارات اقتصادية, دراسات جدوى, خدمات">
    <meta name="description" content="البراق للاستشارات الاقتصادية ودراسات الجدوى تقدم خدمات متميزة في مجال الاستشارات والدراسات.">
    <link href="{{ asset('site/img/favicon.ico') }}" rel="icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{ asset('site/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f4f4f9; /* خلفية اللون الفاتح */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 10px;
        }

        .background-section {
            position: relative;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            margin-right: calc(-50vw + 50%);
            height: 250px;
            border: 1px solid #ddd;
            background-color: #e9ecef; /* خلفية فاتحة تتماشى مع النص */
        }

        .background-section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .breadcrumb {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 1em;
            line-height: 1.5;
            display: flex;
            align-items: center;
            font-family: 'Cairo', sans-serif;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .info-section {
            background-color: #FAFAD2;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 25px;
            text-align: center;
        }

        .info-section p {
            font-size: 1.3em;
            color: #555;
        }

        .info-section:hover {
            color: blue;
        }

        .service-box {
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .service-box h4 {
            font-size: 1.5em;
            color: #333;
            text-align: center;
            background-color: #FFAB00;
            border-radius: 50px;
            padding: 10px;
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .service-box h4:hover {
            background-color: #e09b00;
            color: #fff;
        }

        .service-box p {
            font-size: 1.2em;
            color: #777;
        }

        .service-box .btn-primary {
            background-color: #FFAB00;
            border: none;
        }

        .service-box .btn-primary:hover {
            background-color: #e09b00;
        }

        .service-box .btn-success {
            background-color: #28a745;
            border: none;
        }

        .service-box .btn-success:hover {
            background-color: #218838;
        }

        .project-img img {
            border-radius: 10px;
            width: 100%; /* تأكيد تطابق حجم الصورة مع الحاوية */
            height: auto;
            transition: transform 0.3s ease;
        }

        .project-img img:hover {
            transform: scale(1.05);
        }

        .service-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .service-content h4 {
            margin-bottom: 20px;
        }

        .service-content p {
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        .btn-container .btn {
            flex: 1;
            text-align: center;
        }
    </style>
</head>

<body>
    @include('site.top')
    @include('site.nav')
    <div class="container">
        <!-- القسم مع الصورة كخلفية -->
        <section class="background-section">
            <img src="{{ asset('images/pages/18.png') }}" alt="Background Image">
            <div class="breadcrumb">
                <a class="m-3" href="{{ url('/') }}">الصفحة الرئيسية</a> &gt;
                <a class="m-3" href="{{ url('/') }}">الخدمات</a>
                @if($service)
                    &gt; <span class="current-service">{{ $service->service_name }}</span>
                @endif
            </div>
        </section>

        @if($service)
            <!-- عرض خدمة مفردة -->
            <div class="row g-5">
                <div class="col-12 wow fadeIn" data-wow-delay=".3s">
                    <div class="service-box">
                        <div class="row">
                            <!-- العمود الأول: صورة الخدمة -->
                            <div class="col-md-6">
                                <div class="project-img">
                                    <img src="{{ asset('images/services/' . $service->service_image) }}" class="img-fluid rounded">
                                </div>
                            </div>

                            <!-- العمود الثاني: وصف الخدمة والأزرار -->
                            <div class="col-md-6 service-content">
                                <h4  style=font-family:cairo>{{ $service->service_name }}</h4>
                                <p>{{ $service->service_description }}</p>
                                <!-- الأزرار -->
                                <div class="btn-container">
                                    <a href="{{ route('site.app') }}" class="btn btn-primary">احجز موعد</a>
                                    <a href="https://wa.me/201080222145" target="_blank" class="btn btn-success">اتصل بنا</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- عرض جميع الخدمات -->
            <div class="row g-5 py-7">
                @foreach($services as $service)
                    <div class="col-12 wow fadeIn" data-wow-delay=".3s">
                        <div class="service-box">
                            <div class="row">
                                <!-- العمود الأول: صورة الخدمة -->
                                <div class="col-md-6">
                                    <div class="project-img">
                                        <img src="{{ asset('images/services/' . $service->service_image) }}" class="img-fluid rounded">
                                    </div>
                                </div>

                                <!-- العمود الثاني: وصف الخدمة والأزرار -->
                                <div class="col-md-6 service-content">
                                    <h4  style=font-family:cairo>{{ $service->service_name }}</h4>
                                    <p>{{ $service->service_description }}</p>
                                    <!-- الأزرار -->
                                    <div class="btn-container">
                                        <a href="{{ route('site.app') }}" class="btn btn-primary">احجز موعد</a>
                                        <a href="https://wa.me/201080222145" target="_blank" class="btn btn-success">اتصل بنا</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    @include('site.footer')
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('site/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('site/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('site/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <!-- Template Javascript -->
    <script src="{{ asset('site/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow.js/1.1.2/wow.min.js"></script>
    <!-- Bootstrap JS, Popper.js, and jQuery (for Bootstrap 5 modals) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>

</html>
