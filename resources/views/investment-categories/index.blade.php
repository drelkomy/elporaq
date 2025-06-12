@extends('admin.layouts')

@section('content')
<div class="container">
    <div class="row">
        <!-- زر إضافة تصنيف استثماري جديد -->
        <div class="col-md-12 mb-4">
            <h1>تصنيفات الفرص الاستثمارية</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">
                <i class="fas fa-plus-circle ml-1"></i> إضافة تصنيف استثماري جديد
            </button>
        </div>

        <!-- قائمة التصنيفات -->
        <div class="col-md-12">
            <h1>قائمة التصنيفات</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>القطاع</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>
                                <!-- عرض أيقونة القطاع -->
                                @if($category->sector)
                                    <i class="fas {{ $category->sector }}" style="font-size: 24px;"></i>
                                @else
                                    غير محدد
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <!-- زر تعديل -->
                                    <a href="{{ route('investment-categories.edit', $category->id) }}" class="btn btn-warning btn-sm mx-1">تعديل</a>

                                    <!-- نموذج حذف -->
                                    <form action="{{ route('investment-categories.destroy', $category->id) }}" method="POST" class="mx-1">
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
            
            <!-- ترقيم الصفحات -->
            <div class="mt-3">
                @if(isset($categories) && method_exists($categories, 'links'))
                    {{ $categories->links('components.admin-pagination') }}
                @endif
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownItems = document.querySelectorAll('.dropdown-item');
        const selectedIconInput = document.getElementById('selected-icon');
    
        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                // Actualizar el valor seleccionado en el input oculto
                selectedIconInput.value = this.getAttribute('data-icon');
                
                // Actualizar el texto del botón
                const button = document.getElementById('dropdownMenuButton');
                button.innerHTML = this.innerHTML;
                
                // Agregar el icono de flecha hacia abajo al botón
                const caret = document.createElement('span');
                caret.className = 'caret';
                button.appendChild(caret);
            });
        });
    });
</script>

<!-- نافذة منبثقة لإضافة تصنيف استثماري جديد -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">إضافة تصنيف استثماري جديد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('investment-categories.store') }}" method="POST" id="addCategoryForm">
                    @csrf
                    <!-- حقل الاسم -->
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم التصنيف</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- قائمة منسدلة لاختيار القطاع -->
                    <div class="mb-3">
                        <label for="sector">اختر الايقونة</label>
                        <div class="dropdown w-100">
                            <button class="btn btn-outline-secondary dropdown-toggle w-100 text-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-icons ml-2"></i> اختر أيقونة
                            </button>
                            <div class="dropdown-menu dropdown-menu-right w-100" aria-labelledby="dropdownMenuButton">
                                <!-- قائمة الأيقونات -->
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-hospital">
                                    <i class="fas fa-hospital ml-2"></i> مستشفى
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-store">
                                    <i class="fas fa-store ml-2"></i> متجر
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-seedling">
                                    <i class="fas fa-seedling ml-2"></i> نباتات
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-paw">
                                    <i class="fas fa-paw ml-2"></i> حيواني
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-industry">
                                    <i class="fas fa-industry ml-2"></i> صناعي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-leaf">
                                    <i class="fas fa-leaf ml-2"></i> بيئي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-apple-alt">
                                    <i class="fas fa-apple-alt ml-2"></i> غذائي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-graduation-cap">
                                    <i class="fas fa-graduation-cap ml-2"></i> تعليمي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-theater-masks">
                                    <i class="fas fa-theater-masks ml-2"></i> ترفيهي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-sun">
                                    <i class="fas fa-sun ml-2"></i> سياحي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-shuttle-van">
                                    <i class="fas fa-shuttle-van ml-2"></i> نقل
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-recycle">
                                    <i class="fas fa-recycle ml-2"></i> إعادة تدوير
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-laptop-code">
                                    <i class="fas fa-laptop-code ml-2"></i> تكنولوجي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-calendar-day">
                                    <i class="fas fa-calendar-day ml-2"></i> تقويم
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-cogs">
                                    <i class="fas fa-cogs ml-2"></i> إعدادات
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-truck">
                                    <i class="fas fa-truck ml-2"></i> شاحنة
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-globe">
                                    <i class="fas fa-globe ml-2"></i> عالمي
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-lightbulb">
                                    <i class="fas fa-lightbulb ml-2"></i> إضاءة
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-wrench">
                                    <i class="fas fa-wrench ml-2"></i> أداة
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-music">
                                    <i class="fas fa-music ml-2"></i> موسيقى
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-video">
                                    <i class="fas fa-video ml-2"></i> فيديو
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-camera">
                                    <i class="fas fa-camera ml-2"></i> كاميرا
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-paint-brush">
                                    <i class="fas fa-paint-brush ml-2"></i> رسم
                                </a>
                                <a class="dropdown-item" href="javascript:void(0);" data-icon="fa-dumbbell">
                                    <i class="fas fa-dumbbell ml-2"></i> لياقة
                                </a>
                            </div>
                        </div>
                        <input type="hidden" id="selected-icon" name="sector">
                        @error('sector')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('addCategoryForm').submit();">إضافة التصنيف</button>
            </div>
        </div>
    </div>
</div>

@endsection
