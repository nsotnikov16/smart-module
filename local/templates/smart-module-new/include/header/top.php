<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
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
                            <a href="javascript:void(0)" class="btn-location" data-bs-toggle="modal" data-bs-target="#locationModal" onClick="start_map()">#WF_CITY_NAME#</a>
                        </div>
                        <a href="tel:#WF_PHONES#" class="phone #WF_PHONE_REPLACE#">
                            <i class="fa fa-phone" aria-hidden="true"></i>
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