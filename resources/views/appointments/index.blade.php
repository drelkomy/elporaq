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

    <div class="table-responsive">
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
                <th>الحالة</th>
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
                        <span class="badge {{ $appointment->status == 'approved' ? 'bg-success' : 'bg-warning' }}">
                            {{ $appointment->status == 'approved' ? 'تمت الموافقة' : 'قيد الانتظار' }}
                        </span>
                    </td>
                    <td>
                        @if($appointment->status != 'approved')
                            <form action="{{ route('appointments.approve', $appointment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">موافقة</button>
                            </form>
                        @endif
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
    </div>

    <!-- التصفح باستخدام المكون القابل لإعادة الاستخدام -->
    <x-admin-pagination :data="$appointments" />
@endsection
