<!-- Testimonial Start -->
<div class="container-fluid testimonial py-5 mb-5" dir="ltr" style="background-color: #f0f8ff;">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h1 style="font-family:'Cairo', sans-serif; color: #FFAB00;">آراء العملاء</h1>
                 اراء العملاء في مستوى أداء الخدمات المقدم من البراق</h5>

        </div>
        <div class="owl-carousel testimonial-carousel wow fadeIn" data-wow-delay=".5s">
        @foreach($reviews as $review)
        <div class="testimonial-item border p-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); position: relative; overflow: hidden; padding: 1.5rem; box-sizing: border-box; width: 350px; height: auto;">
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ asset($review->customer_image) }}"alt="Customer Image" style="width: 100px; height: 100px; border-radius: 50%; border: 2px solid #ff6700;">
                    </div>
                    <div class="me-4">
                        <h4 class="text-black" style="font-family: 'Cairo', sans-serif; color: #0056b3; text-align: right;">{{ $review->customer_name }}</h4>
                        <div class="d-flex pe-5">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star me-1" style="color: {{ $i <= $review->rating ? '#ff6700' : '#ccc' }};"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="border-top mt-4 pt-3" style="border-color: #0056b3;">
                    <p class="mb-0" style="font-family: 'Cairo', sans-serif; color: #333; text-align: right; margin: 0; white-space: normal;">{{ $review->comment }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
