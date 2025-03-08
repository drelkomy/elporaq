@extends('admin.layouts')

@section('content')
    <h1>قائمة الروابط</h1>
    <br>
    <!-- شريط البحث -->
    <div class="mb-3">
        <form action="{{ route('links.index') }}" method="GET">
            <input type="text" name="search" class="form-control" placeholder="بحث عن رابط..." value="{{ request()->get('search') }}">
        </form>
    </div>

    <!-- زر لفتح نافذة منبثقة -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLinkModal">
        إضافة رابط جديد
    </button>

    <!-- نافذة منبثقة لإضافة رابط جديد -->
    <div class="modal fade" id="addLinkModal" tabindex="-1" role="dialog" aria-labelledby="addLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLinkModalLabel">إضافة رابط جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('links.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="link_name">اسم الرابط</label>
                            <input type="text" id="link_name" name="link_name" class="form-control" value="{{ old('link_name') }}">
                            @error('link_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="icon_name_add">اسم الأيقونة</label>
                            <select id="icon_name_add" name="icon_name" class="form-control">
                                <option value="fab fa-facebook-f" data-color="#3b5998">Facebook</option>
                                <option value="fab fa-twitter" data-color="#1da1f2">Twitter</option>
                                <option value="fab fa-instagram" data-color="#c13584">Instagram</option>
                                <option value="fab fa-linkedin" data-color="#0077b5">LinkedIn</option>
                                <option value="fab fa-youtube" data-color="#ff0000">YouTube</option>
                                <option value="fab fa-tiktok" data-color="#000000">Tiktok</option>
                            </select>
                            @error('icon_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div id="icon_preview_add" class="icon-preview" style="color: #000000;">
                                <i class="fab fa-facebook-f"></i>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- عرض الروابط -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>اسم الرابط</th>
                <th>اسم الأيقونة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
                <tr>
                    <td>{{ $link->link_name }}</td>
                    <td><i class="{{ $link->icon_name }}" style="color: {{ $link->icon_color }};"></i></td>
                    <td>
                        <!-- زر لتعديل الرابط -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editLinkModal" data-id="{{ $link->id }}" data-name="{{ $link->link_name }}" data-icon="{{ $link->icon_name }}" data-color="{{ $link->icon_color }}">
                            تعديل
                        </button>

                        <!-- نموذج الحذف -->
                        <form action="{{ route('links.destroy', $link) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذا الرابط؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- نافذة منبثقة لتعديل الرابط -->
    <div class="modal fade" id="editLinkModal" tabindex="-1" role="dialog" aria-labelledby="editLinkModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLinkModalLabel">تعديل الرابط</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editLinkForm" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="link_name_edit">اسم الرابط</label>
                            <input type="text" id="link_name_edit" name="link_name" class="form-control">
                            @error('link_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="icon_name_edit">اسم الأيقونة</label>
                            <select id="icon_name_edit" name="icon_name" class="form-control">
                                <option value="fab fa-facebook-f" data-color="#3b5998">Facebook</option>
                                <option value="fab fa-twitter" data-color="#1da1f2">Twitter</option>
                                <option value="fab fa-instagram" data-color="#c13584">Instagram</option>
                                <option value="fab fa-linkedin" data-color="#0077b5">LinkedIn</option>
                                <option value="fab fa-youtube" data-color="#ff0000">YouTube</option>
                                <option value="fab fa-tiktok" data-color="#000000">Tiktok</option>
                            </select>
                            @error('icon_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div id="icon_preview_edit" class="icon-preview">
                                <i class=""></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">تحديث</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const iconSelectAdd = document.getElementById('icon_name_add');
            const iconPreviewAdd = document.getElementById('icon_preview_add');
            const iconSelectEdit = document.getElementById('icon_name_edit');
            const iconPreviewEdit = document.getElementById('icon_preview_edit');
            const editLinkModal = document.getElementById('editLinkModal');
            const editLinkForm = document.getElementById('editLinkForm');
            const linkNameEdit = document.getElementById('link_name_edit');

            function updateIconColor(selectElement, previewElement) {
                const selectedOption = selectElement.options[selectElement.selectedIndex];
                const iconColor = selectedOption.getAttribute('data-color');
                previewElement.style.color = iconColor;
                previewElement.querySelector('i').className = selectedOption.value;
            }

            // تحديث معاينة الأيقونة في نافذة الإضافة
            iconSelectAdd.addEventListener('change', function() {
                updateIconColor(iconSelectAdd, iconPreviewAdd);
            });

            // تفعيل نافذة التعديل ببيانات الرابط المحدد
            $('#editLinkModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const name = button.data('name');
                const icon = button.data('icon');
                const color = button.data('color');

                editLinkForm.action = `/links/${id}`;
                linkNameEdit.value = name;
                iconSelectEdit.value = icon;
                iconPreviewEdit.style.color = color;
                iconPreviewEdit.querySelector('i').className = icon;

                updateIconColor(iconSelectEdit, iconPreviewEdit);
            });

            // تحديث معاينة الأيقونة في نافذة التعديل
            iconSelectEdit.addEventListener('change', function() {
                updateIconColor(iconSelectEdit, iconPreviewEdit);
            });
        });
    </script>
@endsection
