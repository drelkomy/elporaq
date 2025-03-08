<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'البراق للاستشارات الاقتصادية ودراسات الجدوى')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="استشارات اقتصادية, دراسات جدوى, خدمات">
    <meta name="description" content="البراق للاستشارات الاقتصادية ودراسات الجدوى تقدم خدمات متميزة في مجال الاستشارات والدراسات.">

    <link href="{{ asset('site/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-...your-integrity-hash..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('site/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <!-- إضافة مكتبة Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
 

    <style>
        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: .25rem;
            padding: 10px;
        }

        .btn-primary {
            background-color: #FFAB00;
            border-color: #FFAB00;
            font-size: 18px;
        }

        .btn-primary:hover {
            background-color: #FFAB00;
            border-color: #FFAB00;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        /* إخفاء حقل التاريخ */
        #date {
            display: none;
        }

        /* تحسين قائمة الخدمات */
        #service {
            height: auto;
            overflow: auto;
        }

        /* ضبط ارتفاع المخطط الزمني */
        .flatpickr-calendar {
            max-width: 100%;
        }
    </style>
</head>
<body>
    @include('site.top')
    @include('site.nav')
@include('site.whatsapp')
    @yield('content')
    @include('site.footer')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        // تهيئة Flatpickr على حقل التاريخ
        flatpickr("#date", {
            dateFormat: "Y-m-d", // تنسيق التاريخ
            minDate: "today",   // بدء العرض من اليوم الحالي
            locale: "ar",       // تعيين اللغة للعربية
            inline: true,       // عرض المخطط الزمني مفتوحًا
            mode: "single",     // وضع اختيار تاريخ واحد
            defaultDate: "today" // تعيين التاريخ الافتراضي إلى اليوم
        });
    </script>
</body>
</html>
