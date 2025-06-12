// Import jQuery and make it globally available
import jquery from 'jquery';
window.$ = window.jQuery = jquery;

// Import Core Libraries that depend on jQuery
import 'bootstrap';
import 'admin-lte';

// The AdminLTE package itself should handle the initialization of its plugins like PushMenu and Treeview.
// By simply importing the main 'admin-lte' package, we are running its main script.
// We can add a console log to confirm that our custom script is running after the libraries are loaded.

console.log('Custom admin.js script loaded successfully. jQuery is globally available, and AdminLTE should be initialized.');

document.addEventListener('DOMContentLoaded', function () {
    function closeSidebarOnMobile() {
        if (window.innerWidth <= 991) {
            document.body.classList.remove('sidebar-open');
            document.body.classList.add('sidebar-collapse');
        }
    }
    // عند تغيير حجم الشاشة
    window.addEventListener('resize', closeSidebarOnMobile);
    // عند تحميل الصفحة
    closeSidebarOnMobile();
    // عند الضغط على overlay
    var overlay = document.getElementById('sidebar-overlay');
    if (overlay) {
        overlay.addEventListener('click', function () {
            document.body.classList.remove('sidebar-open');
            document.body.classList.add('sidebar-collapse');
        });
    }
    // عند الضغط على زر القائمة
    var menuBtn = document.querySelector('[data-widget="pushmenu"]');
    if (menuBtn) {
        menuBtn.addEventListener('click', function (e) {
            e.preventDefault();
            if (window.innerWidth <= 991) {
                if (document.body.classList.contains('sidebar-open')) {
                    document.body.classList.remove('sidebar-open');
                    document.body.classList.add('sidebar-collapse');
                } else {
                    document.body.classList.add('sidebar-open');
                    document.body.classList.remove('sidebar-collapse');
                }
            }
        });
    }
});
