<head>
    <style>
   .counter {
    background-color: rgba(0, 0, 0, 0.1); /* إضافة خلفية شفافة لكل عنصر */
    border-radius: 10px; /* تقويس الأطراف */
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* إضافة ظل */
    transition: transform 0.3s ease-in-out; /* تأثير التحويم */
    text-align: center; /* توسيط النص */
}

.counter:hover {
    transform: scale(1.05); /* تكبير بسيط عند التحويم */
}

.counter-value {
    font-size: 48px; /* حجم الخط لعدد الإحصائية */
    margin-bottom: 10px; /* مسافة بين العدد والنص */
}

h2 {
    font-size: 24px; /* حجم الخط لنص الإحصائية */
    margin-top: 10px; /* مسافة أعلى النص */
}

@media (max-width: 768px) {
    .counter {
        margin-bottom: 20px; /* مسافة بين العناصر في الشاشات الصغيرة */
    }
}

@media (max-width: 576px) {
    .counter-value {
        font-size: 36px; /* تقليل حجم الخط للشاشات الصغيرة */
    }

    h2 {
        font-size: 18px; /* تقليل حجم النص للشاشات الصغيرة */
    }
}
    </style>
</head>
        <!-- Fact Start -->
<div class="container-fluid py-3" style="background-color: #FFAB00;">
    <div class="container">
        <div class="row text-center">
            @foreach($statistics as $statistic)
                <div class="col-lg-3 col-md-6 col-sm-12 wow fadeIn" data-wow-delay=".1s">
                    <div class="counter p-4">
                        <h1 class="text-light counter-value" style="font-family: 'Cairo', sans-serif; font-weight: bold; font-size: 48px;">
                            {{ $statistic->count }}
                        </h1>
                        <h2 class="text-dark" style="font-family: 'Cairo', sans-serif; font-weight: bold; font-size: 24px;">
                            {{ $statistic->statistic_name }}
                        </h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Fact End -->
