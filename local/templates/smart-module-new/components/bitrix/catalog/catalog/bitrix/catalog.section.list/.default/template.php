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

if (0 < $arResult["SECTIONS_COUNT"]) : ?>
	<div class="row">
		<div class="col-12 d-flex flex-wrap">
			<? foreach ($arResult['SECTIONS'] as &$arSection) : ?>
				<?
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				$name = $arSection["UF_TITLEMENU"] ?: $arSection["NAME"];
				$image = \CFile::GetPath($arSection['DETAIL_PICTURE']) ?: (ASSETS_PATH . "/img/noimage_355x220.jpg");
				?>
				<a id="<?= $this->GetEditAreaId($arSection['ID']) ?>" href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="industry-card category-card">
					<span class="industry-card__img"><img src="<?= $image ?>" alt="<?= $name?>" loading="lazy" /></span>
					<span class="industry-card__title"><?= $name ?></span>
				</a>
			<? endforeach; ?>
		</div>
	</div>
<? endif; ?>