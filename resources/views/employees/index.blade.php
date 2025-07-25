@extends('admin.layouts')

@section('content')
    <div class="container">
        <h1>قائمة الموظفين</h1>
        <br>

        <!-- زر لفتح نافذة منبثقة للإضافة -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addEmployeeModal">
            إضافة موظف جديد
        </button>

        <!-- عرض رسائل النجاح -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- عرض قائمة الموظفين -->
        <table class="table">
            <thead>
                <tr>
                    <th>الصورة</th>
                    <th>الاسم</th>
                    <th>الوظيفة</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Instagram</th>
                    <th>LinkedIn</th>
                    <th colspan="2">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr class="employee-card">
                        <td class="image-cell">
                           <img src="{{ asset('images/Employee/' . $employee->image) }}" alt="Employee Image" style="width: 100px; height: auto; object-fit: cover;">



                        </td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->position }}</td>
                        <td><a href="{{ $employee->facebook }}" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a></td>
                        <td><a href="{{ $employee->twitter }}" target="_blank" class="social-icon"><i class="fab fa-twitter"></i></a></td>
                        <td><a href="{{ $employee->instagram }}" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a></td>
                        <td><a href="{{ $employee->linkedin }}" target="_blank" class="social-icon"><i class="fab fa-linkedin-in"></i></a></td>
                        <td>
                            <div class="d-flex">
                                <!-- زر لتعديل بيانات الموظف -->
                                <button type="button" class="btn btn-warning mx-1" data-toggle="modal" data-target="#editEmployeeModal{{ $employee->id }}">
                                    تعديل
                                </button>

                                <!-- نموذج الحذف -->
                                <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="mx-1">
                                   @csrf
                                   @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>
                            </div>
                            
                            <!-- نافذة منبثقة لتعديل الموظف -->
                            <div class="modal fade" id="editEmployeeModal{{ $employee->id }}" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel{{ $employee->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editEmployeeModalLabel{{ $employee->id }}">تعديل الموظف</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="image">الصورة</label>
                                                    <input type="file" id="image" name="image" class="form-control">
                                                  <img src="{{ asset('images/Employee/' . $employee->image) }}" alt="Employee Image" style="width: 100px; height: auto; object-fit: cover;">
                                                    @error('image')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">الاسم</label>
                                                    <input type="text" id="name" name="name" class="form-control" value="{{ $employee->name }}">
                                                    @error('name')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="position">الوظيفة</label>
                                                    <input type="text" id="position" name="position" class="form-control" value="{{ $employee->position }}">
                                                    @error('position')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="facebook">رابط فيسبوك</label>
                                                    <input type="text" id="facebook" name="facebook" class="form-control" value="{{ $employee->facebook }}">
                                                    @error('facebook')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="twitter">رابط تويتر</label>
                                                    <input type="text" id="twitter" name="twitter" class="form-control" value="{{ $employee->twitter }}">
                                                    @error('twitter')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="instagram">رابط إنستجرام</label>
                                                    <input type="text" id="instagram" name="instagram" class="form-control" value="{{ $employee->instagram }}">
                                                    @error('instagram')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="linkedin">رابط لينكد إن</label>
                                                    <input type="text" id="linkedin" name="linkedin" class="form-control" value="{{ $employee->linkedin }}">
                                                    @error('linkedin')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary">تحديث</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ترقيم الصفحات -->
        <div class="pagination-container mt-3 d-flex justify-content-center">
            {{ $employees->onEachSide(1)->links() }}
        </div>

        <!-- نافذة منبثقة لإضافة موظف جديد -->
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addEmployeeModalLabel">إضافة موظف جديد</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">الصورة</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">الاسم</label>
                                <input type="text" id="name" name="name" class="form-control">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="position">الوظيفة</label>
                                <input type="text" id="position" name="position" class="form-control">
                                @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="facebook">رابط فيسبوك</label>
                                <input type="text" id="facebook" name="facebook" class="form-control">
                                @error('facebook')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="twitter">رابط تويتر</label>
                                <input type="text" id="twitter" name="twitter" class="form-control">
                                @error('twitter')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="instagram">رابط إنستجرام</label>
                                <input type="text" id="instagram" name="instagram" class="form-control">
                                @error('instagram')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="linkedin">رابط لينكد إن</label>
                                <input type="text" id="linkedin" name="linkedin" class="form-control">
                                @error('linkedin')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">إضافة</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
<style>
    .employee-card img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
    }
    .employee-card td {
        vertical-align: middle;
    }
    .image-cell {
        width: 80px;
        text-align: center;
    }
    .link-icon {
        font-size: 1.2rem;
        margin: 0 3px;
    }
    .link-icon.disabled {
        color: #ccc;
    }
    /* تنسيق لعناصر الترقيم */
    .pagination-container {
        margin-top: 20px;
    }
    .pagination {
        display: flex;
        justify-content: center;
    }
    .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // التأكد من عمل النوافذ المنبثقة
        $('.modal').modal({
            show: false
        });
        
        // إضافة معاينة الصورة المختارة
        $('input[type="file"]').change(function(e) {
            var input = e.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var preview = $(this).closest('.form-group').find('.image-preview');
                
                reader.onload = function(e) {
                    if (preview.length) {
                        preview.attr('src', e.target.result).show();
                    }
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        });
    });
</script>
@endpush
