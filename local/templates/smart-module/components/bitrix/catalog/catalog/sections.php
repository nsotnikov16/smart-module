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

$this->setFrameMode(true);
?>

<?

include($_SERVER['DOCUMENT_ROOT'] . '/catalog/index-page.php');

//Старое
/* 
<section class="box categories">
	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
			"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
			"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
			"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
			"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
			"SECTION_USER_FIELDS" => array('UF_TITLEMENU'),
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);
	?>
</section>*/ ?>

<div class="gray-box">
	<section class="box quest-box">

		ОСТАЛИСЬ ВОПРОСЫ?<br>
		<p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>

		<div class="quest-box-button">
			<a href="#discount-popup" class="js-fancy button">Получить скидку</a>
		</div>
	</section>
</div>

<section class="box">
	<div class="cols text-cols">
		<div class="col typography">
			<?= CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "DESCRIPTION"); ?>
		</div>
	</div>
</section>