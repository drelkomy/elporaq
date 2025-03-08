<div class="container-fluid project py-5 mb-5">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h2 class="" style="font-family: Cairo, sans-serif; color: #FFAB00;">خدمات البراق</h2>
        </div>
        <div class="row g-5">
            @foreach($services as $service)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".3s">
                    <div class="project-item position-relative">
                        <div class="project-img">
                            <img src="{{ asset('images/services/' . $service->service_image) }}" class="img-fluid w-100 rounded">
                            <div class="project-content">
                                <!-- تعديل الرابط ليقوم بنقل المستخدم إلى صفحة تفاصيل الخدمة -->
                                <a href="{{ route('site.allservice', ['id' => $service->id]) }}"
                                   aria-label="{{ $service->service_name }}">
                                   {{ $service->service_name }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
