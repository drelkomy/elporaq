<head>
    <style>
    
.contact-icons {
	     margin-left: 5px;
            position: fixed;
            left: 25px; /* تحريك الأيقونات 25 بكسل إلى اليمين */
            top: 70%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            z-index: 9999; /* تأكد من أن الأيقونات تظهر فوق جميع العناصر */
}

        .contact-icons a {
            background-color: #25D366; /* لون الواتساب */
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .contact-icons a.email {
            background-color: #0072C6; /* لون الإيميل */
        }

        .contact-icons a:hover {
            opacity: 0.8;
        }

        .contact-icons i {
            font-size: 24px;
        }

   .contact-icons a.appointment {
            background-color:#FFAB00; /* لون زر حجز الموعد */
        }
    </style>
    <!-- رابط خط أيقونات Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<div class="contact-icons">
    <a href="https://wa.me/201080222145" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="mailto:support@elporaq.com" class="email">
        <i class="fas fa-envelope"></i>
    </a>
 <a href="/app" target="_blank" class="appointment">
            <i class="fas fa-calendar-alt"></i>
        </a>
</div>


