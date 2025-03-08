@extends('admin.layouts')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">قائمة الطلبات</h2>

    <form action="{{ route('applications.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="بحث..." value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit">بحث</button>
            </div>
        </div>
    </form>

    @if ($applications->isEmpty())
        <p>لا توجد طلبات لعرضها.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الوظيفة</th>
                    <th>المستند</th>
                    <th>تاريخ الإضافة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applications as $application)
                    <tr>
                        <td>{{ $application->id }}</td>
                        <td>{{ $application->name }}</td>
                        <td>{{ $application->job_type }}</td>
                        <td>
                            @if ($application->document)
                                <a href="{{ asset('uploads/documents/' . $application->document) }}" target="_blank">عرض المستند</a>
                            @else
                                لا يوجد مستند
                            @endif
                        </td>
                        <td>{{ $application->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>
                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
