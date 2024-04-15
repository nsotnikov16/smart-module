<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if (0 < $arResult["SECTIONS_COUNT"]) {
	foreach ($arResult['SECTIONS'] as &$arSection){
		$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		if($arSection['UF_HIDE_LINK'] == 1) continue;
		?>

		<a id="<?=$this->GetEditAreaId($arSection['ID'])?>" href="<?=$arSection['UF_SEC_LINK'];?>" class="product-list-box">
			<span class="product-list-box-image">
				<span class="product-hover"></span>
				<img src="<?=CFile::GetPath($arSection['UF_ICON'])?>" alt="">
			</span>
			<span class="product-list-box-title">
				<?= $arSection['UF_NAMEONMAIN'] ? $arSection['UF_NAMEONMAIN'] : $arSection['NAME']?>
				<?if ($arParams["COUNT_ELEMENTS"]):?>
					(<?=$arSection['ELEMENT_CNT']?>)
				<?endif?>
			</span>
		</a>
		<?
	}
	unset($arSection);
}
?>