<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
</div>
<footer class="footer-wrapper">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap align-items-start">
                    <div class="footer-column">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/footer/logo.php"
                            )
                        );
                        ?>

                        <a href="tel:#WF_PHONES#" class="phone #WF_PHONE_REPLACE#">#WF_PHONES#</a>
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
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "footer",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "bottom_inner",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "bottom",
                                "USE_EXT" => "Y"
                            )
                        ); ?>
                    </div>

                    <div class="footer-column">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "footer",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "bottom_inner",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(
                                    0 => "",
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "bottom2",
                                "USE_EXT" => "Y"
                            )
                        ); ?>
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
                        <a href="#POLICY_URL#" class="color-grey link-document d-inline" target="_blank">Политика
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
                    <div class="link-developer">
                        <span>Создание и продвижение сайта</span>
                        <a rel="nofollow" target="blank" href="https://olever.ru">
                            <img src="<?= SITE_TEMPLATE_PATH ?>/assets/img/logo-developer.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?
$APPLICATION->IncludeComponent(
    "custom:form",
    "callback",
);
?>

<? $APPLICATION->IncludeComponent(
    "webfly:cities.popup",
    "cities",
    array(
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "COMPOSITE_FRAME_MODE" => "A",
        "COMPOSITE_FRAME_TYPE" => "AUTO",
        "WF_FAVORITE" => "WF_CITY_ROD",
        "WF_JQUERY" => "Y"
    )
); ?>
<? $APPLICATION->IncludeComponent(
    "webfly:meta.edit",
    ".default",
    array(
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "WF_JQUERY" => "N"
    ),
    false
); ?>

<? include __DIR__ . '/include/footer/scripts.php'; ?>
<? include __DIR__ . '/include/body/end.php'; ?>
</body>

</html>