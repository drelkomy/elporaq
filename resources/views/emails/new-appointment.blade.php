<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>طلب اتصال جديد</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            padding: 20px;
            direction: rtl;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            border-top: 4px solid #FFAB00;
        }
        h1 {
            color: #FFAB00;
            margin-bottom: 20px;
        }
        .details {
            background: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #eee;
        }
        .detail-item {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f2f2f2;
        }
        .detail-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .label {
            font-weight: bold;
            color: #555;
            margin-left: 5px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 0.8em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>طلب اتصال جديد</h1>
        
        <div class="details">
            <div class="detail-item">
                <span class="label">الاسم:</span> {{ $name }}
            </div>
            <div class="detail-item">
                <span class="label">البريد الإلكتروني:</span> {{ $email }}
            </div>
            <div class="detail-item">
                <span class="label">رقم الجوال:</span> {{ $tel }}
            </div>
            <div class="detail-item">
                <span class="label">نوع الخدمة:</span> {{ $service }}
            </div>
            <div class="detail-item">
                <span class="label">الدولة:</span> {{ $country }}
            </div>
            <div class="detail-item">
                <span class="label">التاريخ المطلوب:</span> {{ $date }}
            </div>
        </div>
        
        <p>يرجى الرد على هذا الطلب من خلال لوحة التحكم.</p>
        
        <div class="footer">
            <p>شركة البراق للاستشارات الاقتصادية ودراسات الجدوى</p>
        </div>
    </div>
</body>
</html> 