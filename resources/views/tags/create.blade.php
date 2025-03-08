@extends('admin.layouts')

@section('content')
<div class="container">
    <h1>إدارة التاجات</h1>

    <!-- نموذج إضافة تاج جديد -->
    <form action="{{ route('tags.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم التاج</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">إضافة تاج</button>
    </form>

    <!-- قائمة التاجات -->
    <h2 class="mt-4">قائمة التاجات</h2>
    <ul class="list-group">
        @foreach ($tags as $tag)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $tag->name }}
                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذا التاج؟')">حذف</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
