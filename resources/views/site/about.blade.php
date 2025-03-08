<head>
    <style>
        h3 {
            font-weight: bold;
            letter-spacing: 1px;
        }
        
        p {
            line-height: 1.8;
            font-size: 1.1rem;
        }
        
        .container-fluid {
            background: transparent; /* إزالة الخلفية */
        }
        
        .video {
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2); /* إضافة ظل للفيديو */
            border-radius: 10px; /* تقويس أطراف الفيديو */
        }
        
        .video iframe {
            border-radius: 10px;
        }
        
        .wow {
            transition: all 0.5s ease-in-out;
        }
        
        .wow:hover {
            transform: scale(1.02); /* تكبير بسيط عند التحويم */
        }
        
    </style>

</head>
<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <!-- قسم الفيديو -->
            <div class="col-lg-5 wow fadeIn" data-wow-delay=".3s">
                <div class="video">
                    <!-- تضمين الفيديو مباشرة في الصفحة -->
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.youtube.com/embed/3kRpUukHDRg?si=3Aq7Eg0P0Iik-Vuh" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <!-- قسم النص -->
            <div class="col-lg-7 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".5s">
                <h3 class="mb-4 text-center" style="font-family: 'Cairo', sans-serif; color: #124076;">
                    شركة البراق للاستشارات الاقتصادية و دراسات الجدوي
                </h3>
                <p class="text-center" style="font-family: 'Cairo', sans-serif; color: #555;">
                    هي بيت خبرة عالمي بخبرات عربية، متخصصة في تقديم خدمات الاستشارات الاقتصادية والإدارية والحلول المالية وإعداد دراسات الجدوى الاقتصادية وخطط الأعمال للأفراد والجهات المختلفة بكافة القطاعات، باحترافية عالية مُصممة خصيصًا لتلبية الاحتياجات المتنوعة للمستثمرين ورواد الأعمال العرب.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->
