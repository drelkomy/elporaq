@extends('admin.layouts')

@section('content')
<!-- رسالة النجاح إذا كانت موجودة -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <h2 class="mb-4">قائمة التدريبات</h2>

    <!-- نموذج البحث -->
    <form method="GET" action="{{ route('trainings.index') }}">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" value="{{ $query }}" placeholder="بحث...">
            <button class="btn btn-primary" type="submit">بحث</button>
        </div>
    </form>

    <!-- جدول عرض التدريبات -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المتدرب</th>
                    <th>البريد الإلكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>العنوان</th>
                    <th>المؤهل الدراسي</th>
                    <th>نوعية التدريب</th>
                    <th>التحكم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainings as $training)
                    <tr>
                        <td>{{ $training->id }}</td>
                        <td>{{ $training->name }}</td>
                        <td>{{ $training->email }}</td>
                        <td>{{ $training->phone }}</td>
                        <td>{{ $training->address }}</td>
                        <td>{{ $training->study }}</td>
                        <td>{{ $training->training_type }}</td>
                        <td>
                            <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- التصفح -->
        <div class="pagination justify-content-center mt-4">
            {{-- Previous Page Link --}}
            @if ($trainings->onFirstPage())
                <span class="page-link disabled">السابق</span>
            @else
                <a href="{{ $trainings->previousPageUrl() }}" class="page-link">السابق</a>
            @endif
        
            {{-- Pagination Links --}}
            @for ($i = 1; $i <= $trainings->lastPage(); $i++)
                @if ($i == $trainings->currentPage())
                    <span class="page-link active">{{ $i }}</span>
                @else
                    <a href="{{ $trainings->url($i) }}" class="page-link">{{ $i }}</a>
                @endif
            @endfor
        
            {{-- Next Page Link --}}
            @if ($trainings->hasMorePages())
                <a href="{{ $trainings->nextPageUrl() }}" class="page-link">التالي</a>
            @else
                <span class="page-link disabled">التالي</span>
            @endif
        </div>
@endsection
