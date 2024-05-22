<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Калькулятор расчета");
?>
<div class="page page-catalog calculate-catalog">
	<div class="container">
		<div class="row">
			#BREADCRUMB#
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<h1>#H1#</h1>
			</div>
		</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:news.detail",
			"calc-module",
			array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_ELEMENT_CHAIN" => "N",
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
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "N",
				"DISPLAY_PICTURE" => "N",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"ELEMENT_CODE" => "",
				"ELEMENT_ID" => "6796",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"IBLOCK_ID" => "62",
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
					0 => "PRICE_ZA_KVADRAT",
					1 => "KOLVO_KV_V_BLOKE",
					2 => "KOLVO_SP_MEST",
					3 => "KOLVO_RABOCH_MEST",
					4 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_CANONICAL_URL" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"STRICT_SECTION_CHECK" => "N",
				"USE_PERMISSIONS" => "N",
				"USE_SHARE" => "N",
				"COMPONENT_TEMPLATE" => "calc",
				"HIDE_TITLE" => "Y"
			),
			false
		); ?>
	</div>
</div>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>