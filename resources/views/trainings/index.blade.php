@extends('admin.layouts')

@section('content')
<!-- رسالة النجاح إذا كانت موجودة -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">قائمة التدريبات</h3>
                </div>
                <div class="card-body">
                    <!-- نموذج البحث -->
                    <form method="GET" action="{{ route('trainings.index') }}" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" value="{{ $query ?? '' }}" placeholder="بحث...">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">بحث</button>
                            </div>
                        </div>
                    </form>

                    <!-- جدول عرض التدريبات -->
                    @php
                        $columns = ['#', 'اسم المتدرب', 'البريد الإلكتروني', 'رقم الهاتف', 'العنوان', 'المؤهل الدراسي', 'نوعية التدريب', 'الإجراءات'];
                    @endphp
                    
                    <x-admin-table :columns="$columns">
                        @forelse ($trainings as $training)
                            <tr>
                                <td>{{ $training->id }}</td>
                                <td>{{ $training->name }}</td>
                                <td>{{ $training->email }}</td>
                                <td>{{ $training->phone }}</td>
                                <td>{{ $training->address }}</td>
                                <td>{{ $training->study }}</td>
                                <td>{{ $training->training_type }}</td>
                                <td class="action-buttons">
                                    <form action="{{ route('trainings.destroy', $training->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('هل أنت متأكد من حذف هذا التدريب؟')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">لا توجد تدريبات لعرضها</td>
                            </tr>
                        @endforelse
                    </x-admin-table>
                    
                    <!-- ترقيم الصفحات -->
                    <div class="mt-3">
                        {{ $trainings->links('components.admin-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
