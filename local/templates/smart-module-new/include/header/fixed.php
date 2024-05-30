<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="header-fixed">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header-top__wrapper">
                    <div class="dropdown dropdown-burger">
                        <a href="#" class="btn-burger dropdown-toggle" data-bs-toggle="dropdown">
                            <svg class="svg-icon">
                                <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/img/sprite.svg#burger"></use>
                            </svg>
                        </a>

                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "header-fixed-catalog",
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
                    </div>
                    <a href="<?= SITE_DIR ?>" class="logo">
                        <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo-sm.png" alt="Logo sm" loading="lazy" />
                    </a>
                    <div class="header-box">
                        <div class="location-box header-box-phone">
                            <a href="javascript:void(0)" class="btn-location" data-bs-toggle="modal" data-bs-target="#locationModal" onClick="start_map()">#WF_CITY_NAME#</a>
                        </div>
                        <a href="tel:#WF_PHONES#" class="phone">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span class="#WF_PHONE_REPLACE#">#WF_PHONES#</span></a>
                    </div>

                    <nav class="nav nav-menu">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "header",
                            array(
                                "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                                "MENU_CACHE_TYPE" => "A",    // Тип кеширования
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
                                "MENU_THEME" => "site",
                                "EXCLUDED" => ['/catalog/', '/tekhnologiya/', '/otrasli/'],
                            ),
                            false
                        ); ?>
                    </nav>

                    <a href="#" class="btn btn-accent btn-callback" data-bs-toggle="modal" data-bs-target="#callbackModal">Получить консультацию</a>
                    <div class="btn-search">
                        <svg class="svg-icon svg-icon-search">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/img/sprite.svg#search"></use>
                        </svg>
                        <svg class="svg-icon svg-icon-close">
                            <use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/img/sprite.svg#close-icon"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? // Данный блок дублируется в вёрстке, поэтому сделаем копирование через JS.
    // см. local/templates/smart-module-new/components/bitrix/search.title/search/script.js  
    ?>
    <div class="search-wrapper" data-search-paste>

    </div>
</div>