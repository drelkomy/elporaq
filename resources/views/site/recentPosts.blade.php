<head>
     <style>
  .card {
    border-radius: 20px; /* زيادة الزوايا المدورة لجعلها دائرية أكثر */
    overflow: hidden; /* إخفاء أي جزء من الصورة يخرج عن حدود الكرت */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* إضافة ظل خفيف للكرت لتحسين المظهر */
    margin-bottom: 1.5rem; /* إضافة مسافة سفلية بين الكروت */
    background-color: #ffffff; /* لون خلفية للكرت */
  }

  .card-img-top {
    width: 100%; /* عرض الصورة ليملأ الكرت بالكامل */
    height: 200px; /* تحديد الارتفاع الموحد لكل الصور */
    object-fit: cover; /* ضبط الصورة لتملأ البطاقة بالكامل */
    background-color: #f5f5f5; /* لون خلفية للجزء الفارغ حول الصورة */
    border-top-left-radius: 20px; /* الحفاظ على انحناء الحواف العلوية للصورة */
    border-top-right-radius: 20px; /* الحفاظ على انحناء الحواف العلوية للصورة */
  }

  .card-body {
    padding: 1rem; /* إضافة مسافة داخلية للكرت */
  }

  .card-title {
    margin-bottom: 0.5rem; /* تقليل المسافة السفلية للعنوان */
    font-size: 1.25rem; /* ضبط حجم الخط للعنوان */
  }

  .card-text {
    font-size: 1rem; /* ضبط حجم الخط للنص */
    color: #666666; /* لون النص لتحسين وضوح القراءة */
  }
</style>

</head>
<!-- CardRecent -->
<div class="mb-5 wow slideInUp py-5" data-wow-delay="0.1s">
    <div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h1 class="mb-0 text-center" style="font-family: Cairo;color:#FFAB00;text-bolder;">آخر التدوينات</h1>
    </div>
    <div class="container card-recent" >
        <div class="row">
            @foreach ($recentBlogs->take(9) as $blog)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm rounded" style="overflow: hidden;">
                        <!-- Card Image -->
                        <img class="img-fluid card-img-top" src="{{ asset('images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}">

                        <!-- Card Body -->
                        <div class="card-body">
                            <h6 class="card-title" style="font-family: Cairo">{{ $blog->title }}</h6>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit(html_entity_decode(strip_tags($blog->content)),100) }}</p>
                            <p class="card-date text-muted" style="font-family: Cairo">{{ $blog->created_at->format('d M Y') }}</p>

                            @if ($blog->category)
                                <p class="card-category text-muted" style="font-family: Cairo">{{ $blog->category->name }}</p>
                            @else
                                <p class="card-category text-muted" style="font-family: Cairo">غير محدد</p>
                            @endif
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary">اقرأ المزيد</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- CardRecent End -->
