document.addEventListener('DOMContentLoaded', function () {
    // وظيفة لعرض النموذج عند النقر على الزر المناسب
    function setupModalTrigger(modalId) {
        var button = document.querySelector(`button[data-bs-target="#${modalId}"]`);
        if (button) {
            var modal = new bootstrap.Modal(document.getElementById(modalId));
            button.addEventListener('click', function () {
                modal.show();
            });
        }
    }

    // قم بإعداد النماذج التي تحتاجها
    setupModalTrigger('addEmployeeModal');
    // أضف المزيد من النماذج هنا إذا لزم الأمر
    // setupModalTrigger('anotherModalId');
});

// التأكد من أن القائمة الجانبية تعمل بشكل صحيح
$(document).ready(function() {
  // إصلاح مشكلة إخفاء القائمة الجانبية بالكامل
  if ($('.sidebar-mini').length > 0) {
    $('body').addClass('sidebar-open');
  }

  // الكود الخاص بـ Select2
  $('.select2').select2({
      placeholder: "اختر",
      allowClear: true,
      dir: "rtl"
  });
});
