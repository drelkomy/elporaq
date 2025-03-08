
<!-- Topbar Start -->
<div class="container-fluid py-1 topbar-container"  style="background-color: rgb(223, 230, 230)">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center topbar">
            <a href="/"><img src="{{ asset('site/img/asd.png') }}" height="60" width="170" alt="البراق للاستشارات الاقتصادية ودراسات الجدوى"></a>
            <div class="top-link d-flex m-2">
                @foreach($links as $link)
                    <a href="{{ $link->link_name }}" target="_blank" class="bg-light nav-fill btn btn-sm-square rounded-circle me-2">
                        <i class="{{ $link->icon_name }}"></i>
                    </a>
                @endforeach
            </div>
            <a href="/app" class="btn btn-light mt-2 book-appointment">
                <i class="fas fa-calendar-plus me-2 "></i> احجز موعد
            </a>
        </div>
    </div>
</div>
<!-- Topbar End -->