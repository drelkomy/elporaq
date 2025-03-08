<!-- Carousel Start -->
<div class="container-fluid px-0 carousel-container">
    <div id="carouselId" class="carousel slide carousel-fade" data-bs-ride="carousel"> <!-- فئة carousel-fade مضافة هنا -->
        <!-- مؤشرات الكاروسيل -->
        <ol class="carousel-indicators">
            @foreach ($sliders as $index => $slider)
                <li data-bs-target="#carouselId" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></li>
            @endforeach
        </ol>
        
        <!-- الشرائح -->
        <div class="carousel-inner" role="listbox">
            @foreach ($sliders as $index => $slider)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset('images/sliders/' . $slider->image_path) }}" class="img-fluid d-block w-100" alt="Slide {{ $index + 1 }}">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="carousel-content text-center">
                            <!-- محتوى الكاروسيل هنا -->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- أزرار التنقل -->
        <a class="carousel-control-prev" href="#carouselId" role="button" data-bs-slide="prev">
            <span aria-hidden="true">
                <i class="fas fa-chevron-left"></i> <!-- أيقونة السهم لليسار -->
            </span>
            <span class="visually-hidden">Previous</span>
        </a>
        
        <a class="carousel-control-next" href="#carouselId" role="button" data-bs-slide="next">
            <span aria-hidden="true">
                <i class="fas fa-chevron-right"></i> <!-- أيقونة السهم لليمين -->
            </span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>
<!-- Carousel End -->
