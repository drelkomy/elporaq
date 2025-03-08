<head>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- إضافة مكتبة Swiper CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- إضافة مكتبة Swiper JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<style>

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
 <!-- شركاء Start -->
 <div class="container py-5">
        <div class="section-title text-center">
            <h1 class="fs-3x fw-bold text-orange" style="color: #FFAB00; font-family: 'Cairo', sans-serif;text-bolder;">عملائنا</h1>
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