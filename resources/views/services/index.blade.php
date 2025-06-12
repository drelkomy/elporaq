@extends('admin.layouts')

@section('content')
    <h1>قائمة الخدمات</h1>

    <br>

    <!-- زر لفتح نافذة منبثقة -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addServiceModal">
        إضافة خدمة جديدة
    </button>

    <!-- نافذة منبثقة لإضافة خدمة جديدة -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">إضافة خدمة جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="service_name">اسم الخدمة</label>
                            <input type="text" id="service_name" name="service_name" class="form-control" required>
                            @error('service_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="service_image">صورة الخدمة</label>
                            <input type="file" id="service_image" name="service_image" class="form-control" onchange="previewImage(event)">
                            <img id="service_image_preview" src="#" style="width: 150px; height: auto; display:none;">
                            @error('service_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="service_description">معلومات عن الخدمة</label>
                            <textarea id="service_description" name="service_description" class="form-control" required></textarea>
                            @error('service_description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- عرض الخدمات -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="service-cards">
        @foreach($services as $service)
            <div class="service-card">
                <div class="image-cell">
                    <!-- تحديث مسار الصورة -->
                    <img src="{{ asset('images/services/' . $service->service_image) }}" alt="Service Image" style="width: 100%; height: auto;">
                </div>
                <div class="service-info">
                    <h3>{{ $service->service_name }}</h3>
                    <p>{{ $service->service_description }}</p>
                </div>
                <div class="service-actions">
                    <!-- زر لتعديل الخدمة -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editServiceModal{{ $service->id }}">
                        تعديل
                    </button>

                    <!-- نافذة منبثقة لتعديل الخدمة -->
                    <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="editServiceModalLabel{{ $service->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editServiceModalLabel{{ $service->id }}">تعديل الخدمة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="service_name">اسم الخدمة</label>
                                            <input type="text" id="service_name" name="service_name" class="form-control" value="{{ $service->service_name }}" required>
                                            @error('service_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="service_image">صورة الخدمة</label>
                                            <input type="file" id="service_image" name="service_image" class="form-control">
                                            @if($service->service_image)
                                                <img src="{{ asset('images/services/' . $service->service_image) }}" style="width: 150px; height: auto;">
                                            @endif
                                            @error('service_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="service_description">معلومات عن الخدمة</label>
                                            <textarea id="service_description" name="service_description" class="form-control" required>{{ $service->service_description }}</textarea>
                                            @error('service_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">تحديث</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- زر لحذف الخدمة -->
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-1">حذف</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ترقيم الصفحات -->
    <div class="mt-3">
        @if(isset($services) && method_exists($services, 'links'))
            {{ $services->links('components.admin-pagination') }}
        @endif
    </div>

    <!-- إضافة JQuery و Bootstrap JS لتفعيل النوافذ المنبثقة -->
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script>
            function previewImage(event) {
                const input = event.target;
                const preview = document.getElementById('service_image_preview');
                
                if (input.files && input.files[0]) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    @endpush

    <style>
        .service-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .service-card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            max-width: 350px;
            text-align: center;
            overflow: hidden; /* ضمان عدم خروج النصوص عن الكرت */
        }

        .service-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .service-info {
            padding: 10px;
            text-align: center;
        }

        .service-info h3 {
            font-size: 1.25rem;
            margin: 0;
            overflow: hidden; /* لضمان عدم خروج النص عن الحاوية */
            text-overflow: ellipsis; /* إضافة نقاط بعد النصوص الطويلة */
            white-space: nowrap; /* عدم التفاف النص */
        }

        .service-info p {
            margin: 0;
            font-size: 0.875rem;
            overflow: hidden; /* ضمان عدم خروج النص عن الكرت */
            text-overflow: ellipsis; /* إضافة نقاط بعد النصوص الطويلة */
            white-space: nowrap; /* عدم التفاف النص */
        }

        .service-actions {
            margin-top: 10px;
        }

        .service-actions .btn {
            margin: 5px;
        }
    </style>
@endsection
