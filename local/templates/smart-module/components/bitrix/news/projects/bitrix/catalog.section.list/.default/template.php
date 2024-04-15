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
?>
<div class="row">
	<div class="large-12 medium-12 small-12 columns">
		<nav class="menu">
			<a <?if(empty($arParams['CURRENT_CODE'])):?> class="active"<?endif?> href="/proekty/">Все</a>
			<?foreach($arResult['SECTIONS'] as &$arSection):
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				?>
				<a id="<?=$this->GetEditAreaId($arSection['ID'])?>" <?if($arParams['CURRENT_CODE'] == $arSection['CODE']):?> class="active"<?endif?> href="<?=$arSection['SECTION_PAGE_URL']?>"><?=$arSection['NAME']?></a>
			<?endforeach;?>
		</nav>
	</div>
</div>
