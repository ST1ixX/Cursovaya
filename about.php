<!DOCTYPE html>
<html lang="ru">
<head>
    <?php session_start(); ?>
    <script src="https://api-maps.yandex.ru/2.1/?apikey=20b011ec-7c4a-4ea2-9eae-a8df4f417667&lang=ru_RU"></script>
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Строительная фирма ЮГ-строй инвест</title>
    <script defer src="js/about.js"></script>
    <link rel="shortcut icon" href="/images/main_logo.png" type="image/x-icon">
    <?php include 'include/popup_forms.php'; ?>
</head>
<body id= "index__body">
    <?php require './include/header.php'; ?>
    <div class="index__main">
            <div class="gallery">
                <div class="gallery-container">
                    <img class="gallery-item gallery-item-1" src="order/1.jpg" data-index="1">
                    <img class="gallery-item gallery-item-2" src="order/2.jpeg" data-index="2">
                    <img class="gallery-item gallery-item-3" src="order/3.jpg" data-index="3">
                    <img class="gallery-item gallery-item-4" src="order/4.jpeg" data-index="4">
                    <img class="gallery-item gallery-item-5" src="order/5.jpeg" data-index="5">
                </div>
                <div class="gallery-controls"></div>
            </div>
            <div class="info__container">
                <div class="yan__map" id="map"></div>
                <div class="info">

                Адрес компании: г. Ростов-на-Дону, площадь Гагарина, 1 <br>

                Электронная почта: info@stroyinvestrostov.ru <br>

                Телефон: +7-900-123-45-67
                </div>
            </div> 
        <div class="footer" id="about">
            <div class="footer__aboutUs">
                "СтройИнвестРостов" - это ведущая строительная компания в городе Ростов-на-Дону, специализирующаяся на строительстве жилых и коммерческих объектов высокого качества. <br>
                Мы предоставляем широкий спектр услуг, начиная от проектирования и заканчивая сдачей объекта под ключ.<br>
                Наша миссия: Создание современной, безопасной и функциональной инфраструктуры для улучшения качества жизни наших клиентов.
            </div>
            <div class="footer__projects">
                Строительство жилых домов и коттеджей
                Коммерческие здания и офисные помещения
                Реконструкция и ремонт существующих объектов
                Дизайн интерьера и архитектурное проектирование
            </div>
            <div class="footer__price">
                Опыт и профессионализм: Наша команда состоит из опытных специалистов с многолетним опытом работы в сфере строительства. <br>
                Высокое качество: Мы используем только лучшие материалы и современные технологии для обеспечения высокого качества наших объектов. <br>
                Индивидуальный подход: Мы стремимся к полному удовлетворению потребностей каждого клиента, предлагая индивидуальные решения и гибкие условия сотрудничества.
            </div>
        </div> 
    </div>   
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>