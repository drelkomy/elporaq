@extends('admin.layouts')

@section('content')
    <h1>عرض الطلبات</h1>

    <!-- نموذج البحث -->
    <form action="{{ route('appointments.index') }}" method="GET" class="mb-4">
        <input type="text" name="search" placeholder="ابحث هنا" value="{{ request()->query('search') }}" class="form-control mb-2">
        <button type="submit" class="btn btn-primary">بحث</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>الخدمة</th>
                <th>التاريخ</th>
                <th>الاسم</th>
                <th>رقم الجوال</th>
                <th>البريد الإلكتروني</th>
                <th>الدولة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->service }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->tel }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->country }}</td>
                    <td>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- التصفح -->
    <div class="pagination justify-content-center mt-4">
        {{-- Previous Page Link --}}
        @if ($appointments->onFirstPage())
            <span class="page-link disabled">السابق</span>
        @else
            <a href="{{ $appointments->previousPageUrl() }}" class="page-link">السابق</a>
        @endif

        {{-- Pagination Links --}}
        @for ($i = 1; $i <= $appointments->lastPage(); $i++)
            @if ($i == $appointments->currentPage())
                <span class="page-link active">{{ $i }}</span>
            @else
                <a href="{{ $appointments->url($i) }}" class="page-link">{{ $i }}</a>
            @endif
        @endfor

        {{-- Next Page Link --}}
        @if ($appointments->hasMorePages())
            <a href="{{ $appointments->nextPageUrl() }}" class="page-link">التالي</a>
        @else
            <span class="page-link disabled">التالي</span>
        @endif
    </div>
@endsection
