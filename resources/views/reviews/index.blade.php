@extends('admin.layouts')

@section('content')
<head>
    <style>
        .review-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .review-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            width: 45%; /* تم زيادة العرض ليظهر الأزرار بشكل أوضح */
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            box-sizing: border-box;
            background-color: #fff;
            transition: box-shadow 0.3s ease;
        }

        .review-card:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .review-info h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .review-info p {
            font-size: 1rem;
            color: #333;
            white-space: nowrap; /* لجعل النص يظهر في سطر واحد */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .rating i {
            margin-right: 2px;
        }

        .rating i.fas {
            color: gold; /* لون النجوم الممتلئة */
            -webkit-text-stroke: 1px black; /* إضافة حد أسود متماشي مع تعرجات النجوم الممتلئة */
        }

        .rating i.far {
            color: black; /* لون النجوم الفارغة */
            -webkit-text-stroke: 1px black; /* إضافة حد أسود متماشي مع تعرجات النجوم الفارغة */
        }

        .review-actions {
            display: flex;
            justify-content: flex-end;
        }

        .review-actions button {
            margin-left: 0.5rem;
        }
               
        .image-cell img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin: 0 auto;
        }
    </style>
</head>
    <h1>قائمة المراجعات</h1>

    <br>

    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addReviewModal">
        إضافة مراجعة جديدة
    </button>

    <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReviewModalLabel">إضافة مراجعة جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="customer_name">اسم العميل</label>
                            <input type="text" id="customer_name" name="customer_name" class="form-control">
                            @error('customer_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customer_image">صورة العميل</label>
                            <input type="file" id="customer_image" name="customer_image" class="form-control">
                            <img id="customer_image_preview" src="" style="width: 150px; height: auto; display:none;">
                            @error('customer_image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rating">التقييم (من 1 إلى 5)</label>
                            <input type="number" id="rating" name="rating" class="form-control" min="1" max="5">
                            @error('rating')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="comment">التعليق</label>
                            <textarea id="comment" name="comment" class="form-control"></textarea>
                            @error('comment')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="review-cards">
        @foreach($reviews as $review)
            <div class="review-card">
                <div class="image-cell">
                    <img src="{{ asset($review->customer_image) }}" alt="Customer Image">
                </div>
                <div class="review-info">
                    <h3>{{ $review->customer_name }}</h3>
                    <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fa{{ $i <= $review->rating ? 's' : 'r' }} fa-star"></i>
                        @endfor
                    </div>
                    <p>{{ $review->comment }}</p>
                </div>
                <div class="review-actions">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editReviewModal{{ $review->id }}">
                        تعديل
                    </button>

                    <div class="modal fade" id="editReviewModal{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="editReviewModalLabel{{ $review->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editReviewModalLabel{{ $review->id }}">تعديل المراجعة</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('reviews.update', $review) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="customer_name">اسم العميل</label>
                                            <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ $review->customer_name }}">
                                            @error('customer_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="customer_image">صورة العميل</label>
                                            <input type="file" id="customer_image" name="customer_image" class="form-control">
                                            <img src="{{ asset('images/review/' . $review->customer_image) }}" style="width: 150px; height: auto;">
                                            @error('customer_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="rating">التقييم (من 1 إلى 5)</label>
                                            <input type="number" id="rating" name="rating" class="form-control" value="{{ $review->rating }}" min="1" max="5">
                                            @error('rating')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="comment">التعليق</label>
                                            <textarea id="comment" name="comment" class="form-control">{{ $review->comment }}</textarea>
                                            @error('comment')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">تحديث</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('reviews.destroy', $review) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-2">حذف</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const imageInput = document.getElementById('customer_image');
                const imagePreview = document.getElementById('customer_image_preview');

                imageInput.addEventListener('change', function (event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function () {
                            imagePreview.src = reader.result;
                            imagePreview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    }
                });
            });
        </script>
    @endpush

@endsection
