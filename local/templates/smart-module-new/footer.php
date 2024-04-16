<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
</div>
<footer class="footer-wrapper footer-fixed">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap align-items-start">
                    <div class="footer-column">
                        <a href="index.html" class="logo"><img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo-white.png"
                                                               alt="" loading="lazy"/></a>
                        <a href="tel:88122004235" class="phone">8 (812) 200-42-35</a>
                        <div class="schedule">
                            <p>пн-пт: с 9:00 - 18:00</p>
                        </div>
                        <div class="footer-column__description">
                            <p>
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/include/footer/info.php"
                                    )
                                ); ?>
                            </p>
                        </div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/footer/info-link.php"
                            )
                        ); ?>

                    </div>

                    <div class="footer-column">
                        <a href="catalog.html" class="footer-column__title">Каталог</a>
                        <ul class="footer-menu my-ul">
                            <li><a href="category.html">Металлические бытовки</a></li>
                            <li><a href="category.html">Металлические контейнеры</a></li>
                            <li><a href="category.html">Ангары</a></li>
                            <li><a href="category.html">Модульные здания</a></li>
                            <li>
                                <a href="category.html">Переоборудование контейнеров</a>
                            </li>
                            <li><a href="category.html">Модульные станции</a></li>
                            <li><a href="category.html">Торговые павильоны</a></li>
                            <li><a href="category.html">Быстровозводимые здания</a></li>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <a href="services.html" class="footer-column__title">Услуги</a>
                        <ul class="footer-menu my-ul">
                            <li><a href="delivery.html">Доставка</a></li>
                            <li><a href="rent.html">Аренда</a></li>
                        </ul>
                        <a href="projects.html" class="footer-column__title">Проекты</a>
                        <a href="blog.html" class="footer-column__title">Блог</a>
                        <a href="contacts.html" class="footer-column__title">Контакты</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap align-items-center">
                    <div class="copyright">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/footer/copy.php"
                            )
                        ); ?>
                        <a href="/politika-konfidentsialnosti/" class="color-grey link-document d-inline"
                           target="_blank">Политика
                            конфиденциальности</a>
                    </div>
                    <ul class="list-social my-ul">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/footer/vk.php"
                            )
                        ); ?>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/footer/youtube.php"
                            )
                        ); ?>

                    </ul>
                    <div class="link-developer"><span>Создание и продвижение сайта</span>
                        <a rel="nofollow"
                           target="blank"
                           href="https://olever.ru">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo-developer.svg" alt="">
                        </a></div>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>
</html>