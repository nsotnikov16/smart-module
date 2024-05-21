<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
if (CModule::IncludeModule('iblock')) $otrasli_iblock = \CIBlock::GetList([], ['CODE' => 'otrasli'], false)->Fetch();

$APPLICATION->SetTitle(""); ?>

<? $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"otrasli-detail",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
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
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
		"ELEMENT_ID" => "",
		"FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_TEXT",
			3 => "DETAIL_PICTURE",
			4 => "",
		),
		"FILE_404" => "",
		"IBLOCK_ID" => $otrasli_iblock['ID'],
		"IBLOCK_TYPE" => "content",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => "BUTTON",
			1 => "SUBTITLE",
			2 => "ADVANTAGES",
			3 => "ADVANTAGES_IMG",
			4 => "PRODUCTS"
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "otrasli-detail"
	),
	false
); ?>
<?
$APPLICATION->IncludeComponent(
	"custom:form",
	"questions",
);
?>

<?
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"slider",
	array(
		"IBLOCK_TYPE" => 'catalog',
		"IBLOCK_ID" => 1,
		"ELEMENT_SORT_FIELD" => 'sort',
		"ELEMENT_SORT_ORDER" => 'asc',
		"ELEMENT_SORT_FIELD2" => 'shows',
		"ELEMENT_SORT_ORDER2" => 'asc',
		"PROPERTY_CODE" => [
			'INTERIOR',
			'BLOCKS',
			'ROOMS',
			'PERSONS',
			'MATERIAL',
			'MODIFICATION',
			'SQUARE',
			'SIZE',
			'TYPE',
			'FLOOR'
		],
		"META_KEYWORDS" => '-',
		"META_DESCRIPTION" => '-',
		"SET_BROWSER_TITLE" => 'N',
		"SET_LAST_MODIFIED" => 'Y',
		"INCLUDE_SUBSECTIONS" => 'Y',
		"BASKET_URL" => '/personal/basket.php',
		"ACTION_VARIABLE" => 'action',
		"PRODUCT_ID_VARIABLE" => 'id',
		"SECTION_ID_VARIABLE" => 'SECTION_ID',
		"PRODUCT_QUANTITY_VARIABLE" => 'quantity',
		"PRODUCT_PROPS_VARIABLE" => 'prop',
		"FILTER_NAME" => 'otrasliFilter',
		"CACHE_TYPE" => 'A',
		"CACHE_TIME" => '36000000',
		"CACHE_FILTER" => 'N',
		"CACHE_GROUPS" => 'Y',
		"SET_TITLE" => 'N',
		"MESSAGE_404" => '',
		"SET_STATUS_404" => '',
		"SHOW_404" => 'N',
		"FILE_404" => '',
		"DISPLAY_COMPARE" => 'N',
		"PAGE_ELEMENT_COUNT" => '12',
		"LINE_ELEMENT_COUNT" => '3',
		"PRICE_CODE" => [],
		"USE_PRICE_COUNT" => 'N',
		"SHOW_PRICE_COUNT" => '1',
		"PRICE_VAT_INCLUDE" => 'N',
		"USE_PRODUCT_QUANTITY" => 'N',
		"ADD_PROPERTIES_TO_BASKET" => 'N',
		"PARTIAL_PRODUCT_PROPERTIES" => 'N',
		"PRODUCT_PROPERTIES" => [],
		"DISPLAY_TOP_PAGER" => 'N',
		"DISPLAY_BOTTOM_PAGER" => 'N',
		"PAGER_TITLE" => '',
		"PAGER_SHOW_ALWAYS" => 'N',
		"PAGER_TEMPLATE" => '',
		"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
		"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
		"USE_MAIN_ELEMENT_SECTION" => 'Y',
		"ADD_SECTIONS_CHAIN" => "N",
		'ADD_TO_BASKET_ACTION' => '',
		'TITLE' => 'Это может вам понравиться'
	),
); ?>
<section class="recommended-products p-100">
	<div class="container">
		<? $APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => '/include/content/order-block.php',
				"EDIT_TEMPLATE" => "standard.php"
			)
		); ?>
	</div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>