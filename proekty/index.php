<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Проекты");

if (CModule::IncludeModule("webfly.seocities") and CModule::IncludeModule("iblock")) {
	$cityID = CSeoCities::getCityId();
	global $cityFilter;
	$cityFilter = array("!ID" => CIBlockElement::SubQuery("ID", array("IBLOCK_ID" => "2", "PROPERTY_NOT_SHOW_IN_CITIES" => $cityID)));
}
?>

<section class="page page-projects">
	<div class="container">
		<div class="row">
			#BREADCRUMB#
			<div class="col-12">
				<h1 class="text-center mb-35">#H1#</h1>
			</div>
		</div>

		<? $APPLICATION->IncludeComponent(
			"bitrix:news",
			"projects",
			array(
				"COMPONENT_TEMPLATE" => "projects",
				"IBLOCK_TYPE" => "content",
				"IBLOCK_ID" => "2",
				"NEWS_COUNT" => "20",
				"USE_SEARCH" => "N",
				"USE_RSS" => "N",
				"USE_RATING" => "N",
				"USE_CATEGORIES" => "N",
				"USE_REVIEW" => "N",
				"USE_FILTER" => "Y",
				"FILTER_NAME" => "cityFilter",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_ORDER1" => "DESC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "ASC",
				"CHECK_DATES" => "Y",
				"SEF_MODE" => "Y",
				"SEF_FOLDER" => "/proekty/",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"CACHE_TYPE" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"SET_LAST_MODIFIED" => "N",
				"SET_TITLE" => "Y",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "Y",
				"ADD_ELEMENT_CHAIN" => "Y",
				"USE_PERMISSIONS" => "N",
				"STRICT_SECTION_CHECK" => "N",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"USE_SHARE" => "N",
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"PREVIEW_TRUNCATE_LEN" => "",
				"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
				"LIST_FIELD_CODE" => array(
					0 => "NAME",
					1 => "PREVIEW_TEXT",
					2 => "DETAIL_PICTURE",
					3 => "DATE_ACTIVE_FROM",
					4 => "ACTIVE_FROM",
					5 => "",
				),
				"LIST_PROPERTY_CODE" => array(
					0 => "NOT_SHOW_IN_CITIES",
					1 => "",
				),
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"DISPLAY_NAME" => "Y",
				"META_KEYWORDS" => "-",
				"META_DESCRIPTION" => "-",
				"BROWSER_TITLE" => "NAME",
				"DETAIL_SET_CANONICAL_URL" => "N",
				"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
				"DETAIL_FIELD_CODE" => array(
					0 => "NAME",
					1 => "PREVIEW_TEXT",
					2 => "DETAIL_TEXT",
					3 => "DETAIL_PICTURE",
					4 => "DATE_ACTIVE_FROM",
					5 => "ACTIVE_FROM",
					6 => "",
				),
				"DETAIL_PROPERTY_CODE" => array(
					0 => "MAP",
					1 => "MORE_PHOTO",
					2 => "SROKI_REALIZACII",
					3 => "OBCHAYA_PLOTHAT",
					4 => "ZAKAZCHIK",
				),
				"DETAIL_DISPLAY_TOP_PAGER" => "N",
				"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
				"DETAIL_PAGER_TITLE" => "Страница",
				"DETAIL_PAGER_TEMPLATE" => "",
				"DETAIL_PAGER_SHOW_ALL" => "N",
				"PAGER_TEMPLATE" => "pagination",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"SET_STATUS_404" => "Y",
				"SHOW_404" => "Y",
				"FILE_404" => "",
				"FILTER_FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"FILTER_PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"MESSAGE_404" => "",
				"SEF_URL_TEMPLATES" => array(
					"news" => "",
					"section" => "#SECTION_CODE#/",
					"detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
				),
				'SECTION_USER_FIELDS' => ['UF_PREVIEW_IMG']
			),
			false
		); ?>
	</div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>