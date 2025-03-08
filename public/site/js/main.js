(function ($) {
    "use strict";

    // Initiate the wowjs
    new WOW().init();

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });

    // Team carousel
    $(".team-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: false,
        dots: false,
        loop: false,
        margin: 50,
        nav: true,
        navText: [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    // Testimonial carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        center: true,
        dots: true,
        loop: true,
        margin: 0,
        nav: true,
        navText: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            }
        }
    });

    // Fact Counter
    $(document).ready(function () {
        $('.counter-value').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'easeInQuad',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

        // Update dropdown icon
        const selectElement = document.getElementById('sector');
        if (selectElement) {
            selectElement.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const iconClass = selectedOption.getAttribute('value');
                selectElement.style.background = `url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/svgs/solid/${iconClass}.svg') no-repeat`;
                selectElement.style.backgroundSize = '24px 24px';
                selectElement.style.backgroundPosition = 'right center';
                selectElement.style.paddingRight = '30px';
            });

            const initialIconClass = selectElement.options[selectElement.selectedIndex].getAttribute('value');
            if (initialIconClass) {
                selectElement.style.background = `url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/svgs/solid/${initialIconClass}.svg') no-repeat`;
                selectElement.style.backgroundSize = '24px 24px';
                selectElement.style.backgroundPosition = 'right center';
                selectElement.style.paddingRight = '30px';
            }
        }

        // Update selected icon in dropdown
        const dropdownItems = document.querySelectorAll('.dropdown-menu .dropdown-item');
        const selectedIcon = document.getElementById('selected-icon');
        const selectedIconText = document.getElementById('selected-icon-text');
        const iconButton = document.getElementById('dropdownMenuButton');

        dropdownItems.forEach(item => {
            item.addEventListener('click', function () {
                const iconClass = this.parentNode.getAttribute('data-icon');
                const iconText = this.parentNode.getAttribute('data-text');

                if (selectedIcon && selectedIconText && iconButton) {
                    selectedIcon.value = iconClass;
                    selectedIconText.value = iconText;
                    iconButton.querySelector('i').className = `fas ${iconClass}`;
                    iconButton.querySelector('span').textContent = iconText;
                }
            });
        });
    });

    document.body.style.margin = '0';
    document.body.style.padding = '0';
    document.body.style.overflowX = 'hidden';

    document.addEventListener('DOMContentLoaded', function () {
        var carousel = document.querySelector('#carouselId');
        if (carousel) {
            var bsCarousel = new bootstrap.Carousel(carousel, {
                interval: 5000 // تغيير الشرائح كل 5 ثوانٍ
            });
        }

        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: false
        });
    });

})(jQuery);
