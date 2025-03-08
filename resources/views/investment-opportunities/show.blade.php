<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>@isset($investmentOpportunity->title) {{ $investmentOpportunity->title }} @else فرصة استثمارية @endisset</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="{{ asset('site/img/favicon.ico') }}" rel="icon">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $investmentOpportunity->title }}">
    <meta property="og:description" content="{{ $investmentOpportunity->excerpt }}">
    <meta property="og:image" content="{{ asset('images/invest/' . $investmentOpportunity->image) }}">
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="الفرص الاستثمارية">
    <meta property="og:locale" content="ar_AR">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-...your-integrity-hash..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('site/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Cairo', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            max-width: 1200px;
            margin: 20px auto;
            background-color: #ffffff;
        }

        .card-header {
            background-color: #003366;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .card-body {
            padding: 10px;
            color: black;
        }

        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            position: relative; /* Important for absolute positioning of social-share */
        }

        .image-container {
            flex: 1;
            margin-right: 20px;
            position: relative; /* ضروري لتحديد موقع الأيقونات بالنسبة للصورة */
        }

        .image-container img {
            max-width: 100%;
            border-radius: 10px;
        }

        .description-container {
            flex: 2;
        }

        .description-container p {
            margin: 10px 0;
            line-height: 1.6;
        }

        .social-share {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            gap: 10px;
            z-index: 10;
        }

        .social-share .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            font-size: 14px;
            border-radius: 50%;
            color: white;
            background-color: #fff;
            border: 1px solid transparent;
            transition: color 0.3s ease, background-color 0.3s ease;
        }

        .social-share .btn-facebook:hover {
            background-color: #3b5998;
        }

        .social-share .btn-twitter:hover {
            background-color: #1da1f2;
        }

        .social-share .btn-instagram:hover {
            background-color: #e4405f;
        }

        .social-share .btn-whatsapp {
            background-color: #25D366;
        }

        .tab-container {
            display: flex;
            cursor: pointer;
            border-bottom: none;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .tab {
            flex: 1;
            padding: 10px;
            text-align: center;
            background-color: #f1f1f1;
            border-bottom: none;
            font-weight: bold;
            border-radius: 5px 5px 0 0;
            margin: 0 5px;
        }

        .tab.active {
            background-color: #003366;
            color: #fff;
        }

        .tab-content {
            display: none;
            padding: 15px;
        }

        .tab-content.active {
            display: block;
        }

        @media (max-width: 768px) {
            .tab {
                font-size: 12px;
                padding: 8px;
                margin: 0 2px;
            }

            .card-body {
                padding: 5px;
            }

            .content-wrapper {
                flex-direction: column;
            }

            .image-container {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    @include('site.top')
    @include('site.nav')

    <!-- عرض تفاصيل فرصة استثمارية -->
    <div class="card">
        <div class="card-header">
            @isset($investmentOpportunity->title)
                <h2 class="text-light" style="font-family: cairo">فرصة استثمارية: {{ $investmentOpportunity->title }}</h2>
            @else
                <h2 class="text-light">فرصة استثمارية</h2>
            @endisset
        </div>

        <div class="card-body">

            <!-- الصورة والوصف -->
            <div class="content-wrapper">
                <div class="description-container">
                    <p><strong>تفاصيل المشروع</strong></p>
                    @isset($investmentOpportunity->description)
                        <p>{{ $investmentOpportunity->description }}</p>
                    @else
                        <p>لم يتم إدخال وصف لهذا المشروع بعد.</p>
                    @endisset
                </div>

                <div class="image-container">
                    <!-- Social Share Buttons -->
                    <div class="social-share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" class="btn btn-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($investmentOpportunity->title) }}" target="_blank" class="btn btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/?url={{ urlencode(Request::fullUrl()) }}" target="_blank" class="btn btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank" class="btn btn-whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    @if($investmentOpportunity->image)
                        <img src="{{ asset('images/invest/' . $investmentOpportunity->image) }}" alt="صورة الفرصة">
                    @else
                        <img src="{{ asset('site/img/default-image.jpg') }}" alt="صورة افتراضية">
                    @endif
                </div>
            </div>

            <!-- التبويبات -->
            <div class="tab-container">
                <div class="tab active" onclick="showTab('project-features')">ميزات المشروع</div>
                <div class="tab" onclick="showTab('project-products')">منتجات المشروع</div>
                <div class="tab" onclick="showTab('production-process')">عملية الإنتاج</div>
                <div class="tab" onclick="showTab('required')">متطلبات المشروع</div>
                <div class="tab" onclick="showTab('project_ser')">خدمات المشروع</div>
                <div class="tab" onclick="showTab('financial-indicators')">المؤشرات المالية</div>
            </div>
            <div id="project-features" class="tab-content active">
                @isset($investmentOpportunity->project_features)
                    <p><strong>ميزات المشروع:</strong></p>
                    <p>{{ $investmentOpportunity->project_features }}</p>
                @else
                    <p>لم يتم إدخال ميزات لهذا المشروع بعد.</p>
                @endisset
            </div>
            <div id="project-products" class="tab-content">
                @isset($investmentOpportunity->project_products)
                    <p><strong>منتجات المشروع:</strong></p>
                    <p>{{ $investmentOpportunity->project_products }}</p>
                @else
                    <p>لم يتم إدخال منتجات لهذا المشروع بعد.</p>
                @endisset
            </div>
            <div id="production-process" class="tab-content">
                @isset($investmentOpportunity->production_process)
                    <p><strong>عملية الإنتاج:</strong></p>
                    <p>{{ $investmentOpportunity->production_process }}</p>
                @else
                    <p>لم يتم إدخال عملية الإنتاج لهذا المشروع بعد.</p>
                @endisset
            </div>
            <div id="required" class="tab-content">
                @isset($investmentOpportunity->required)
                    <p><strong>متطلبات المشروع:</strong></p>
                    <p>{{ $investmentOpportunity->required }}</p>
                @else
                    <p>لم يتم إدخال متطلبات المشروع لهذا المشروع بعد.</p>
                @endisset
            </div>
            <div id="project_ser" class="tab-content">
                @isset($investmentOpportunity->project_ser)
                    <p><strong>خدمات المشروع:</strong></p>
                    <p>{{ $investmentOpportunity->project_ser }}</p>
                @else
                    <p>لم يتم إدخال خدمات المشروع لهذا المشروع بعد.</p>
                @endisset
            </div>
            <div id="financial-indicators" class="tab-content">
                @isset($investmentOpportunity->financial_indicators)
                    <p><strong>المؤشرات المالية:</strong></p>
                    <p>{{ $investmentOpportunity->financial_indicators }}</p>
                @else
                    <p>لم يتم إدخال المؤشرات المالية لهذا المشروع بعد.</p>
                @endisset
            </div>
        </div>
    </div>

    @include('investment-opportunities.recent-invest')
    @include('site.footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('site/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('site/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('site/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow.js/1.1.2/wow.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script>
        function showTab(tabId) {
            // إخفاء جميع التبويبات
            document.querySelectorAll('.tab-content').forEach(function(tabContent) {
                tabContent.classList.remove('active');
            });

            // إزالة النشط من جميع التبويبات
            document.querySelectorAll('.tab').forEach(function(tab) {
                tab.classList.remove('active');
            });

            // إظهار التبويب النشط
            document.getElementById(tabId).classList.add('active');
            document.querySelector(`.tab[onclick="showTab('${tabId}')"]`).classList.add('active');
        }
    </script>
</body>
</html>
