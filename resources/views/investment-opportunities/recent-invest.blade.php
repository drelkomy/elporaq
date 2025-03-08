<head>
    <style>
        .owl-carousel .item {
            margin: 15px;
        }
    
        .owl-carousel .card {
            transition: transform 0.3s ease;
        }
    
        .owl-carousel .card:hover {
            transform: scale(1.05);
        }
    
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    
        .overlay:hover {
            opacity: 1;
        }

        .return-percentage {
            color: #fff;
            font-weight: bold;
        }

        .card-body {
            border-radius: 0 0 10px 10px;
            background-color: rgb(233, 233, 233);
        }

        .card-title {
            display: inline-block; /* عرض العنصر ككتلة مضمنة بحيث يتسع النص */
            border-radius: 5px; /* تعيين حواف دائرية للعنصر */
            white-space: nowrap; /* منع التفاف النص إلى السطر التالي */
            overflow: hidden; /* إخفاء النص الذي يتجاوز الحاوية */
            text-overflow: ellipsis; /* عرض ... عند تجاوز النص لحدود العنصر */
            font-family: 'Cairo', sans-serif; /* تعيين نوع الخط */
            margin: 0; /* إزالة المسافة الخارجية */
	
	        }
	.card-text {
            font-size: .03rem; /* حجم نص البطاقة */
            color: #000000;
        }

    </style>
</head>
<body>
    <div class="container-fluid py-5 mb-5 team" dir="ltr">
        <div class="container">
            <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
                <h1 style="font-family: 'Cairo';color:#FFAB00;text-bolder;">فرص استثمارية</h1>
            </div>
            <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
                @if($opportunities->count())
                    @foreach($opportunities as $opportunity)
                        <div class="item">
                            <div class="card rounded shadow-sm border-0 h-100 position-relative">
                                <div class="position-relative">
                                    @if($opportunity->image)
                                        <img src="{{ asset('images/invest/' . $opportunity->image) }}" class="card-img-top rounded-top" alt="صورة الفرصة" style="height: 300px; object-fit: cover;">
                                    @else
                                        <img src="https://via.placeholder.com/300x200?text=No+Image" class="card-img-top rounded-top" alt="صورة الفرصة" style="height: 300px; object-fit: cover;">
                                    @endif
                                    <!-- نسبة العائد -->
                                    <div class="return-percentage position-absolute top-0 end-0 m-3 p-2 rounded" style="background-color: #f0ab2b;">
                                       {{ $opportunity->financial_indicators }} :نسبة العائد
                                    </div>

                                    <!-- الأزرار عند التمرير -->
                                    <div class="overlay">
                                        <a href="{{ route('investment-opportunities.show', $opportunity->id) }}" class="btn btn-info btn-sm mx-2">عرض التفاصيل</a>
                                        <a href="{{ route('site.app') }}" class="btn btn-primary btn-sm mx-2">طلب الخدمة</a>
                                    </div>
                                </div>
                                <!-- العنوان أسفل الصورة -->
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                        {{ $opportunity->title }}
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
