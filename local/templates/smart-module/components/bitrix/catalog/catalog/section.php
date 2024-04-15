<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager;

$this->setFrameMode(true);

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

$showCalc = false;

if ($isFilter) {
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog")) {
		$arCurSection = $obCache->GetVars();
	} elseif ($obCache->StartDataCache()) {
		$arCurSection = array();
		if (Loader::includeModule("iblock")) {
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID", "NAME", "DESCRIPTION", "SECTION_PAGE_URL"));

			if (defined("BX_COMP_MANAGED_CACHE")) {
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_" . $arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			} else {
				if (!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}
?>
<style>
	/*#bx_breadcrumb_0,
	#bx_breadcrumb_1 {
		display: none;
	}

	.breadcrumb .path-link:nth-child(3) {
		font-size: 0;
	}

	.breadcrumb .path-link:nth-child(3) span,
	.breadcrumb .path-link:nth-child(3) a {
		font-size: 18px;
	}*/
</style>
<? if ($arParams['LOAD_AJAX'] != 'Y') { ?>
	<section class="box">

		<?
		$filterURL = explode('/', $_SERVER['REDIRECT_URL']);
		if (in_array('filter', $filterURL)) {
			$arSelectSeoV2 = array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "DETAIL_TEXT");
			$arFilterSeoV2 = array("IBLOCK_ID" => 64, "NAME" => $_SERVER['REDIRECT_URL'], "ACTIVE" => "Y", "PROPERTY_DOMEN" => $_SERVER['SERVER_NAME']);
			$resSeoV2 = CIBlockElement::GetList(array(), $arFilterSeoV2, false, false, $arSelectSeoV2);
			if ($obSeoV2 = $resSeoV2->GetNextElement()) {
				$arFieldsSeoV2 = $obSeoV2->GetFields();
				$arFieldsSeoV2['SEO_TOP'] = ($arFieldsSeoV2['PREVIEW_TEXT_TYPE'] == 'text') ? '<p>' . $arFieldsSeoV2['PREVIEW_TEXT'] . '</p>' : $arFieldsSeoV2['PREVIEW_TEXT'];
				$arFieldsSeoV2['SEO_BOT'] = ($arFieldsSeoV2['DETAIL_TEXT_TYPE'] == 'text') ? '<p>' . $arFieldsSeoV2['DETAIL_TEXT'] . '</p>' : $arFieldsSeoV2['DETAIL_TEXT'];
			}
		}
		?>
		<? if ($USER->isAdmin()) :
	//echo '<!-- <pre>'; var_dump($arFieldsSeoV2['SEO_TOP']); echo '</pre>-->'; 
		endif; ?>
		<?  if ($arFieldsSeoV2['SEO_TOP']) : ?>
			<?= $arFieldsSeoV2['SEO_TOP'] ?>
<? endif; ?>
		<?
		if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] === 'Y') {
			$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
		} else {
			$basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
		}
		?>

		<?$APPLICATION->ShowViewContent('sotbit_seometa_top_desc'); //вывод верхнего описания?>

		<div class="">
			<!--large-12 medium-12 small-12 columns-->
			<div class="mysidebar">
				<? $intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'])); ?>
				<? if ($intCount > 0) : ?>
					<div class="mysidebar_block catalog_block">
						<div class="zagolovok select-title catalog_mobile">Каталог</div><?
															/**
															 * Показывать разделы, в которых есть отфильтрованные товары
															 */
															global $USER;
															global $arrFilter;

															// 0. Проверяем, установлен ли фильтр по свойству
															$isFilterIsset = false;
															foreach ($arrFilter as $key => $filterItem) {
																if (strpos($key, "=PROPERTY_") !== FALSE) {
																	$isFilterIsset = true;
																}
															}

															$arResultSection = array();
															if (isset($arrFilter["SECTION_ID"]) && $isFilterIsset) {
																// 1. Получим информацию о текущем разделе
																$currentSectionLM = 0;
																$currentSectionRM = 0;
																$currentSectionDL = 0;
																$rsCurrentSection = CIBlockSection::GetByID($arrFilter["SECTION_ID"]);
																if ($arCurrentSection = $rsCurrentSection->GetNext()) {
																	$currentSectionLM = $arCurrentSection["LEFT_MARGIN"];
																	$currentSectionRM = $arCurrentSection["RIGHT_MARGIN"];
																	$currentSectionDL = $arCurrentSection["DEPTH_LEVEL"];
																}


																// 2. Получаем список подразделов текущего раздела
																$childrenDL = $currentSectionDL + 1;
																$childrenSections = array();
																$arOrder = array("LEFT_MARGIN" => "ASC");
																$arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], ">LEFT_MARGIN" => $currentSectionLM, "<RIGHT_MARGIN" => $currentSectionRM, ">DEPTH_LEVEL" => $currentSectionDL);
																$arSelect = array("ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "DEPTH_LEVEL");
																$rsSectionsResult = CIBlockSection::GetList($arOrder, $arFilter, false, $arSelect);
																while ($arSectionsResult = $rsSectionsResult->GetNext()) {
																	$childrenSections[] = $arSectionsResult;
																}

																// 3. Группируем массив по вложенности
																$childrenSectionGroupped = array();
																foreach ($childrenSections as $key => $childrenSectionItem) {
																	if ($childrenSectionItem["DEPTH_LEVEL"] == $childrenDL) {
																		$childrenSectionGroupped[$childrenSectionItem["ID"]] = array();
																	} else {
																		$childrenSectionGroupped[$childrenSectionItem["IBLOCK_SECTION_ID"]][] = $childrenSectionItem["ID"];
																	}
																}


																// 4. Если фильтр установлен - получаем разделы элементов, подходящих под фильтр, группируем по разделам
																$childrenSectionsRealID = array();
																$arOrder = array("SORT" => "ASC");
																$arFilter = $arrFilter;
																$arSelect = array("ID", "IBLOCK_ID", "SECTION_ID");
																$arGroup = array("IBLOCK_SECTION_ID");
																$rsElement = CIBlockElement::GetList($arOrder, $arFilter, $arGroup, false, $arSelect);
																while ($arElementResult = $rsElement->GetNext()) {
																	$childrenSectionsRealID[] = $arElementResult["IBLOCK_SECTION_ID"];
																}

																// 5. Получим разделы, в которых есть хоть 1 элемент, подходящий под фильтр
																global $arResultSection;
																$arResultSection = array();
																foreach ($childrenSectionGroupped as $key => $sectionGroup) {

																	if (in_array($key, $childrenSectionsRealID)) {
																		$arResultSection[] = $key;
																	} else {
																		foreach ($sectionGroup as $sectionID) {
																			if (in_array($sectionID, $childrenSectionsRealID)) {
																				$arResultSection[] = $key;
																				break;
																			}
																		}
																	}
																}
															}

															$APPLICATION->IncludeComponent(
																"bitrix:catalog.section.list",
																"small",
																array(
																	"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
																	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
																	"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
																	"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
																	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
																	"CACHE_TIME" => $arParams["CACHE_TIME"],
																	"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
																	"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
																	"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
																	"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
																	"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
																	"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
																	"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
																	"ADD_SECTIONS_CHAIN" => "N",
																	"SECTION_FILTER" => $arResultSection,
																	"SECTION_USER_FIELDS" => array('UF_TITLEMENU'),
																	"PROPERTIES" => $arrFilter //Избежать кеширования
																),
																$component,
																array("HIDE_ICONS" => "Y")
															);
															?>
					</div>
				<? endif; ?>



				<? if ($isFilter) { ?>
					<div id="filter_header" class="mysidebar_block filter_block">
						<div class="zagolovok select-title filter_mobile">Фильтр</div>
						<?
						$APPLICATION->IncludeComponent(
							"kombox:filter",
							"horizontal",
							array(
								"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
								"IBLOCK_ID" => $arParams["IBLOCK_ID"],
								"FILTER_NAME" => $arParams["FILTER_NAME"],
								"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
								"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
								"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
								"CACHE_TYPE" => $arParams["CACHE_TYPE"],
								"CACHE_TIME" => $arParams["CACHE_TIME"],
								"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
								"SAVE_IN_SESSION" => "N",
								"INCLUDE_JQUERY" => "Y",
								"MESSAGE_ALIGN" => "LEFT",
								"MESSAGE_TIME" => "0",
								"IS_SEF" => "N",
								"CLOSED_PROPERTY_CODE" => array(),
								"CLOSED_OFFERS_PROPERTY_CODE" => array(),
								"SORT" => "N",
								"FIELDS" => array(),
								"PRICE_CODE" => $arParams["PRICE_CODE"],
								"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
								"CURRENCY_ID" => $arParams["CURRENCY_ID"],
								"XML_EXPORT" => "N",
								"SECTION_TITLE" => "NAME",
								"SECTION_DESCRIPTION" => "DESCRIPTION",
								"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
								"COLUMNS" => 5
							),
							false
						);
						?>
					</div><?
						}
							?>

				<? $APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"sert",
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
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO",
						"DETAIL_URL" => "",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "N",
						"DISPLAY_TOP_PAGER" => "N",
						"FIELD_CODE" => array("", ""),
						"FILTER_NAME" => "",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"IBLOCK_ID" => "56",
						"IBLOCK_TYPE" => "content",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"INCLUDE_SUBSECTIONS" => "Y",
						"MESSAGE_404" => "",
						"NEWS_COUNT" => "20",
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
						"PROPERTY_CODE" => array("", ""),
						"SET_BROWSER_TITLE" => "N",
						"SET_LAST_MODIFIED" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_STATUS_404" => "N",
						"SET_TITLE" => "N",
						"SHOW_404" => "N",
						"SORT_BY1" => "SORT",
						"SORT_BY2" => "ACTIVE_FROM",
						"SORT_ORDER1" => "ASC",
						"SORT_ORDER2" => "DESC",
						"STRICT_SECTION_CHECK" => "N"
					)
				); ?>

				<div id="advantages_block">
					<? $APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"adv",
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
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"DISPLAY_DATE" => "N",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "N",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array("", ""),
							"FILTER_NAME" => "",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "57",
							"IBLOCK_TYPE" => "content",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"INCLUDE_SUBSECTIONS" => "Y",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "4",
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
							"PROPERTY_CODE" => array("", ""),
							"SET_BROWSER_TITLE" => "N",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "N",
							"SHOW_404" => "N",
							"SORT_BY1" => "SORT",
							"SORT_BY2" => "ACTIVE_FROM",
							"SORT_ORDER1" => "ASC",
							"SORT_ORDER2" => "DESC",
							"STRICT_SECTION_CHECK" => "N"
						)
					); ?>
				</div>
				<div id="akcii">
					<? $APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"akci",
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
							"CACHE_TYPE" => "N",
							"CHECK_DATES" => "Y",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"DETAIL_URL" => "",
							"DISPLAY_BOTTOM_PAGER" => "N",
							"DISPLAY_DATE" => "N",
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => "Y",
							"DISPLAY_PREVIEW_TEXT" => "Y",
							"DISPLAY_TOP_PAGER" => "N",
							"FIELD_CODE" => array("", ""),
							"FILTER_NAME" => "",
							"HIDE_LINK_WHEN_NO_DETAIL" => "N",
							"IBLOCK_ID" => "60",
							"IBLOCK_TYPE" => "content",
							"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
							"INCLUDE_SUBSECTIONS" => "Y",
							"MESSAGE_404" => "",
							"NEWS_COUNT" => "1",
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
							"PROPERTY_CODE" => array("ENDDATE", "TITLE", "TEXTBUTTON", ""),
							"SET_BROWSER_TITLE" => "N",
							"SET_LAST_MODIFIED" => "N",
							"SET_META_DESCRIPTION" => "N",
							"SET_META_KEYWORDS" => "N",
							"SET_STATUS_404" => "N",
							"SET_TITLE" => "N",
							"SHOW_404" => "N",
							"SORT_BY1" => "SORT",
							"SORT_BY2" => "ACTIVE_FROM",
							"SORT_ORDER1" => "ASC",
							"SORT_ORDER2" => "DESC",
							"STRICT_SECTION_CHECK" => "N"
						)
					); ?>
				</div>
			</div>
			<script>
				$(document).ready(function() {
					$(".filter-sections-list").find(".image").remove();
					if ($("*").is(".filter-sections-list")) {} else {
						$(".catalog_block").hide();
					}

					$(".select-title").click(function() {

						if ($(this).hasClass("act-type")) {
							$(this).removeClass("act-type");
							$(this).parent().find(".kombox-combo").hide();
						} else {
							$(".select-title").parent().find(".kombox-combo").hide();
							$(".select-title").removeClass("act-type");
							$(this).addClass("act-type");
							$(this).parent().find(".kombox-combo").show();

						}

						/*if($(this).hasClass("selectav")){
							$(this).removeClass("selectav");
							$(this).parent().find(".kombox-combo").hide();
						}else{
							$(this).removeClass("selectav");
							$(this).addClass("selectav");
							
						}*/
					});

				});
			</script>
			<style type="text/css">
				.mysidebar {
					width: 285px;
					float: left;
					/* padding-top: 24px; */
				}

				.mysidebar .zagolovok {
					font-size: 22px;
					font-weight: bold;
					padding-bottom: 20px;
					margin-bottom: 20px;
					border-bottom: 2px solid #e5e5e5;
					position: relative;
				}

				.mysidebar .zagolovok:after {
					content: "";
					position: absolute;
					bottom: -2px;
					left: 0;
					width: 50px;
					height: 2px;
					background: #507298;
				}

				.mysidebar .mysidebar_block {
					margin-bottom: 60px;
				}
				
				.mysidebar .catalog_block .filter-sections-list {
					padding-left: 20px;
					display: block;
				}

				.mysidebar .catalog_block .filter-sections-list li {
					display: block;
					width: 100%;
					text-align: left;
					position: relative;
					margin-bottom: 20px;
				}

				.mysidebar .catalog_block .filter-sections-list li:before {
					position: absolute;
					left: -18px;
					top: 9px;
					content: "";
					width: 6px;
					height: 6px;
					background: #4d4d4d;
					border-radius: 50%;
					-moz-border-radius: 50%;
					transition: 0.3s all;
					-webkit-transition: 0.3s all;
					-moz-transition: 0.3s all;

				}

				.mysidebar .catalog_block .filter-sections-list li a {
					text-transform: initial;
					font-size: 15px;
				}

				.mysidebar .catalog_block .filter-sections-list li a .image {
					display: none;
				}

				.mysidebar .catalog_block .filter-sections-list li a:hover {
					text-decoration: none;
				}

				.mysidebar .catalog_block .filter-sections-list li:hover:before {
					background: #507298;
				}

				/**/
				.mysidebar #kombox-filter .kombox-fields {
					padding: 0;
					border-top: none;
				}

				.mysidebar #kombox-filter .kombox-fields {
					padding-top: 47px !important;
				}


				.mysidebar #kombox-filter .lvl1.kombox-column {
					width: 100% !important;
					border: none;
					margin-bottom: -27px;
				}

				.mysidebar #kombox-filter .select-title {
					margin: 0;
					border: none;
					border-bottom: 1px solid #dadada;
					border-top: 1px solid #dadada;
					padding: 10px 35px 10px 18px;
					font-size: 14px;
					background-position-x: calc(100% - 7px);
				}

				.mysidebar #kombox-filter div.kombox-combo {
					margin: 0;
					left: 0;
					position: relative;
					border: none;
					border-bottom: 1px solid #dadada;
					margin-top: -1px;
					padding-left: 25px;
				}

				/**/
				#products {
					padding-left: 330px;
					margin-top: 25px;
				}

				#products .product-title {
					font-size: 17px;
					padding: 0 0 5px;
					letter-spacing: 1.5px;

					min-height: 69px;
					display: flex;
					align-items: center;
				}

				#products .product-title a {
					text-decoration: underline;
				}

				#products .product-box .col:nth-child(2) {
					max-width: 346px;
					float: right;
				}

				#products .product-info td {
					display: block;
					width: 100%;
				}

				#products .product-info td p {
					font-size: 0.9rem;
				}

				#products .product-box-footer {
					position: relative;
				}

				#products .product-box-footer:after {
					clear: both;
					display: block;
					content: "";
				}

				#products .product-box-footer .button {
					width: calc(50% - 3px);
					display: inline-block;
					margin: 0;
					font-size: 11px;
				}

				@media only screen and (max-width:1024px) {
					#products .product-box-footer .button {
						width: 100%;
						margin-bottom: 10px;
					}
				}

				@media only screen and (max-width:920px) {
					#products .product-box .col:nth-child(2) {
						max-width: initial;
						float: none;
					}

					#products .product-info {
						margin-top: 10px;
					}

					#products .product-box .col:first-child {
						width: 100%;
					}

					#products .product-image {
						margin: 0 auto;
					}
				}

				@media only screen and (max-width:768px) {
					#products {
						padding-left: 0;
					}

					.mysidebar {
						width: 100%;
						float: none;
					}
				}
			</style>

			<div id="products">
			<? } ?>
			<?
			$intSectionID = $APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"",
				array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
					"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
					"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
					"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
					"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
					"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
					"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
					"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
					"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
					"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
					"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
					"BASKET_URL" => $arParams["BASKET_URL"],
					"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
					"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
					"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_FILTER" => $arParams["CACHE_FILTER"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SET_TITLE" => $arParams["SET_TITLE"],
					"MESSAGE_404" => $arParams["~MESSAGE_404"],
					"SET_STATUS_404" => $arParams["SET_STATUS_404"],
					"SHOW_404" => $arParams["SHOW_404"],
					"FILE_404" => $arParams["FILE_404"],
					"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
					"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
					"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
					"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

					"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
					"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
					"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
					"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
					"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

					"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
					"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
					"PAGER_TITLE" => $arParams["PAGER_TITLE"],
					"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
					"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
					"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
					"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
					"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
					"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
					"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"LAZY_LOAD" => $arParams["LAZY_LOAD"],
					"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
					"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

					"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
					"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
					"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
					"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
					"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
					"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
					"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
					"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],
					"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
					'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

					'LABEL_PROP' => $arParams['LABEL_PROP'],
					'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
					'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
					'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
					'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
					'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
					'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
					'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
					'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
					'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
					'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
					'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

					'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
					'OFFER_TREE_PROPS' => $arParams['OFFER_TREE_PROPS'],
					'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
					'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
					'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
					'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
					'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
					'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
					'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
					'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
					'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
					'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
					'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
					'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
					'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
					'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
					'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

					'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
					'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
					'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

					'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
					"ADD_SECTIONS_CHAIN" => "Y",
					'ADD_TO_BASKET_ACTION' => $basketAction,
					'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
					'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
					'COMPARE_NAME' => $arParams['COMPARE_NAME'],
					'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
					'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
					'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : ''),
					'SHOW_ALL_WO_SECTION' => $arParams['SHOW_ALL_WO_SECTION']
				),
				$component
			);
			unset($basketAction);

			$APPLICATION->IncludeComponent(
				"sotbit:seo.meta",
				".default",
				array(
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"KOMBOX_FILTER" => "Y",
				)
			);
			if ($USER->isAdmin()) {

				global $issetCondition;

			}
			/**
			 * Установка title и description при страничной навигации
			 */
			global $APPLICATION;

			if (intval($_REQUEST['PAGEN_1']) > 0) {
				$APPLICATION->SetPageProperty("description", $APPLICATION->GetPageProperty("description") . " | страница " . intval($_REQUEST['PAGEN_1']));
				$APPLICATION->SetPageProperty("title", $APPLICATION->GetTitle() . " | страница " . intval($_REQUEST['PAGEN_1']));
			} ?>



			<? if ($arParams['LOAD_AJAX'] != 'Y') { ?>
				<div class="clear"></div>
			</div>

			<?/*
		<?$seo_text = Kombox\Filter\Seo::GetText($default_text = "");
		$exp_seo_text = explode(' ', $seo_text);
		?>
	    <div class="cols text-cols seo-text-cols"><?=$seo_text?></div>*/ ?>
			<? if ($arFieldsSeoV2['SEO_BOT']) : ?>
				<?= $arFieldsSeoV2['SEO_BOT'] ?>
			<? endif; ?>
		</div>

		<?
				if (CModule::IncludeModule('iblock')) {
					$arSelect = array('ID', 'NAME', 'SECTION_PAGE_URL', 'UF_SAME', 'UF_IMG_POH_TO_2', 'UF_IMG_POH_TO_1', 'UF_URL_POH_TO_2', 'UF_URL_POH_TO_1', 'UF_TITLE_POH_TO_2', 'UF_TITLE_POH_TO_1', 'UF_SHOWCALC');
					$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], 'ACTIVE' => 'Y', 'ID' => $arResult['VARIABLES']['SECTION_ID']);
					$res = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, true, $arSelect);
					while ($ob = $res->GetNext()) {
						$same = $ob['UF_SAME'];
						$IMG_1 = $ob['UF_IMG_POH_TO_1'];
						$URL_1 = $ob['UF_URL_POH_TO_1'];
						$TITLE_1 = $ob['UF_TITLE_POH_TO_1'];
						$IMG_2 = $ob['UF_IMG_POH_TO_2'];
						$URL_2 = $ob['UF_URL_POH_TO_2'];
						$TITLE_2 = $ob['UF_TITLE_POH_TO_2'];
						if ($ob['UF_SHOWCALC'] == '1') {
							$showCalc = true;
						}
					}
				}
		?>
		<? if (!empty($same)) : ?>
			<?php /*?><div class="similar">
			<div class="row">
				<p class="similar_title_text">Похожие разделы</p>
				<?
				$z=1;
				if(CModule::IncludeModule('iblock')){
				   	$arSelect = Array('ID', 'NAME', 'SECTION_PAGE_URL','PICTURE');
				   	$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'ACTIVE'=>'Y','DEPTH_LEVEL'=>1, 'ID'=>$same);
				   	$res = CIBlockSection::GetList(Array('SORT'=>'rand'), $arFilter, true, $arSelect);
				   	while($ob = $res->GetNext())
				   	{?>
						<div class="large-6 medium-6 columns" onclick="location.href='<?=$ob['SECTION_PAGE_URL']; ?>'" style="cursor:pointer;">
							<img src="<?=CFile::GetPath($ob['PICTURE']);?>" alt="">
							<a href="javascript:void(0);" class="similar_mark">
								<?=$ob['NAME']; ?>
							</a>
						</div>
				   	<? $z++;
				   	if($z==3){
				   		break;
				   	}
				   }
				}
				?>
			</div>
		</div><?php */ ?>
		<? endif; ?>
		<?
				if ($IMG_1 == '' && $URL_1 == '' && $TITLE_1 == '' && $IMG_2 == '' && $URL_2 == '' && $TITLE_2 == '') {
				} else { ?>
			<div class="similar">
				<div class="row">
					<p class="similar_title_text">Похожие разделы </p>
					<?
					if ($IMG_1 == '' && $URL_1 == '' && $TITLE_1 == '') {
					} else { ?>
						<div class="large-6 medium-6 columns" onclick="location.href='<?= $URL_1; ?>'" style="cursor:pointer;">
							<img src="<?= CFile::GetPath($IMG_1); ?>" alt="">
							<a href="javascript:void(0);" class="similar_mark">
								<?= $TITLE_1; ?>
							</a>
						</div>
					<? }
					if ($IMG_2 == '' && $URL_2 == '' && $TITLE_2 == '') {
					} else {
					?>
						<div class="large-6 medium-6 columns" onclick="location.href='<?= $URL_2; ?>'" style="cursor:pointer;">
							<img src="<?= CFile::GetPath($IMG_2); ?>" alt="">
							<a href="javascript:void(0);" class="similar_mark">
								<?= $TITLE_2; ?>
							</a>
						</div>
					<?
					}

					?>
				</div>
			</div>
		<? } ?>
	</section>


	<? if ($showCalc) : ?>
		<? $APPLICATION->IncludeComponent(
						"bitrix:news.detail",
						"calc",
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
							"FIELD_CODE" => array("", ""),
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
							"PROPERTY_CODE" => array("PRICE_ZA_KVADRAT", "KOLVO_KV_V_BLOKE", "KOLVO_SP_MEST", "KOLVO_RABOCH_MEST", ""),
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
							"USE_SHARE" => "N"
						)
					); ?>
	<? endif; ?>



	<!--<div class="gray-box">
	<section class="box quest-box">
		<div class="row">
			<div class="large-3 medium-3 small-4 columns">
	    <div class="quest-box_image">
		    <img src="/local/templates/smart-module/images/call-center-operator.png" alt="">
		</div>
		</div>
		<div class="large-9 medium-9 small-8 columns helper">
			<div class="quest-box_text">
		        ОСТАЛИСЬ ВОПРОСЫ?<br>
		        <p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>
		    </div>
		</div>
		<div class="paragraph_mobile">
		<div class="small-12 columns nopadding">
			<p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>
		</div>
		</div>
		<div class="quest-box-button">
			<a href="#discount-popup" class="js-fancy button">Получить скидку</a>
		</div>
		
		</div>
	</section>
</div>-->

	<section class="footer-gray-box" data-image="/local/templates/smart-module/images/bg-form-foto-3.jpg">
		<div class="large-12 medium-12 columns center footer-gray-box-block ">
			<p class="manager_title-head">Остались вопросы?</p>
			<span class="manager_title-span">
				Оставьте ваши данные и мы сделаем вам персональную скидку!
			</span>
			<div class="questions_form">


				<form action="" method="POST" id="form-questions">
					<p id="content_questions"></p>
					<input type="text" class="manager_callback__input" name="name" placeholder="Ваше Имя">
					<input type="text" class="manager_callback__input" name="phone" placeholder="Ваш телефон">
					<span class="manager_callback__btn_span"><input type="submit" class="manager_callback__btn" value="Отправить"></span>
					<div class="p-popup__check manager__check">
						<input type="checkbox" id="checkid2" name="check" checked="checked">
						<label for="checkid2">
							Даю согласие на обработку <a href="/politika-konfidentsialnosti/">персональных данных</a>
						</label>
					</div>
				</form>

			</div>

		</div>
	</section>







	<?
				global $sotbitSeoMetaBottomDesc, $sotbitSeoMetaTitle, $sotbitSeoMetaDescription; //для установки нижнего описания
				//if($USER->isAdmin()){		echo"<pre>";print_r($sotbitSeoMetaTitle);echo"</pre>";	}
				$bottom_desc = (empty($sotbitSeoMetaBottomDesc)) ? $arCurSection['DESCRIPTION'] : $sotbitSeoMetaBottomDesc;
				$URLL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
				$url = strtok($URLL, '?');


				/*if ($USER->isAdmin()){
$iden = explode("/", $_SERVER['REQUEST_URI']);
echo $_SERVER['SERVER_NAME'];
$second_code = $iden[2];
echo "<pre>"; print_r($iden); echo "</pre>";
}*/ ?>
	<? if (!intval($_REQUEST['PAGEN_1']) > 0) { ?>
		<section class="box">
			<div class="cols text-cols">
				<div class="col typography">
					<? //$this->SetViewTarget('descr');
					?>
					<?/*<p class="under_title_text">*/ ?>
					<? CModule::IncludeModule("iblock");
					$arSelect = array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_*");
					$arFilter = array("IBLOCK_ID" => 5, "ACTIVE" => "Y", "NAME" => $url);
					$res = CIBlockElement::GetList(array("RAND" => "ASC"), $arFilter, false, array(), $arSelect);
					$str = $res->result;
					$find = $str->num_rows;
					if ($find == 0) { // если нет ни одного элемента с этим городом-страницей, то выводим основное
					?>
						<?= $bottom_desc ?>
						<? } else {
						if ($ob = $res->GetNextElement()) {
							$product_props_list = $ob->GetProperties();
							if (empty($product_props_list['WF_SEO_TEXT']['VALUE'])) { // если пустой блок СЕО описания, то выводим основное
						?>
								<?= $bottom_desc ?>
					<? }
						}
					} ?>
					<?/*</p>*/ ?>
					<? //$this->EndViewTarget();
					?>
					#WF_SEO_TEXT_1#
				</div>
			</div>
		</section>
	<? } ?>
<? } ?>
<?
//sotbit seometa meta start
global $sotbitSeoMetaTitle;
global $sotbitSeoMetaKeywords;
global $sotbitSeoMetaDescription;
global $sotbitSeoMetaBreadcrumbTitle;
global $sotbitSeoMetaH1;
if(!empty($sotbitSeoMetaH1))
{
$APPLICATION->SetTitle($sotbitSeoMetaH1);
}
if(!empty($sotbitSeoMetaTitle))
{
$APPLICATION->SetPageProperty("title", $sotbitSeoMetaTitle);
}
if(!empty($sotbitSeoMetaKeywords))
{
$APPLICATION->SetPageProperty("keywords", $sotbitSeoMetaKeywords);
}
if(!empty($sotbitSeoMetaDescription))
{
$APPLICATION->SetPageProperty("description", $sotbitSeoMetaDescription);
}
if(!empty($sotbitSeoMetaBreadcrumbTitle) ) {
	$APPLICATION->AddChainItem($sotbitSeoMetaBreadcrumbTitle);
}
//sotbit seometa meta end ?>