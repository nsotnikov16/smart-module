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

if (0 < $arResult["SECTIONS_COUNT"]) {?>
	<ul class="categories-list">
		<?
		foreach ($arResult['SECTIONS'] as &$arSection) {
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
			<li class="categories-list-item" id="<?=$this->GetEditAreaId($arSection['ID'])?>">
				<a href="<?=$arSection['SECTION_PAGE_URL']?>">
					<span class="categories-image">
						<?
						$image = (isset($arSection['PICTURE']['SRC'])) ? $arSection['PICTURE']['SRC'] : SITE_TEMPLATE_PATH."/images/noimage_355x220.jpg";
						?>
						<img src="<?=$image?>" alt="<?=$arSection['NAME']?>">
					</span>
					<span class="categories-title">
						<?= $arSection["UF_TITLEMENU"] ? $arSection["UF_TITLEMENU"] : $arSection["NAME"]?>
						<?if ($arParams["COUNT_ELEMENTS"]):?>
							(<?=$arSection['ELEMENT_CNT']?>)
						<?endif?>
					</span>
				</a>
			</li>
			<?
		}
		unset($arSection);
		?>
	</ul>
	<?
}
?>