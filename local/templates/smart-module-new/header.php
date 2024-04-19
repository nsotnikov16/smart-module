<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<html lang="lang="<?= LANGUAGE_ID ?>"">
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <? include __DIR__ . '/include/styles.php'; ?>
    <? include __DIR__ . '/include/scripts.php'; ?>
    <? $APPLICATION->ShowHead(); ?>

</head>
<body>
<? $APPLICATION->ShowPanel() ?>
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="header-top__wrapper">
                        <a href="#" class="btn-burger-mobile">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/header/logo.php"
                            )
                        ); ?>
                        <div class="header-box header-box-phone">
                            <div class="location-box">
                                <a href="#" class="btn-location" data-bs-toggle="modal"
                                   data-bs-target="#locationModal">Санкт-Петербург</a>
                            </div>
                            <a href="tel:#WF_PHONES#" class="phone #WF_PHONE_REPLACE#">
                                <i class="fa fa-phone"
                                   aria-hidden="true"></i>
                                #WF_PHONES#
                            </a>
                        </div>
                        <div class="header-box header-box-mail">
                            <span>Email поддержка:</span>
                            <a href="mailto:#WF_EMAIL#" class="mail #WF_EMAIL_REPLACE#">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                #WF_EMAIL#
                            </a>
                        </div>

                        <ul class="list-social my-ul">
                            <li class="list-social__item">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/include/header/vk.php"
                                    )
                                ); ?>
                            </li>
                            <li class="list-social__item">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/include/header/youtube.php"
                                    )
                                ); ?>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-accent btn-callback" data-bs-toggle="modal"
                           data-bs-target="#callbackModal">Получить консультацию</a>
                        <div class="btn-search d-flex d-md-none">
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
    </div>
    <div class="search-wrapper">
        <div class="search-wrapper-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form method="post" class="form-search">
                            <label>
                                <input type="search" class="search-field" placeholder="" value="" name="search"
                                       autocomplete="off"/>
                            </label>
                            <button class="btn btn-accent search-submit" type="submit">
                                <span>Поиск</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-wrapper-result">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="nav nav-menu">
                        <div class="location-box d-flex d-md-none">
                            <a href="#" class="btn-location" data-bs-toggle="modal"
                               data-bs-target="#locationModal">Санкт-Петербург</a>
                        </div>

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
                        <a href="mailto:#WF_EMAIL#" class="mail d-block d-md-none #WF_EMAIL_REPLACE#">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            #WF_EMAIL#
                        </a>
                    </nav>
                </div>
            </div>
        </div>

    </div>

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
                                    "MENU_THEME" => "site"
                                ),
                                false
                            ); ?>
                        </div>
                        <a href="<?= SITE_DIR ?>" class="logo">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo-sm.png" alt="Logo sm" loading="lazy"/>
                        </a>
                        <div class="header-box">
                            <div class="location-box header-box-phone">
                                <a href="#" class="btn-location" data-bs-toggle="modal"
                                   data-bs-target="#locationModal">Санкт-Петербург</a>
                            </div>
                            <a href="tel:+78129071459" class="phone"><i class="fa fa-phone" aria-hidden="true"></i>8
                                (812)
                                907-14-59</a>
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

                        <a href="#" class="btn btn-accent btn-callback" data-bs-toggle="modal"
                           data-bs-target="#callbackModal">Получить консультацию</a>
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
        <div class="search-wrapper">
            <div class="search-wrapper-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" class="form-search">
                                <label>
                                    <input type="search" class="search-field" placeholder="" value="" name="search"
                                           autocomplete="off"/>
                                </label>
                                <button class="btn btn-accent search-submit" type="submit">
                                    <span>Поиск</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-wrapper-result">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img
                                                src="<?= SITE_TEMPLATE_PATH ?>/assets/img/search-result-img-min.jpg"
                                                alt=""
                                                loading="lazy"/></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img
                                                src="<?= SITE_TEMPLATE_PATH ?>/assets/img/search-result-img-min.jpg"
                                                alt=""
                                                loading="lazy"/></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img
                                                src="<?= SITE_TEMPLATE_PATH ?>/assets/img/search-result-img-min.jpg"
                                                alt=""
                                                loading="lazy"/></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img
                                                src="<?= SITE_TEMPLATE_PATH ?>/assets/img/search-result-img-min.jpg"
                                                alt=""
                                                loading="lazy"/></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper">

    <?
    // Данные хлебные крошки заносятся в переменную. Для вывода используйте макрос #BREADCRUMB#
    $APPLICATION->IncludeComponent(
        "bitrix:breadcrumb",
        "breadcrumb",
        array(
            "COMPONENT_TEMPLATE" => "crumb",
            "START_FROM" => "0",
            "PATH" => "",
            "SITE_ID" => "s1",
            "COMPOSITE_FRAME_MODE" => "A",
            "COMPOSITE_FRAME_TYPE" => "AUTO"
        ),
        false
    ) ?>

