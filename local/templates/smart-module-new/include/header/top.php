<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="header-top__wrapper">
                    <a href="#" class="btn-burger-mobile">
                        <svg class="ham hamRotate ham8 mobile_menu_rotate" viewBox="0 0 100 100" width="50">
                            <path class="line_svg top_svg" d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
                            <path class="line_svg middle_svg" d="m 30,50 h 40"></path>
                            <path class="line_svg bottom_svg" d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
                        </svg>
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
                            <a href="javascript:void(0)" class="btn-location" data-bs-toggle="modal" data-bs-target="#locationModal" onClick="start_map()">#WF_CITY_NAME#</a>
                        </div>
                        <a href="tel:#WF_PHONES#" class="phone">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span class="#WF_PHONE_REPLACE#">#WF_PHONES#</span>
                        </a>
                    </div>
                    <div class="header-box header-box-mail">
                        <span>Email поддержка:</span>
                        <a href="mailto:#WF_EMAIL#" class="mail">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            <span class="#WF_EMAIL_REPLACE#">#WF_EMAIL#</span>
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

                    <a href="#" class="btn btn-accent btn-callback" data-bs-toggle="modal" data-bs-target="#callbackModal">Получить консультацию</a>
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

<? $APPLICATION->IncludeComponent(
    "bitrix:search.title",
    "search",
    array(
        "CATEGORY_0" => array("iblock_catalog"),
        "CATEGORY_0_TITLE" => "",
        "CATEGORY_0_iblock_catalog" => array(
            0 => "1",
        ),
        "CHECK_DATES" => "N",
        "CONTAINER_ID" => "title-search",
        "INPUT_ID" => "title-search-input",
        "NUM_CATEGORIES" => "1",
        "ORDER" => "date",
        "PAGE" => "#SITE_DIR#search/index.php",
        "SHOW_INPUT" => "Y",
        "SHOW_OTHERS" => "N",
        "TOP_COUNT" => "20",
        "USE_LANGUAGE_GUESS" => "Y",
        "COMPONENT_TEMPLATE" => "search",
    ),
    false
); ?>