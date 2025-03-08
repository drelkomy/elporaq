<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
 <title>{{ $blog->title }} | مدونة البراق</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="مدونة, دراسة جدوى, اسثمار, مشروع">
    <meta name="description" content="مدونة تقدم  المشاريع والفرص الاستثمارية ودراسات الجدوى.">
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $blog->title }}">
    <meta property="og:description" content="{{ $blog->excerpt }}">
    <meta property="og:image" content="{{ asset('images/blogs/' . $blog->image) }}">
    <meta property="og:url" content="{{ Request::fullUrl() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="مدونة البراق">
    <meta property="og:locale" content="ar_AR">
    <!-- CSS Links -->
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link href="{{ asset('site/img/favicon.ico') }}" rel="icon">
    
   

     <style>
        .social-share {
            position: absolute;
            top: 10px;
            left: 10px;
            display: flex;
            gap: 10px;
            z-index: 10; 
            margin-left: 25px;


        }
        
        .social-share .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px; /* حجم أصغر للأيقونات */
            height: 30px; /* حجم أصغر للأيقونات */
            font-size: 14px; /* حجم أصغر للأيقونات */
            border-radius: 50%;
            color: white;
            background-color: white; /* إزالة خلفية الأيقونات */
            border: 1px solid transparent; /* إزالة خلفية الأيقونات */
            transition: color 0.3s ease, border-color 0.3s ease;
        }
        
        .social-share .btn-facebook:hover {
            color: #3b5998;
        }
        
        .social-share .btn-twitter:hover {
            color: #1da1f2;
        }
        
        .social-share .btn-instagram:hover {
            color: #e4405f;
        }
        
        .social-share .btn-whatsapp:hover {
            color: #21d663;
        }

        .social-share .btn-whatsapp {
            color: #21d663;
        }
        
        .social-share .btn:hover {
            border-color: currentColor; /* إضافة حدود ملونة عند التمرير */
        }

    </style>               
</head>

<body>
    @include('site.top')
    @include('site.nav')
    @include('site.whatsapp')
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8 position-relative">
                    <!-- Social Share Buttons -->
                    <div class="social-share">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank" class="btn btn-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="btn btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/?url={{ urlencode(Request::fullUrl()) }}" target="_blank" class="btn btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank" class="btn btn-whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                    
                    <!-- Blog Post -->
                    <div class="mb-5">
                        <img class="img-fluid rounded mb-5" src="{{ asset('images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                        <h1 class="mb-4" style="font-family: Cairo">{{ $blog->title }}</h1>
                        <div class="justified-text">{!! $blog->content !!}</div>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Recent Posts -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h6 class="mb-0" style="font-family: Cairo">أحدث التدوينات</h6>
                        </div>
                        @foreach ($recentPosts as $post)
                            <div class="d-flex rounded overflow-hidden mb-3">
                               <img class="img-fluid" src="{{ asset('images/blogs/' . $post->image) }}" style="width: 120px; height: 120px; object-fit: cover;" alt="">
                                <a href="{{ route('blogs.show', $post->id) }}" class="h6 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0" style="font-family: Cairo">{{ $post->title }}</a>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Tags -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h6 class="mb-0" style="font-family: Cairo">الكلمات المفتاحية</h6>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($blog->tags as $tag)
                                <a href="#" class="btn btn-light m-1" style="font-family: Cairo">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('site.footer')
    
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('site/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('site/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('site/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('site/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/js/main.js') }}"></script>
</body>
</html>
