<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'الفرص الاستثمارية')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="keywords" content="استشارات اقتصادية, دراسات جدوى, خدمات">
    <meta name="description" content="البراق للاستشارات الاقتصادية ودراسات الجدوى تقدم خدمات متميزة في مجال الاستشارات والدراسات.">

    <link href="{{ asset('site/img/favicon.ico') }}" rel="icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('site/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet">

  

    <!-- CSS -->
 	<style>
    body {
        font-family: 'Cairo', sans-serif;
    }

    .card {
        transition: all 0.3s ease;
        border-radius: 35px;
        border: 1px solid #1e1e1f; /* إضافة حدود */
    }

    .card:hover {
        box-shadow: 0px 4px 15px rgba(83, 83, 83, 0.2); /* إضافة ظلال عند التمرير */
        transform: translateY(-5px); /* تحريك الكارت قليلاً لأعلى عند التمرير */
    }

    .position-relative {
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* خلفية داكنة شفافة عند التمرير */
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 2;
    }

    .card:hover .overlay {
        opacity: 1; /* إظهار الأزرار عند التمرير */
    }

    .overlay a {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .card:hover .overlay a {
        opacity: 1;
        transform: translateY(0);
    }

    .card-body {
        border-radius: 0 0 10px 10px;
        background-color: rgb(233, 233, 233);
    }

    .card-title {
        display: inline-block; /* عرض العنصر ككتلة مضمنة بحيث يتسع النص */
        border-radius: 5px; /* تعيين حواف دائرية للعنصر */
        white-space: nowrap; /* منع التفاف النص إلى السطر التالي */
        overflow: hidden; /* إخفاء النص الذي يتجاوز الحاوية */
        text-overflow: ellipsis; /* عرض ... عند تجاوز النص لحدود العنصر */
        font-family: 'Cairo', sans-serif; /* تعيين نوع الخط */
        margin: 0; /* إزالة المسافة الخارجية */
    }

    .card-text {
        color: #000000;
    }

    .invest-categories {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        background-color: #f9f9f9;
    }

    .invest-category-name {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s ease;
    }

    .invest-category-name:last-child {
        border-bottom: none;
    }

    .invest-category-name:hover {
        background-color: #f0f0f0;
    }

    .invest-category-name a {
        color: #333;
        font-weight: 500;
    }

    .invest-category-name a:hover {
        color: #124076;
    }

    .input-group .form-control {
        border-radius: 0.375rem;
    }

    .input-group .btn {
        border-radius: 0.375rem;
        padding: 5px 15px;
    }

    /* Pagination Styles */
    .custom-pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 15px 0;
        flex-wrap: nowrap; /* منع التفاف العناصر إلى صفوف متعددة */
        gap: 5px; /* مسافة بين الأزرار */
    }

    .custom-pagination .page-link, .custom-pagination .disabled, .custom-pagination .active {
        display: inline-block;
        padding: 8px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        text-decoration: none;
        color: #333;
        font-weight: bold;
        transition: background-color 0.3s ease, color 0.3s ease;
        text-align: center;
    }

    .custom-pagination .page-link:hover {
        background-color: #003366;
        color: #fff;
    }

    .custom-pagination .disabled {
        background-color: #f1f1f1;
        color: #888;
        pointer-events: none;
    }

    .custom-pagination .active {
        background-color: #003366;
        color: #fff;
    }

    @media (max-width: 768px) {
        .custom-pagination {
            flex-wrap: wrap; /* السماح للعناصر باللف إذا لزم الأمر */
            justify-content: center; /* توسيط الأزرار في حالة اللف */
        }

        .custom-pagination .page-link, .custom-pagination .disabled, .custom-pagination .active {
            padding: 5px 10px; /* تقليل الحشو لتحسين التناسب */
        }
    }
</style>


</head>
<body>
    @include('site.top')
    @include('site.nav')
@include('site.whatsapp')
    <!-- عرض الفرص -->
 
    <div class="container mt-5">
        <div class="row">
            <!-- الشريط الجانبي للتصنيفات مع زر البحث -->
            <div class="col-lg-3">
                <div class="mb-4">
                    <form method="GET" action="{{ route('investment-opportunities.allinvest') }}" class="mb-4 d-flex">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->get('search') }}">
                            <button type="submit" class="btn btn-primary btn-sm">بحث</button>
                        </div>
                    </form>
                    <ul class="list-unstyled invest-categories">
                        <li>
                            <div class="d-flex justify-content-between invest-category-name">
                                <a href="{{ route('investment-opportunities.allinvest') }}" 
                                   class="text-decoration-none {{ request()->get('category') == '' ? 'fw-bold' : '' }}" 
                                   style="{{ request()->get('category') == '' ? 'color:#FFAB00;' : '' }}">
                                    <i class="fas fa-tags me-2"></i>كل التصنيفات
                                </a>
                            </div>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <div class="d-flex justify-content-between invest-category-name">
                                <a href="{{ route('investment-opportunities.allinvest', ['category' => $category->id]) }}" 
                                   class="text-decoration-none {{ request()->get('category') == $category->id ? 'fw-bold' : '' }}" 
                                   style="{{ request()->get('category') == $category->id ? 'color:#FFAB00;' : '' }}">
                                    <i class="{{ $category->icon }} me-2"></i>{{ $category->name }}
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            <!-- محتوى الفرص الاستثمارية -->
            <div class="col-lg-9 p-4">
                @if($opportunities->count())
                    <div class="row">
                        @foreach($opportunities as $opportunity)
                            <div class="col-md-6 col-lg-4 mb-4">
                                <div class="card rounded shadow-sm border-0 h-100 position-relative">
                                    <div class="position-relative">
                                        @if($opportunity->image)
                                            <img src="{{ asset('images/invest/' . $opportunity->image) }}"  class="card-img-top rounded-top" alt="صورة الفرصة" style="height: 300px; object-fit: cover;">
                                        @else
                                            <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top rounded-top" alt="صورة الفرصة" style="height: 300px; object-fit: cover;">
                                        @endif
                                        <!-- نسبة العائد -->
                                        <div class="return-percentage position-absolute top-0 end-0 m-3 p-2  rounded" style="background-color: #f0ab2b; font-weight: bold;">
                                            {{ $opportunity->financial_indicators }}: نسبة العائد
                                        </div>

                                        <!-- الأزرار عند التمرير -->
                                        <div class="overlay d-flex align-items-center justify-content-center">
                                            <a href="{{ route('investment-opportunities.show', $opportunity->id) }}" class="btn btn-info btn-sm mx-2">عرض التفاصيل</a>
                                            <a href="{{ route('site.app') }}"  class="btn btn-primary btn-sm mx-2">طلب الخدمة</a>
                                        </div>
                                    </div>
                                    <!-- العنوان أسفل الصورة -->
                                    <div class="card-body text-center">
                                        <h5 class="card-title  rounded" style="font-family: Cairo;">
                                            {{ Str::limit($opportunity->title,24) }}</h5>                                 
                                       </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            
             
            <!-- التصفح -->
<div class="custom-pagination text-center">
    @if ($opportunities->onFirstPage())
        <span class="disabled">السابق</span>
    @else
        <a href="{{ $opportunities->previousPageUrl() }}" class="page-link">السابق</a>
    @endif

    @for ($i = 1; $i <= $opportunities->lastPage(); $i++)
        @if ($i == $opportunities->currentPage())
            <span class="active">{{ $i }}</span>
        @else
            <a href="{{ $opportunities->url($i) }}" class="page-link">{{ $i }}</a>
        @endif
    @endfor

    @if ($opportunities->hasMorePages())
        <a href="{{ $opportunities->nextPageUrl() }}" class="page-link">التالي</a>
    @else
        <span class="disabled">التالي</span>
    @endif
</div>
<!-- التصفح نهاية -->
          
                   
                    
        </div>

    </div>
      
        </div>
    </div>

    @include('site.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg rounded-circle back-to-top"><i class="fa fa-chevron-up"></i></a>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pagination = document.querySelector('.custom-pagination');
        const pageLinks = Array.from(pagination.querySelectorAll('.page-link'));

        const currentPage = parseInt(pagination.querySelector('.active').textContent, 10);
        const totalPages = pageLinks.length;

        if (totalPages <= 4) return; // لا حاجة للتعديل إذا كانت الصفحات 4 أو أقل

        pageLinks.forEach(link => link.style.display = 'none'); // إخفاء جميع الروابط

        const showPageNumbers = (start, end) => {
            pageLinks.slice(start, end).forEach(link => link.style.display = 'inline-block');
        };

        if (currentPage <= 2) {
            showPageNumbers(0, 4);
        } else if (currentPage >= totalPages - 1) {
            showPageNumbers(totalPages - 4, totalPages);
        } else {
            showPageNumbers(currentPage - 2, currentPage + 2);
        }
    });
</script>

</body>
</html>
