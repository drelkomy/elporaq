@extends('admin.layouts')

@section('content')
    <h1>فرص استثمارية</h1>
    <br>
    <form method="GET" action="{{ route('investment-opportunities.index') }}" class="mb-4 d-flex">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="بحث" value="{{ request()->get('search') }}">
            <select name="category" class="form-select">
                <option value="">كل التصنيفات</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request()->get('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">بحث</button>
        </div>
    </form>

    <a href="{{ route('investment-opportunities.create') }}" class="btn btn-success mb-4">إضافة فرصة استثمارية جديدة</a>

    @if($opportunities->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الصورة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($opportunities as $opportunity)
                    <tr>
                        <td>{{ $opportunity->title }}</td>
                                          <td>
                            @if($opportunity->image)
                              <img src="{{ asset('images/invest/'.$opportunity->image) }}" width="100" alt="صورة الفرصة" class="img-thumbnail">

                            @else
                                <span class="text-muted">لا توجد صورة</span>
                            @endif
                        </td>
                        <td class="d-flex">
                            <a href="{{ route('investment-opportunities.show', $opportunity->id) }}" class="btn btn-info btn-sm m-1">معاينة</a>
                            <a href="{{ route('investment-opportunities.edit', $opportunity->id) }}" class="btn btn-warning btn-sm m-1">تعديل</a>
                            <form action="{{ route('investment-opportunities.destroy', $opportunity->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm m-1" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center">لا توجد فرص استثمارية.</p>
    @endif

    <!-- التصفح -->
    <div class="custom-pagination text-center">
        @if ($opportunities->onFirstPage())
            <span class="disabled">السابق</span>
        @else
            <a href="{{ $opportunities->previousPageUrl() }}" class="page-link">السابق</a>
        @endif
    
        @for ($i = 1; $i <= $opportunities->lastPage(); $i++)
            @if ($i == $opportunities->currentPage())
                <span class="active">{{ $i }}</span>
            @else
                <a href="{{ $opportunities->url($i) }}" class="page-link">{{ $i }}</a>
            @endif
        @endfor
    
        @if ($opportunities->hasMorePages())
            <a href="{{ $opportunities->nextPageUrl() }}" class="page-link">التالي</a>
        @else
            <span class="disabled">التالي</span>
        @endif
    </div>
    <!-- التصفح نهاية -->
@endsection
