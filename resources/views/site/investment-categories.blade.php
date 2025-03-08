<!-- investment-categories Start -->
<div class="container-xxl py-4 mt-4">
    <div class="container">
        <div class="row g-5">
            @foreach ($investmentCategories as $category)
            <div class="col-lg-3 col-sm-6 wow fadeInUp text-center " data-wow-delay="0.1s">
                <a class="cat-item rounded p-4 d-flex flex-column align-items-center" href="{{ route('investment-opportunities.allinvest', ['category' => $category->id]) }}">
                    <i class="fa {{ $category->sector }} fa-3x mb-4 my-2" style="color:#0e54a3;"></i>
                    <h4 class="mb-3" style="font-family:'Cairo';">{{ $category->name }}</h4>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- investment-categories End -->