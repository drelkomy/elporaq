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

        <!-- زر إضافة تصنيف جديد -->
        <div class="mb-4">
            <h2>تصنيفات المدونة</h2>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addBlogCategoryModal">
                <i class="fas fa-plus-circle ml-1"></i> إضافة تصنيف جديد
            </button>
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
                                <div class="d-flex">
                                    <!-- زر تعديل -->
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm mx-1">تعديل</a>

                                    <!-- نموذج حذف -->
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="mx-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            @if(isset($categories) && method_exists($categories, 'links'))
                <x-admin-pagination :data="$categories" />
            @endif
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
<!-- نافذة منبثقة لإضافة تصنيف جديد -->
<div class="modal fade" id="addBlogCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addBlogCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBlogCategoryModalLabel">إضافة تصنيف جديد للمدونة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST" id="addBlogCategoryForm">
                    @csrf
                    <div class="form-group">
                        <label for="name">اسم التصنيف</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('addBlogCategoryForm').submit();">إضافة التصنيف</button>
            </div>
        </div>
    </div>
</div>

@endsection
