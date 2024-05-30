<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav nav-menu">
                    <div class="location-box d-flex d-md-none">
                        <a href="javascript:void(0)" class="btn-location" data-bs-toggle="modal"
                           data-bs-target="#locationModal" onClick="start_map()">#WF_CITY_NAME#</a>
                    </div>

                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "header",
                        array(
                            "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                            "MENU_CACHE_TYPE" => "N",    // Тип кеширования (отключаем для корректной работы поля раздела UF_CURRENT_TOP_MENU)
                            "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                            "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                            "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                            "MAX_LEVEL" => "2",    // Уровень вложенности меню
                            "CHILD_MENU_TYPE" => "top_inner",    // Тип меню для остальных уровней
                            "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                            "DELAY" => "N",    // Откладывать выполнение шаблона меню
                            "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                            "COMPOSITE_FRAME_MODE" => "A",    // Голосование шаблона компонента по умолчанию
                            "COMPOSITE_FRAME_TYPE" => "AUTO",    // Содержимое компонента
                            "MENU_THEME" => "site"
                        ),
                        false
                    ); ?>

                    <a href="tel:#WF_PHONES#" class="phone d-flex d-md-none #WF_PHONE_REPLACE#">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        #WF_PHONES#
                    </a>
                    <a href="#" class="btn btn-accent btn-callback d-flex d-md-none" data-bs-toggle="modal"
                       data-bs-target="#callbackModal">Получить
                        консультацию</a>
                    <div class="btn-search d-none d-md-flex">
                        <svg class="svg-icon svg-icon-search">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/img/sprite.svg#search"></use>
                        </svg>
                        <svg class="svg-icon svg-icon-close">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/img/sprite.svg#close-icon"></use>
                        </svg>
                    </div>
                    <a href="mailto:#WF_EMAIL#" class="mail d-block d-md-none">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <span class="#WF_EMAIL_REPLACE#">#WF_EMAIL#</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>

</div>
