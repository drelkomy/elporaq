@extends('admin.layouts')

@section('content')
    <h1>قائمة الصور</h1>

    <br>

    <!-- Button to open modal for adding new image -->
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSliderModal">
        إضافة صورة جديدة
    </button>

    <!-- Modal for adding new image -->
    <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog" aria-labelledby="addSliderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSliderModalLabel">إضافة صورة جديدة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">اختر صورة</label>
                            <input type="file" id="image" name="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Table for listing images -->
    <table class="table">
        <thead>
            <tr>
                <th>الصورة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <!-- Display image -->
                    <td><img src="{{ asset('/images/sliders/' . $slider->image_path) }}" alt="Slider Image" style="width: 150px; height: auto;"></td>
                    <td>
                        <!-- Button to open modal for editing image -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editSliderModal{{ $slider->id }}">
                            تعديل
                        </button>

                        <!-- Modal for editing image -->
                        <div class="modal fade" id="editSliderModal{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="editSliderModalLabel{{ $slider->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editSliderModalLabel{{ $slider->id }}">تعديل الصورة</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="image">اختر صورة جديدة (اختياري)</label>
                                                <input type="file" id="image" name="image" class="form-control">
                                                @error('image')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">تحديث</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- Form for deleting image -->
                        <form action="{{ route('sliders.destroy', $slider) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Include jQuery and Bootstrap JS for modals -->
    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    @endpush
@endsection
