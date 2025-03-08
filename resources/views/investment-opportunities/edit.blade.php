@extends('admin.layouts')

@section('title', $investmentOpportunity->title . ' - تعديل الفرصة الاستثمارية')

@section('content')
    <h1>تعديل الفرصة الاستثمارية</h1>
<form action="{{ route('investment-opportunities.update', $investmentOpportunity->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">العنوان</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $investmentOpportunity->title) }}" required>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">الوصف</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $investmentOpportunity->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">التصنيف</label>
        <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $investmentOpportunity->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">الصورة</label>
        @if($investmentOpportunity->image)
            <div class="mb-2">
                <img src="{{ asset('images/invest/' . $investmentOpportunity->image) }}" width="100" alt="صورة الفرصة" class="img-thumbnail">
                <br>
                <a href="{{ asset('images/invest/' . $investmentOpportunity->image) }}" target="_blank">عرض الصورة الحالية</a>
            </div>
        @endif
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="project_features" class="form-label">ميزات المشروع</label>
        <textarea name="project_features" id="project_features" class="form-control">{{ old('project_features', $investmentOpportunity->project_features) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="project_products" class="form-label">منتجات المشروع</label>
        <textarea name="project_products" id="project_products" class="form-control">{{ old('project_products', $investmentOpportunity->project_products) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="production_process" class="form-label">عملية الإنتاج</label>
        <textarea name="production_process" id="production_process" class="form-control">{{ old('production_process', $investmentOpportunity->production_process) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="required" class="form-label">متطلبات المشروع</label>
        <textarea name="required" id="required" class="form-control">{{ old('required', $investmentOpportunity->required) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="project_ser" class="form-label">خدمات المشروع</label>
        <textarea name="project_ser" id="project_ser" class="form-control">{{ old('project_ser', $investmentOpportunity->project_ser) }}</textarea>
    </div>

    <div class="mb-3">
        <label for="financial_indicators" class="form-label">المؤشرات المالية</label>
        <textarea name="financial_indicators" id="financial_indicators" class="form-control">{{ old('financial_indicators', $investmentOpportunity->financial_indicators) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">تحديث الفرصة الاستثمارية</button>
    <a href="{{ route('investment-opportunities.index') }}" class="btn btn-secondary">إلغاء</a>
</form>

@endsection
