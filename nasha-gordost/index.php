<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Наша гордость");
?>
    <section class="page page-pride page-manufacture">
        <div class="container">
            <div class="row">
                #BREADCRUMB#
                <div class="col-12">
                    <h1 class="text-center mb-40">#H1#</h1>
                </div>
                <div class="col-12">
                    <div class="page-manufacture__content">
                        <div class="box-text">
                            <p>
                                Компания «Смарт-модуль» работает на рынке быстровозводимых модульных конструкций с 2016
                                года. За это время мы накопили много отзывов о своей работе. Мы гордимся своими
                                клиентами и
                                обратной связью, которой они нам предоставили.
                            </p>
                            <div class="video-wrapper">
                                <a href="https://youtu.be/njX2bu-_Vw4?si=uDk2H2A2inv2xwxU" class="video-frame"
                                   data-fancybox="video-frame"><img src="<?= ASSETS_PATH ?>/img/pride-preview1.jpg"
                                                                    alt=""
                                                                    loading="lazy"><span class="play-icon"></span></a>
                                <a
                                        href="https://youtu.be/njX2bu-_Vw4?si=uDk2H2A2inv2xwxU" class="video-frame"
                                        data-fancybox="video-frame"><img src="<?= ASSETS_PATH ?>/img/pride-preview2.jpg"
                                                                         alt="" loading="lazy"><span
                                            class="play-icon"></span></a> <a
                                        href="https://youtu.be/njX2bu-_Vw4?si=uDk2H2A2inv2xwxU" class="video-frame"
                                        data-fancybox="video-frame"><img src="<?= ASSETS_PATH ?>/img/pride-preview3.jpg"
                                                                         alt="" loading="lazy"><span
                                            class="play-icon"></span></a> <a
                                        href="https://youtu.be/njX2bu-_Vw4?si=uDk2H2A2inv2xwxU" class="video-frame"
                                        data-fancybox="video-frame"><img src="<?= ASSETS_PATH ?>/img/pride-preview4.jpg"
                                                                         alt="" loading="lazy"><span
                                            class="play-icon"></span></a> <a
                                        href="https://youtu.be/njX2bu-_Vw4?si=uDk2H2A2inv2xwxU" class="video-frame"
                                        data-fancybox="video-frame"><img src="<?= ASSETS_PATH ?>/img/pride-preview3.jpg"
                                                                         alt="" loading="lazy"><span
                                            class="play-icon"></span></a> <a
                                        href="https://youtu.be/njX2bu-_Vw4?si=uDk2H2A2inv2xwxU" class="video-frame"
                                        data-fancybox="video-frame"><img src="<?= ASSETS_PATH ?>/img/pride-preview4.jpg"
                                                                         alt="" loading="lazy"><span
                                            class="play-icon"></span></a>
                            </div>
                            <a href="#" class="btn btn-load-video btn-grey">Показать еще</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"reviews-pride", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "67",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "50",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "AUTHOR_POST",
			1 => "AUTHOR_NAME",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "reviews-pride",
		"TITLE" => "Подзаголовок про текстовые отзывы"
	),
	false
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>