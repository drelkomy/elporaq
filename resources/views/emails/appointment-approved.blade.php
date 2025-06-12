<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تمت الموافقة على طلبك</title>
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
            border-top: 4px solid #28a745;
        }
        h1 {
            color: #28a745;
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
        .message {
            padding: 15px;
            background-color: #e8f5e9;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>تمت الموافقة على طلبك</h1>
        
        <div class="message">
            <p>عزيزي {{ $name }}،</p>
            <p>يسعدنا إبلاغك بأنه قد تمت الموافقة على طلبك للحصول على خدماتنا. سيتم التواصل معك قريباً لترتيب التفاصيل.</p>
        </div>
        
        <div class="details">
            <div class="detail-item">
                <span class="label">نوع الخدمة:</span> {{ $service }}
            </div>
            <div class="detail-item">
                <span class="label">التاريخ المطلوب:</span> {{ $date }}
            </div>
        </div>
        
        <p>يمكنك التواصل معنا عبر البريد الإلكتروني أو الهاتف في حال وجود أي استفسارات.</p>
        
        <div class="footer">
            <p>شكراً لتعاملك مع شركة البراق للاستشارات الاقتصادية ودراسات الجدوى</p>
        </div>
    </div>
</body>
</html> 