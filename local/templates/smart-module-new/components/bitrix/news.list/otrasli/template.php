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
<? if (!empty($arResult['ITEMS'])) : ?>
	<div class="row">
		<div class="col-12 d-flex flex-wrap">
			<? foreach ($arResult["ITEMS"] as $arItem) : ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="industry-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<span class="industry-card__img">
						<img src="<?= $arItem['PROPERTIES']['PREVIEW_IMG']['VALUE'] ? \CFile::GetPath($arItem['PROPERTIES']['PREVIEW_IMG']['VALUE']) : $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>" loading="lazy" />
					</span>
					<span class="industry-card__title"><?= $arItem['PROPERTIES']['TITLE_IN_MENU']['VALUE'] ?: $arItem['NAME'] ?></span>
				</a>
			<? endforeach; ?>
		</div>
	</div>
<? endif; ?>