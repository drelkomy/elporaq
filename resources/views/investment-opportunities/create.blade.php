@extends('admin.layouts')

@section('content')
<div class="container">
    <h1 class="mb-4">إضافة فرصة استثمارية جديدة</h1>

   <form action="{{ route('investment-opportunities.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">العنوان</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">الوصف</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">التصنيف</label>
        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
            <option value="">اختر تصنيف</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">صورة الفرصة الاستثمارية</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="project_features" class="form-label">مميزات المشروع</label>
        <textarea class="form-control @error('project_features') is-invalid @enderror" id="project_features" name="project_features" rows="4">{{ old('project_features') }}</textarea>
        @error('project_features')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="project_products" class="form-label">منتجات المشروع</label>
        <textarea class="form-control @error('project_products') is-invalid @enderror" id="project_products" name="project_products" rows="4">{{ old('project_products') }}</textarea>
        @error('project_products')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="production_process" class="form-label">مراحل ودورة الإنتاج</label>
        <textarea class="form-control @error('production_process') is-invalid @enderror" id="production_process" name="production_process" rows="4">{{ old('production_process') }}</textarea>
        @error('production_process')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="required" class="form-label">متطلبات المشروع</label>
        <textarea class="form-control @error('required') is-invalid @enderror" id="required" name="required" rows="4">{{ old('required') }}</textarea>
        @error('required')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="project_ser" class="form-label">خدمات المشروع</label>
        <textarea class="form-control @error('project_ser') is-invalid @enderror" id="project_ser" name="project_ser" rows="4">{{ old('project_ser') }}</textarea>
        @error('project_ser')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="financial_indicators" class="form-label">المؤشرات المالية</label>
        <textarea class="form-control @error('financial_indicators') is-invalid @enderror" id="financial_indicators" name="financial_indicators" rows="4">{{ old('financial_indicators') }}</textarea>
        @error('financial_indicators')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">إضافة فرصة استثمارية</button>
</form>

</div>
@endsection
