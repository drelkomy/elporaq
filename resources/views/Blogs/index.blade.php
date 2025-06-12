@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>قائمة التدوينات</h1>

    <!-- زر إضافة تدوينة جديدة -->
    <div class="mb-3">
        <a href="{{ route('blogs.create') }}" class="btn btn-success">إضافة تدوينة جديدة</a>
    </div>

    <!-- عرض قائمة التدوينات -->
    @if($blogs->count() > 0)
        <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان التدوينة</th>
                    <th>التصنيف</th>
                    <th>التاجات</th>
                    <th>الصورة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->category->name ?? 'بدون تصنيف' }}</td>
                        <td>{{ implode(', ', $blog->tags->pluck('name')->toArray()) }}</td>
                        <td>
                            @if ($blog->image)
                                    <img src="{{ asset('images/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 100%; max-width: 600px; height: auto;">
         
                            @else
                                <span>لا توجد صورة</span>
                            @endif
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm me-2">تعديل</a>
                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد أنك تريد حذف هذه التدوينة؟');">
    				@csrf
  			  @method('DELETE')
   			 <button type="submit" class="btn btn-danger">حذف</button>
				</form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    @else
        <p>لا توجد تدوينات متاحة.</p>
    @endif
</div>

<!-- التصفح باستخدام المكون القابل لإعادة الاستخدام -->
<div class="my-3">
    <x-admin-pagination :data="$blogs" />
</div>
@endsection
