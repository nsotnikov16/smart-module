<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог тест");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "1",
		"TEMPLATE_THEME" => "black",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => array(
		),
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"SIDEBAR_SECTION_SHOW" => "N",
		"SIDEBAR_DETAIL_SHOW" => "N",
		"SIDEBAR_PATH" => "",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/catalog-test/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"SET_LAST_MODIFIED" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "arrFilter",
		"FILTER_VIEW_MODE" => "HORIZONTAL",
		"FILTER_HIDE_ON_MOBILE" => "N",
		"INSTANT_RELOAD" => "N",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "N",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"USE_PRODUCT_QUANTITY" => "N",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRODUCT_PROPERTIES" => array(
		),
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_NO_WORD_LOGIC" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "N",
		"SEARCH_CHECK_DATES" => "N",
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "1",
		"SECTIONS_VIEW_MODE" => "LINE",
		"SECTIONS_SHOW_PARENT_NAME" => "Y",
		"PAGE_ELEMENT_COUNT" => "30",
		"LINE_ELEMENT_COUNT" => "3",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER2" => "desc",
		"LIST_PROPERTY_CODE" => array(
			0 => "INTERIOR",
			1 => "BLOCKS",
			2 => "ROOMS",
			3 => "PERSONS",
			4 => "MATERIAL",
			5 => "MODIFICATION",
			6 => "SQUARE",
			7 => "SIZE",
			8 => "TYPE",
			9 => "PRICE",
			10 => "FLOOR",
			11 => "PHOTOS",
			12 => "",
		),
		"LIST_PROPERTY_CODE_MOBILE" => array(
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons,compare",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_SHOW_SLIDER" => "N",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "INTERIOR",
			1 => "BLOCKS",
			2 => "ROOMS",
			3 => "PERSONS",
			4 => "MATERIAL",
			5 => "MODIFICATION",
			6 => "SQUARE",
			7 => "SIZE",
			8 => "TYPE",
			9 => "PRICE",
			10 => "FLOOR",
			11 => "PHOTOS",
			12 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_SET_CANONICAL_URL" => "Y",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"SHOW_DEACTIVATED" => "N",
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(
		),
		"DETAIL_USE_VOTE_RATING" => "N",
		"DETAIL_USE_COMMENTS" => "N",
		"DETAIL_BRAND_USE" => "N",
		"DETAIL_DISPLAY_NAME" => "Y",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "POPUP",
		),
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_SHOW_POPULAR" => "N",
		"DETAIL_SHOW_VIEWED" => "N",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_STORE" => "N",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"PAGER_TEMPLATE" => "smart-module",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Каталог",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "Y",
		"LAZY_LOAD" => "N",
		"LOAD_ON_SCROLL" => "N",
		"SET_STATUS_404" => "Y",
		"SHOW_404" => "Y",
		"FILE_404" => "",
		"COMPATIBLE_MODE" => "N",
		"USE_ELEMENT_COUNTER" => "N",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"PAGER_BASE_LINK" => "",
		"PAGER_PARAMS_NAME" => "arrPager",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare.php?action=#ACTION_CODE#",
			"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
		),
		"VARIABLE_ALIASES" => array(
			"compare" => array(
				"ACTION_CODE" => "action",
			),
		)
	),
	false
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>