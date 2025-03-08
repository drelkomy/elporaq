@extends('site.master2')

@section('content')
<head>
	<style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 10px;
            position: relative;
        }
        
        .background-section {
            position: relative;
            width: 100vw;
            margin-left: calc(-50vw + 50%);
            margin-right: calc(-50vw + 50%);
            height: 250px;
            border: 1px solid #ddd;
        }
        
        .background-section img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .breadcrumb {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-size: 1em;
            line-height: 1.5;
            height: auto;
            display: flex;
            align-items: center;
        }

        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
            margin: 0 5px;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .info-section {
            background-color: #FAFAD2;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 25px;
        }

        .info-section p {
            font-size: 1.3em;
            color: #555;
            text-align: center;
            margin-bottom: 15px;
        }

        .info-section:hover {
            color: blue;
        }

        /* تعديلات على النموذج لجعله مرنًا */
        .form-group {
            width: 100%; /* عرض الحقول بالكامل */
        }

        @media (min-width: 768px) {
            .d-flex .form-group {
                width: 48%; /* عرض الحقول المتجاورة بشكل مناسب على الشاشات الكبيرة */
            }
        }
	</style>
</head>

<div class="container">
    <!-- القسم مع الصورة كخلفية -->
    <section class="background-section">
        <img src="{{ asset('images/pages/14.png') }}" alt="Background Image">
        <div class="breadcrumb">
            <a class="m-3" href="{{ url('/') }}">الصفحة الرئيسية</a> &gt;
            <a class="m-3" href="{{ url('/app') }}">احجز موعد</a>
        </div>
    </section>

    <!-- القسم الذي يحتوي على النص -->
    <section class="info-section">
        <p>شكرا لتواصلكم مع شركة البراق للاستشارات الاقتصادية ودراسات الجدوى قم بملء النموذج لحجز موعد مع نخبة من الاستشاريين وخبراء اعداد دراسات الجدوي</p>
    </section>

<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow p-4">
        <form action="{{ route('appointments.store') }}" method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="name">اسمك:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="أدخل اسمك" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">بريدك الإلكتروني:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="أدخل بريدك الإلكتروني" required>
            </div>
            <div class="form-group mb-3">
                <label for="tel">رقم الجوال:</label>
                <input type="tel" id="tel" name="tel" class="form-control text-center" placeholder="WhatsApp أدخل رقم  الهاتف" required>
            </div>
            <div class="d-flex justify-content-between flex-wrap">
                <div class="form-group m-5">
                    <label for="service">اختر الخدمة:</label>
                    <select id="service" name="service" class="form-control" required>
                        <option value="دراسة جدوى">دراسة جدوى</option>
                        <option value="استشارة اقتصادية">استشارة اقتصادية</option>
                        <option value="خدمات أخرى">خدمات أخرى</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">اختر اليوم:</label>
                    <input type="text" id="date" name="date" class="form-control" required>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="country">اختر الدولة:</label>
                <select id="country" name="country" class="form-control" required>
                    <option value="">اختر الدولة</option>
                       <option value="">اختر الدولة</option>
    <option value="مصر">مصر</option>
    <option value="السعودية">السعودية</option>
    <option value="الإمارات">الإمارات</option>
    <option value="الكويت">الكويت</option>
    <option value="البحرين">البحرين</option>
    <option value="الأردن">الأردن</option>
    <option value="لبنان">لبنان</option>
    <option value="عمان">عمان</option>
    <option value="قطر">قطر</option>
    <option value="العراق">العراق</option>
    <option value="فلسطين">فلسطين</option>
    <option value="ليبيا">ليبيا</option>
    <option value="المغرب">المغرب</option>
    <option value="السودان">السودان</option>
    <option value="اليمن">اليمن</option>
    <option value="سوريا">سوريا</option>
    <option value="الجزائر">الجزائر</option>
 <option value="اخري">اخري</option>
                    <!-- المزيد من الخيارات -->
                </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="احجز الآن">
            </div>
        </form>
    </div>
</div>

<!-- إضافة سكربت Flatpickr وتهيئة الكليندر -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // تطبيق Flatpickr على حقل التاريخ
    flatpickr("#date", {
        dateFormat: "Y-m-d",  // صيغة التاريخ
        minDate: "today",     // تعيين الحد الأدنى للتاريخ اليوم الحالي
        locale: "ar",         // لغة عربية
        enableTime: false,    // بدون تحديد الوقت
    });
</script>
@endsection
