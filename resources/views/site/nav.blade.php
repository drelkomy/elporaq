<head>
    <style>
        /* Dropdown menu container */
        .dropdown-menu {
            padding: 0;
            margin: 0;
            background-color: #1d508b; /* خلفية زرقاء */
            border-radius: 5px; /* حواف مستديرة */
            min-width: 250px; /* حد أدنى لعرض القائمة */
            width: auto; /* جعل العرض تلقائي يتناسب مع النص */
            box-sizing: border-box; /* تأكد من حساب البادينغ والحدود في العرض */
        }
        
        /* Dropdown item styles */
        .dropdown-item {
            padding: 0.5rem 1rem; /* ضبط البادينغ */
            display: flex;
            align-items: center;
            gap: 10px; /* مساحة بين الصورة والنص */
            white-space: nowrap; /* منع التفاف النص */
            text-align: left; /* محاذاة النص إلى اليسار */
            overflow: hidden; /* إخفاء الفائض */
            text-overflow: ellipsis; /* إضافة نقاط للفائض من النص */
        }
        
        /* Image styles in dropdown */
        .dropdown-item img {
            width: 50px; /* حجم الصورة */
            height: auto; /* الحفاظ على نسبة العرض إلى الارتفاع */
            border-radius: 5px; /* حواف مستديرة للصورة */
        }
        
        /* Hover and focus effects */
        .dropdown-item:hover {
            background-color: #0d3a73; /* لون الخلفية عند التمرير */
            color: #fff; /* لون النص عند التمرير */
        }
        
        .dropdown-item:focus {
            box-shadow: none; /* إزالة الظل عند التركيز */
        }
        
        /* مسافة بين الكلمة والأيقونة */
        .nav-link i {
            margin-right: 8px; /* ضبط المسافة بين الأيقونة والكلمة */
        }

        /* تغيير لون النص للعنصر النشط في النافبار */
        .navbar-nav .nav-link.active {
            color: #FFAB00; /* اللون البرتقالي */
            border-radius: 5px; /* حواف مستديرة */
            font-weight: 900;
        }

        /* التأثير عند التمرير على العنصر النشط */
        .navbar-nav .nav-link.active:hover {
            color: #FFFFFF; /* تغيير لون النص عند التمرير */
            background-color: #00509e; /* خلفية عند التمرير */
        }
    </style>
</head>
<!-- Navbar Start -->
<div class="container-fluid" style="background-color:#0e54a3">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg">
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="navbarCollapse">
                <div class="navbar-nav ms-auto mx-xl-auto py-2 d-flex justify-content-between align-items-center w-100">
                    <a href="/" class="nav-item nav-link">الرئيسية <i class="fas fa-home fa-lg"></i></a>
                    <a href="/whous" class="nav-item nav-link">من نحن <i class="far fa-question-circle fa-lg"></i></a>

                    <!-- Dropdown Menu with Images -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" id="servicesDropdown" data-bs-toggle="dropdown">
                            خدماتنا <i class="fas fa-cogs"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                            @foreach($services as $service)
                                <a href="#" class="dropdown-item text-light" data-bs-toggle="modal" data-bs-target="#serviceModal{{ $service->id }}">
                                    <img src="{{ asset('images/services/' . $service->service_image) }}" class="img-fluid rounded me-2">
                                    {{ $service->service_name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- The Modals for each service -->
                    @foreach($services as $service)
                        <div class="modal fade" id="serviceModal{{ $service->id }}" tabindex="-1" aria-labelledby="serviceModalLabel{{ $service->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="serviceModalLabel{{ $service->id }}" style="font-family: Cairo;">{{ $service->service_name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('images/services/' . $service->service_image) }}" class="img-fluid mb-3 w-100 rounded">
                                        <p style="font-family: Cairo;">{{ $service->service_description }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                                        <a href="/app" class="btn btn-primary">احجز موعد</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Dropdown Menu for Investment Categories -->
<div class="nav-item dropdown">
    <!-- الرابط الرئيسي لعرض جميع التصنيفات -->
    <a href="{{ route('investment-opportunities.allinvest') }}" class="nav-link" id="categoriesDropdown" data-bs-toggle="dropdown">
        الفرص الاستثمارية <i class="fas fa-project-diagram"></i>
    </a>
    <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
        <!-- رابط يعرض جميع التصنيفات -->
        <a href="{{ route('investment-opportunities.allinvest') }}" class="dropdown-item text-light">
            <i class="fas fa-list me-2"></i> عرض جميع التصنيفات
        </a>
        <!-- قائمة التصنيفات -->
        @foreach ($investmentCategories as $category)
            <a href="{{ route('investment-opportunities.allinvest', ['category' => $category->id]) }}" class="dropdown-item text-light {{ request()->get('category') == $category->id ? 'fw-bold' : '' }}">
                <i class="{{ $category->icon }} me-2"></i>{{ $category->name }}
            </a>
        @endforeach
    </div>
</div>

                    <a href="/allblog" class="nav-item nav-link">المدونة <i class="fas fa-briefcase"></i></a>
                    <a href="/jobs" class="nav-item nav-link">التوظيف<i class="fas fa-file-signature"></i></a>
                    <a href="/train" class="nav-item nav-link">التدريبات<i class="fas fa-street-view"></i></a>
                    {{--  <a href="#" class="nav-item nav-link">اتصل بنا <i class="fas fa-phone-alt"></i></a>  --}}
                    <a href="/dashboard" class="nav-item nav-link">دخول مديرين <i class="fas fa-user-tie"></i></a>
                </div>
            </div>
         
        </nav>
    </div>
</div>
<!-- Navbar End -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // الحصول على الرابط الحالي
        var currentPath = window.location.pathname;
        
        // الحصول على جميع الروابط في شريط التنقل
        var navLinks = document.querySelectorAll('.navbar-nav .nav-link');
        
        navLinks.forEach(function(link) {
            // التحقق مما إذا كانت رابط الصفحة الحالية
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active'); // إضافة فئة active إلى الرابط النشط
            }
        });
    });
</script>
