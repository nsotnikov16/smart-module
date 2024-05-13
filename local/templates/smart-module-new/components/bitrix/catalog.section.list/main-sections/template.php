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
$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<? if (!empty($arResult['SECTIONS'])) : ?>
	<div class="products-list">
		<? foreach ($arResult['SECTIONS'] as $arSection) : ?>
			<?
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
			<a href="<?= $arSection['SECTION_PAGE_URL']?>" class="products-list__link" id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
				<span class="products-list__link-img">
					<span class="products-list__link-img-hover"></span>
					<img src="<?=CFile::GetPath($arSection['UF_ICON'])?>" alt="<?= $arSection['NAME']?>" loading="lazy" /></span>
				<span class="products-list__link-title"><?= $arSection['UF_NAMEONMAIN'] ?: $arSection['NAME']?></span>
			</a>
		<? endforeach ?>
	</div>
<? endif; ?>