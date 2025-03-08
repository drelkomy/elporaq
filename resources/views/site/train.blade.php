

<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'تدريبات البراق')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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

    <!-- إضافة مكتبة Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- إضافة مكتبة Swiper JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
   <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
        }

        .container {
            max-width: 1200px;
           margin: 0 auto;
           padding: 0 10px;
           position: relative; /* إضافة هذا السطر */
   }

   .background-section {
       position: relative; /* للتأكد من أنه يمكن تحديد موقعه بشكل صحيح بالنسبة للعنصر الأصل */
       width: 100vw; /* يتسع لعرض الشاشة بالكامل */
       margin-left: calc(-50vw + 50%); /* تعويض التمدد عبر العرض الكامل */
       margin-right: calc(-50vw + 50%); /* تعويض التمدد عبر العرض الكامل */
       height: 250px;
       border: 1px solid #ddd;
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
            right: 10px; /* تعديل للانتقال إلى اليمين */
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-size: 1em;
            line-height: 1.5;
            height: auto; /* يسمح بتكيف الارتفاع بناءً على المحتوى */
            display: flex;
            align-items: center;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px; /* إضافة بعض الهوامش بين الروابط */
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
        }

        .info-section p {
            font-size: 1.3em;
            color: #555;
            text-align: center;
            margin-bottom: 15px;
        }

        .info-section:hover {
            color: blue;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            font-size: 1.1em;
        }

        .form-control, .form-control-file, .form-control-select {
            padding: 14px;
            border-radius: 6px;
            border: 1px solid #ddd;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
            background-color: #f5f5f5;
        }

        .form-control:focus, .form-control-file:focus, .form-control-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0,123,255,0.3);
            outline: none;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 14px 28px;
            border-radius: 6px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: inline-block;
            font-family: 'Cairo', sans-serif;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-attach {
            background-color: #28a745;
            border: none;
            color: #fff;
            padding: 14px 28px;
            border-radius: 6px;
            font-size: 1.1em;
            cursor: pointer;
            display: inline-block;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-right: 10px;
        }

        .btn-attach:hover {
            font-weight: 700;
            background-color: #218838;
            color: black;
            transform: translateY(-2px);
        }

        .form-group input[type="file"] {
            display: none;
        }

        .custom-file-upload {
            background-color: #28a745;
            border: none;
            color: #ffffff;
            padding: 14px 28px;
            border-radius: 6px;
            font-size: 1.1em;
            cursor: pointer;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .custom-file-upload:hover {
            background-color: #218838;
            transform: translateY(-2px);
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 10px;
            }

            .info-section {
                padding: 15px;
            }

            .form-control, .btn-primary, .btn-attach {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>

    @include('site.top')
    @include('site.nav')

<div class="container">
    <!-- القسم مع الصورة كخلفية -->
    <section class="background-section">
        <img src="{{ asset('images/pages/16.png') }}" alt="Background Image">
        <div class="breadcrumb">
            <a class="m-3" href="{{ url('/') }}">الصفحة الرئيسية</a> &gt;
            <a class="m-3" href="{{ url('/train') }}">التدريب</a>
        </div>
    </section>

    <!-- القسم الذي يحتوي على النص -->
    <section class="info-section">
        <p> بادر بالحصول علي التدريبات التي تقدمها شركة البراق للاستشارات الاقتصادية ودراسات الجدوى، ودائماً تسعي البراق ان تعد  العديد من الكوادر  في العديد من المجالات منها مجال اعداد دراسات الجدوى والتحليل المالي وحوكمة الشركات والمجالات المحاسبية والمجالات التكنولوجيا وغيرها.</p>
    </section>
<div class="container mt-5">

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="card shadow p-4">
        <form action="{{ route('trainings.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name">اسم المتدرب:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="أدخل اسم المتدرب" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">البريد الإلكتروني:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="أدخل البريد الإلكتروني" required>
            </div>
            <div class="form-group mb-3">
                <label for="phone">رقم الهاتف:</label>
                <input type="tel" id="phone" name="phone" class="form-control text-center" placeholder="أدخل رقم الهاتف" required>
            </div>
            <div class="form-group mb-3">
                <label for="address">العنوان:</label>
                <input type="text" id="address" name="address" class="form-control " placeholder="أدخل العنوان" required>
            </div>
            <div class="form-group mb-3">
                <label for="study">المؤهل الدراسي:</label>
                <input type="text" id="study" name="study" class="form-control " placeholder="أدخل المؤهل الدراسي" required>
            </div>
            <div class="form-group mb-3">
                <label for="training_type">نوعية التدريب:</label>
                <select id="training_type" name="training_type" class="form-control" required>
                    <option value="دراسة جدوى">دراسة جدوى</option>
                    <option value="التسويق">التسويق</option>
                    <option value="مبيعات">مبيعات</option>
                    <option value="أخرى">أخرى</option>
                </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="إضافة تدريب">
            </div>
        </form>
    </div>
 </div>
</div>
@include('site.whatsapp')
@include('site.footer')
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('site/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('site/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('site/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('site/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<!-- Template Javascript -->
<script src="{{asset('site/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow.js/1.1.2/wow.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.8/purify.min.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</body>
</html>
