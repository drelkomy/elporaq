@extends('admin.layouts')

@section('content')
    <div class="container">
        <h1>التصنيفات</h1>

        <!-- رسالة النجاح -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- نموذج إضافة تصنيف -->
        <div class="mb-4">
            <h2>إضافة تصنيف جديد</h2>
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">اسم التصنيف</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">الوصف</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">إضافة</button>
            </form>
        </div>

        <!-- قائمة التصنيفات -->
        <div class="mb-4">
            <h2>قائمة التصنيفات</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>الوصف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <!-- زر تعديل -->
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">تعديل</a>

                                <!-- نموذج حذف -->
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- نموذج تعديل التصنيف (يظهر فقط عند طلب التعديل) -->
        @isset($editCategory)
            <div class="mb-4">
                <h2>تعديل التصنيف</h2>
                <form action="{{ route('categories.update', $editCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">اسم التصنيف</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $editCategory->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea id="description" name="description" class="form-control">{{ $editCategory->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">تحديث</button>
                </form>
            </div>
        @endisset
    </div>
@endsection
