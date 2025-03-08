@extends('admin.layouts')

@section('content')
<h1>تعديل فئة الاستثمار</h1>
<form action="{{ route('investment-categories.update', $investmentCategory) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">اسم الفئة</label>
        <br>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $investmentCategory->name) }}">
        <br>
        
        <label for="sector">اختر الايقونة</label>
        <div id="icon-selection" class="icon-selection">
            <!-- قائمة الأيقونات -->
            <div class="icon" data-icon="fa-hospital">
                <i class="fas fa-hospital"></i>
                <p>مستشفى</p>
            </div>
            <div class="icon" data-icon="fa-store">
                <i class="fas fa-store"></i>
                <p>متجر</p>
            </div>
            <div class="icon" data-icon="fa-seedling">
                <i class="fas fa-seedling"></i>
                <p>نباتات</p>
            </div>
            <div class="icon" data-icon="fa-paw">
                <i class="fas fa-paw"></i>
                <p>حيواني</p>
            </div>
            <div class="icon" data-icon="fa-industry">
                <i class="fas fa-industry"></i>
                <p>صناعي</p>
            </div>
            <div class="icon" data-icon="fa-leaf">
                <i class="fas fa-leaf"></i>
                <p>بيئي</p>
            </div>
            <div class="icon" data-icon="fa-apple-alt">
                <i class="fas fa-apple-alt"></i>
                <p>غذائي</p>
            </div>
            <div class="icon" data-icon="fa-graduation-cap">
                <i class="fas fa-graduation-cap"></i>
                <p>تعليمي</p>
            </div>
            <div class="icon" data-icon="fa-theater-masks">
                <i class="fas fa-theater-masks"></i>
                <p>ترفيهي</p>
            </div>
            <div class="icon" data-icon="fa-sun">
                <i class="fas fa-sun"></i>
                <p>سياحي</p>
            </div>
            <div class="icon" data-icon="fa-shuttle-van">
                <i class="fas fa-shuttle-van"></i>
                <p>نقل</p>
            </div>
            <div class="icon" data-icon="fa-recycle">
                <i class="fas fa-recycle"></i>
                <p>إعادة تدوير</p>
            </div>
            <div class="icon" data-icon="fa-laptop-code">
                <i class="fas fa-laptop-code"></i>
                <p>تكنولوجي</p>
            </div>
            <div class="icon" data-icon="fa-calendar-day">
                <i class="fas fa-calendar-day"></i>
                <p>تقويم</p>
            </div>
            <div class="icon" data-icon="fa-cogs">
                <i class="fas fa-cogs"></i>
                <p>إعدادات</p>
            </div>
            <div class="icon" data-icon="fa-truck">
                <i class="fas fa-truck"></i>
                <p>شاحنة</p>
            </div>
            <div class="icon" data-icon="fa-globe">
                <i class="fas fa-globe"></i>
                <p>عالمي</p>
            </div>
            <div class="icon" data-icon="fa-lightbulb">
                <i class="fas fa-lightbulb"></i>
                <p>إضاءة</p>
            </div>
            <div class="icon" data-icon="fa-wrench">
                <i class="fas fa-wrench"></i>
                <p>أداة</p>
            </div>
            <div class="icon" data-icon="fa-music">
                <i class="fas fa-music"></i>
                <p>موسيقى</p>
            </div>
            <div class="icon" data-icon="fa-video">
                <i class="fas fa-video"></i>
                <p>فيديو</p>
            </div>
            <div class="icon" data-icon="fa-camera">
                <i class="fas fa-camera"></i>
                <p>كاميرا</p>
            </div>
            <div class="icon" data-icon="fa-paint-brush">
                <i class="fas fa-paint-brush"></i>
                <p>رسم</p>
            </div>
            <div class="icon" data-icon="fa-dumbbell">
                <i class="fas fa-dumbbell"></i>
                <p>لياقة</p>
            </div>
        </div>

        <input type="hidden" id="selected-icon" name="sector" value="{{ old('sector', $investmentCategory->sector) }}">
    </div>

    <button type="submit" class="btn btn-primary">تحديث</button>
</form>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    const sectorInput = document.getElementById('sector');

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            // Update the selected value
            sectorInput.value = this.getAttribute('data-icon');
            // Update the button text
            const button = document.getElementById('dropdownMenuButton');
            button.innerHTML = this.innerHTML;
            button.appendChild(document.createElement('span')); // Fix for dropdown toggle style issue
        });
    });
});
</script>

@endsection
