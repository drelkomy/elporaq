@extends('admin.layouts')

@section('content')

<head>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <style>
        #editor {
            height: 500px; /* تغيير الارتفاع حسب الحاجة */
            width: 100%; /* عرض كامل الحاوية */
            border: 1px solid #ccc; /* لتحديد الحافة */
            direction: rtl; /* اتجاه النص لليمين */
            text-align: right; /* محاذاة النص لليمين */
        }

        .ql-editor {
            direction: rtl; /* اتجاه النص لليمين */
            text-align: right; /* محاذاة النص لليمين */
        }
    </style>
</head>

<div class="container">
    <h1>إضافة تدوينة جديدة</h1>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return updateContent()">
        @csrf

        <!-- حقل العنوان -->
        <div class="mb-3">
            <label for="title" class="form-label">عنوان التدوينة</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل المحتوى -->
        <div class="mb-3">
            <label for="content" class="form-label">محتوى التدوينة</label>
            <div id="editor"></div> <!-- محرر Quill -->
            <input type="hidden" name="content" id="content"> <!-- حقل مخفي لتخزين المحتوى من Quill -->
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل اختيار التصنيف -->
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

        <!-- حقل رفع الصورة -->
        <div class="mb-3">
            <label for="image" class="form-label">صورة التدوينة</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل إدخال التاجات -->
        <div class="mb-3">
            <label for="tags" class="form-label">التاجات (افصل بين كل تاج بفاصلة)</label>
            <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ old('tags') }}" placeholder="مثال: Laravel, PHP, Web Development">
            @error('tags')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- زر الإرسال -->
        <button type="submit" class="btn btn-primary">إضافة التدوينة</button>
    </form>
</div>

<script>
    // تهيئة محرر Quill
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, false] }],
                ['bold', 'italic', 'underline'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                ['link', 'image'],
                [{ 'color': [] }], // إضافة خيار اختيار الألوان
                [{ 'align': [] }],
                [{ 'direction': 'rtl' }] // إضافة خيار اتجاه النص لليمين
            ]
        }
    });

    // تعيين محتوى Quill عند تحميل الصفحة إذا كان هناك محتوى سابق
    quill.root.innerHTML = @json(old('content'));

    function updateContent() {
        var content = quill.root.innerHTML;
        document.getElementById('content').value = content;
        return true; // يسمح بإرسال النموذج بعد تحديث الحقل المخفي
    }
</script>

@endsection
