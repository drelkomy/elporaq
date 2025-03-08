<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
        <meta charset="utf-8">
        <title>@yield('title', 'مدونةالبراق')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="مشروع,استشارة اقتصادية,مصنع,تحليل مالي,استثمار,دراسة جدوى">
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
            .conta {
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

                    .card-img-top {
                        width: 100%;
                        height: 250px; /* يمكن تعديل الارتفاع حسب الحاجة */
                        object-fit: contain; /* يضمن عرض الصورة بالكامل دون اقتصاص */
                    }
                    .card {
                        border-radius: 10px; /* الزوايا المدورة */
                        overflow: hidden; /* لإخفاء أي جزء من الصورة يخرج عن البطاقة */
                    }
                   
			.link-animated a {
    			transition: background-color 0.3s ease, color 0.3s ease;
			}

			.link-animated a:hover {
  			  background-color: #FFAB00; /* تغيير لون الخلفية عند المرور */
    				color: #fff; /* تغيير لون النص عند المرور */
				}


				.section-title h5 {
    			font-size: 1.25rem; /* حجم الخط للعنوان */
   		 font-weight: bold; /* تعريض الخط */
   		 color: #FFAB00; /* لون الخط */
    		margin-bottom: 1rem; /* المسافة السفلية */
			}

			.link-animated a {
  		  padding: 15px; /* إضافة padding للرابط */
   		 font-size: 1rem; /* حجم الخط للرابط */
    		color: #333; /* لون الخط */
   		 text-decoration: none; /* إزالة الخط السفلي */
			}

		.link-animated a:hover {
   		 background-color: #FFAB00; /* تغيير لون الخلفية عند المرور */
    			color: #fff; /* تغيير لون النص عند المرور */
			}

            </style>
 </head>
<body>

     @include('site.top')
    @include('site.nav')

<div class="conta">
    <!-- القسم مع الصورة كخلفية -->
    <section class="background-section">
        <img src="{{ asset('images/pages/17.png') }}" alt="Background Image">
        <div class="breadcrumb">
            <a class="m-3" href="{{ url('/') }}">الصفحة الرئيسية</a> &gt;
            <a class="m-3" href="{{ url('/app') }}">المدونة</a>
        </div>
    </section>
</div>
    <div class="container py-5">
        <div class="row">
            
            <div class="col-lg-4">
                <!-- شريط البحث -->
                <div class="d-flex mb-4">
                    <form action="{{ route('blogs.searchall') }}" method="GET" class="d-flex w-100">
                        <input 
                            type="text" 
                            class="form-control me-2" 
                            name="search" 
                            placeholder="ابحث عن تدوينات" 
                            style="max-width: 300px" 
                            value="{{ request('search') }}" 
                            aria-label="Search blog posts"
                        >
                        <button 
                            type="submit" 
                            class="btn btn-primary" 
                            aria-label="Submit search"
                        >
                            بحث
                        </button>
                    </form>
                </div>
                <!-- شريط البحث نهاية -->

                <!-- الفئات -->
            <div class="mb-5 wow slideInUp" data-wow-delay="0.1s" style="font-family: Cairo;">
                <div class="section-title section-title-sm position-relative pb-3 mb-4">
                    <h5 class="mb-0" style="font-family: Cairo; font-weight: bold; color: #FFAB00;">الاقسام</h5>
                </div>
                <div class="link-animated d-flex flex-column justify-content-start">
                    @foreach ($categories as $category)
                        <a class="h5 fw-semi-bold bg-light rounded py-3 px-4 mb-3" 
                        href="{{ route('blogs.all', ['category_id' => $category->id]) }}"
                        style="font-family: Cairo; padding: 15px; font-size: 1.1rem; color: #333; text-decoration: none;">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        <!-- الفئات نهاية -->

                <!-- أحدث التدوينات -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h6 class="mb-0" style="font-family: Cairo">أحدث التدوينات</h6>
                    </div>
                    @foreach ($recentPosts as $post)
                        <div class="d-flex rounded overflow-hidden mb-3">
                           <img class="img-fluid" src="{{ asset('images/blogs/' . $post->image) }}" style="width: 120px; height: 120px; object-fit: cover;" alt="">

                            <a href="{{ route('blogs.show', $post->id) }}" style="font-family: Cairo" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0">{{ $post->title }}</a>
                        </div>
                    @endforeach
                </div>
                <!-- أحدث التدوينات نهاية -->

                <!-- التاجات -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h6 class="mb-0" style="font-family: Cairo">الكلمات المفتاحية</h6>
                    </div>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($tags as $tag)
                            <a href="#" class="btn btn-light m-1" style="font-family: Cairo">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- التاجات نهاية -->
               
            </div>
            <div class="col-lg-8">
                <div class="row">
                    @if ($blogs->isEmpty())
                        <div class="alert alert-info" role="alert">
                            لا توجد تدوينات متاحة حالياً بناءً على الفلترة أو البحث.
                        </div>
                    @else
                        @foreach ($blogs as $blog)
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{ asset('images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">
                                    <div class="card-body">
                                        <h6 class="card-title" style="font-family: Cairo">{{ $blog->title }}</h6>
                                        <p class="card-text" style="font-family: Cairo">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($blog->content)),100) }}</p>
                                        <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">اقرأ المزيد</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <!-- التصفح -->
                <div class="custom-pagination">
                    @if ($blogs->onFirstPage())
                        <span class="disabled">السابق</span>
                    @else
                        <a href="{{ $blogs->previousPageUrl() }}">السابق</a>
                    @endif

                    @for ($i = 1; $i <= $blogs->lastPage(); $i++)
                        @if ($i == $blogs->currentPage())
                            <span class="active">{{ $i }}</span>
                        @else
                            <a href="{{ $blogs->url($i) }}">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($blogs->hasMorePages())
                        <a href="{{ $blogs->nextPageUrl() }}">التالي</a>
                    @else
                        <span class="disabled">التالي</span>
                    @endif
                </div>
                <!-- التصفح نهاية -->
            </div>

        </div>

        <!-- Back to Top -->
        <a href="#" class="btn btn-square rounded-circle back-to-top" style="background-color:#091cca"><i class="fa fa-arrow-up text-white"></i></a>
        <!-- Footer -->
        @include('site.footer')
  </div>

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
