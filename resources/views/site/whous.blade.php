<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'من نحن')</title>
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
    .service-content p {
    text-align: justify;
    text-justify: distribute; /* يعزز توزيع الكلمات بين المسافات */

}

/*** Service Start ***/
.service-item {
    position: relative;
    box-shadow: 0 0 45px rgba(34, 34, 34, 0.08);
}

.service-item::after {
    content: "";
    position: absolute;
    width: 0;
    height: 0;
    left: 0;
    bottom: 0;
    border-radius: 10px;
    background-color:rgba(24, 132, 165, 0.08);
    transition: 0.5s;
    z-index: 1;
}

.service-item:hover::after {
    width: 100%;
    height: 100%;
}

.service-item:hover .service-content,
.service-item:hover .service-btn {
    position: relative;
    z-index: 2;
}

.service-item .service-content a,
.service-item .service-content p {
    transition: 0.5s;
    
}

.service-item:hover .service-content a:hover {
    color: var(--bs-secondary);
    
}

.service-item:hover .service-content p {
    color: var(--bs-white);
} 

.service-item .service-btn {
    width: 80px;
    height: 80px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.5s;
}

.service-item .service-btn i {
    transition: 0.5s;
}

.service-item:hover .service-btn {
    background: var(--bs-white);
}

.service-item:hover .service-btn i {
    transform: rotate(360deg);
    color: var(--bs-primary) !important;
}
/*** Service End ***/


.clients-slider img {
    filter: grayscale(100%);
    transition: filter 0.5s ease, transform 0.3s ease;
    max-width: 30%;
    height: auto;
    display: block;
    margin: 0 auto;
}

.clients-slider .swiper-slide:hover img {
    filter: grayscale(0%);
    transform: scale(1.05);
}

.swiper-slide-active img {
    filter: grayscale(0%);
}

.swiper-wrapper {
    align-items: center;
}

.section-title {
    margin-bottom: 2rem;
}

</style>
</head>
<body>
  
    <!-- Header -->
    @include('site.top')
    @include('site.nav')




    <!-- القيم Start -->
    <div class="container-fluid service bg-light overflow-hidden py-2" style="padding: 3rem 0; background-color: #f8f9fa;">
        <div class="container py-2">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h2 class="text-capitalize mb-3" style="color: #da9a24; font-family: 'Cairo', sans-serif;">القيم التي نؤمن بها ونؤكدها</h2>
            </div>
            <div class="row gx-0 gy-4 align-items-center">
                <div class="col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="service-item rounded p-4 mb-4" style="border-radius: 0.25rem; padding: 1rem; margin-bottom: 1rem;">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3" style="font-size: 1.5rem; color: #333; text-decoration: none; font-family: 'Cairo', sans-serif;">النزاهة والأخلاق</a>
                                        <p class="mb-0" style="color: #666;">الثقة هي الأساس الجوهري لأي كيان مهني ذو تنظيم هيكلي يتضمن روابطًا اجتماعية مبنيةٌ على أُسسٍ متينة</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn">
                                            <i class="fas fa-balance-scale fa-3x" style="color: #da9a24;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="service-item rounded p-4 mb-4" style="border-radius: 0.25rem; padding: 1rem; margin-bottom: 1rem;">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3" style="font-size: 1.5rem; color: #333; text-decoration: none; font-family: 'Cairo', sans-serif;">الشفافية والثقة
                                        </a>
                                        <p class="mb-0" style="color: #666;">نرى أن الثقة تقوم على الاحترام والعرفان والتمكين من تهيئة بيئة يمكن لأي شخص أن يبذل فيها قصارى جهده. وترتبط الثقة ارتباطًا وثيقًا بالشفافية التي لا تتجزأ عن مصداقية كلماتنا وأفعالنا. ونؤمن بالمثل العليا التي يتحلى بها كل شخص، ولا سيّما أعضاء إدارتنا.</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn">
                                            <i class="fas fa-hand-holding-usd fa-3x" style="color: #da9a24;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-0" style="border-radius: 0.25rem; padding: 1rem;">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3" style="font-size: 1.5rem; color: #333; text-decoration: none; font-family: 'Cairo', sans-serif;">الأمانة والمصداقية</a>
                                        <p class="mb-0" style="color: #666;">قدرتك في الحفاظ على الأمانة المهنية في مكان العمل لها تأثير قوي على إنتاجيتك و أدائك وسمعتك . يتطلب التصرف بأمانة مهنية الممارسة وقوة الشخصية والوعي الذاتي .</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn">
                                            <i class="fas fa-users fa-3x" style="color: #da9a24;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-transparent">
                        <img src="{{ asset('site/img/asd.png') }}" class="img-fluid w-100" alt="" style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="service-item rounded p-4 mb-4" style="border-radius: 0.25rem; padding: 1rem; margin-bottom: 1rem;">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3" style="font-size: 1.5rem; color: #333; text-decoration: none; font-family: 'Cairo', sans-serif;">الشمول والتنوع</a>
                                        <p class="mb-0" style="color: #666;">يُعد الشمول والتنوع من ضروريات الأعمال، بدءًا من القوة العاملة لدينا وحتى المنتجات التي نُصمِّمها والشركات التي نُقدِّم خدماتنا لها.</p>
                                    </div>

                                    <div class="ps-4">
                                        <div class="service-btn">
                                            <i class="fas fa-eye fa-3x" style="color: #da9a24;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-4" style="border-radius: 0.25rem; padding: 1rem; margin-bottom: 1rem;">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3" style="font-size: 1.5rem; color: #333; text-decoration: none; font-family: 'Cairo', sans-serif;">أعلي معاييرالجودة
                                        </a>
                                        <p class="mb-0" style="color: #666;">معايير الجودة الخدمات والبحوث والدراسات تُعتبر مجموعة من المعايير والمعايير الفنية التي تهدف إلى ضمان تقديم منتجات وخدمات عالية الجودة وتلبية احتياجات وتوقعات العملاء</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn">
                                            <i class="fas fa-star fa-3x" style="color: #da9a24;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="service-item rounded p-4 mb-0" style="border-radius: 0.25rem; padding: 1rem;">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <div class="service-content">
                                        <a href="#" class="h4 d-inline-block mb-3" style="font-size: 1.5rem; color: #333; text-decoration: none; font-family: 'Cairo', sans-serif;">الإتقان والإبداع
                                        </a>
                                        <p class="mb-0" style="color: #666;">حيث يدفع الإتقان إلى تحقيق الجودة المطلوبة، ويضيف الإبداع عنصراً من التميز والتفرد، مما يؤدي إلى تطوير منتجات وخدمات مبتكرة وذات قيمة عالية.</p>
                                    </div>
                                    <div class="ps-4">
                                        <div class="service-btn">
                                            <i class="fas fa-paint-brush fa-3x" style="color: #da9a24;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- القيم End -->
    
    
    <!-- شركاء Start -->
    <div class="container py-3">
        <div class="section-title text-center">
            <h3 class="fs-3x fw-bold text-orange" style="color: #da9a24; font-family: 'Cairo', sans-serif;">عملائنا</h3>
        </div>
    
        <div class="clients-slider swiper">
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="site/img/c1.jpg" class="img-fluid" alt="Client Logo"></div>
                <div class="swiper-slide"><img src="site/img/c2.png" class="img-fluid" alt="Client Logo"></div>
                <div class="swiper-slide"><img src="site/img/c3.jpg" class="img-fluid" alt="Client Logo"></div>
                <div class="swiper-slide"><img src="site/img/c4.JPEG" class="img-fluid" alt="Client Logo"></div>
                <div class="swiper-slide"><img src="site/img/c5.jpg" class="img-fluid" alt="Client Logo"></div>
                <div class="swiper-slide"><img src="site/img/c6.jpg" class="img-fluid" alt="Client Logo"></div>
                <div class="swiper-slide"><img src="site/img/c7.png" class="img-fluid" alt="Client Logo"></div>
            </div>
    
            <!-- Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- شركاء End -->
    

    <!-- رؤيتنا Start -->
    <div class="container-fluid py-2" style="background-color: #f8f9fa;">
        <div class="container py-5">
           <div class="row gx-0 gy-4">
                <!-- رؤيتنا -->
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item rounded p-4 mb-4" style="border-radius: 0.25rem; padding: 1rem; margin-bottom: 1rem;text-align: justify;">
                        <div class="text-center mb-4">
                            <img src="{{ asset('site/img/f3.jpg') }}" class="img-fluid" style="max-height: 150px; width: auto;" alt="رؤيتنا">
                        </div>
                        <div class="text-center mb-3">
                            <h3 class="fs-3x fw-bold text-orange"style="color: #da9a24; font-family: 'Cairo', sans-serif;">رؤيتنا</h3>
                        </div>
                        <p class="fw-semibold fs-6 fs-lg-4 text-gray-600">
                            تسعي "البراق" لتصدر الريادة وأن تكون الإختيار الأول للعديد من المستثمرين، وتتبلور الرؤية الأساسية فى تقديم الخدمات والحلول الإدارية المتكاملة وتنمية الثروات لكافة المستثمرين ورواد الأعمال.
                        </p>
                    </div>
                </div>
                <!-- رسالتنا -->
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded p-4 mb-4" style="border-radius: 0.25rem; padding: 1rem; margin-bottom: 1rem;text-align: justify;">
                        <div class="text-center mb-4">
                            <img src="{{ asset('site/img/f2.jpg') }}" class="img-fluid" style="max-height: 150px; width: auto;" alt="رسالتنا">
                        </div>
                        <div class="text-center mb-3">
                            <h3 class="fs-3x fw-bold text-orange"style="color: #da9a24; font-family: 'Cairo', sans-serif;">رسالتنا</h3>
                        </div>
                        <p class="fw-semibold fs-6 fs-lg-4 text-gray-600">
                            تعمل "البراق" على تحقيق نهضة عالية وفعالة في مجال الاستثمار وريادة الأعمال في العالم العربي، وتقديم خدمات وحلول اقتصادية متكاملة لرواد الأعمال العرب والمستثمرين.
                        </p>
                    </div>
                </div>
                <!-- هدفنا -->
                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item rounded p-4 mb-4" style="border-radius: 0.25rem; padding: 1rem; margin-bottom: 1rem;text-align: justify;">
                        <div class="text-center mb-4">
                            <img src="{{ asset('site/img/f1.jpg') }}" class="img-fluid" style="max-height: 150px; width: auto;" alt="هدفنا">
                        </div>
                        <div class="text-center mb-3">
                            <h3 class="fs-3x fw-bold text-orange"style="color: #da9a24; font-family: 'Cairo', sans-serif;">هدفنا</h3>
                        </div>
                        <p class="fw-semibold fs-6 fs-lg-4 text-gray-600">
                            هدفنا هو خدمه عملائنا بمعلومات موثوقة ونصائح سليمة لمساعدتهم على اتخاذ قرارات أعمال فعالة ومُثمرة، وتحقيق أحلامهم بتأسيس وتطوير أعمال ذات قيمة مبتكرة.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- رؤيتنا End -->
    
    
  
    

    @include('site.member')
    @include('site.team')

    <!-- Footer -->
    @include('site.footer')
    
    <script>
        var swiper = new Swiper('.clients-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            },
        });
    </script>
    
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
