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
	<section class="reviews">
		<div class="box">
			<div class="title-wrapper">
				<h2>Отзывы о нас</h2>
				<div class="slider-nav-my reviews-slider-nav"></div>
			</div>

			<div class="reviews-slider">
				<? foreach ($arResult['ITEMS'] as $arItem) : ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$src = $arItem['PREVIEW_PICTURE']['SRC'];
					?>
					<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="slide">
						<a href="<?= $src ?>" class="reviews-box fancybox" rel="group"><img src="<?= $src ?>" alt=""></a>
					</div>
				<? endforeach ?>
			</div>
		</div>
	</section>
<? endif; ?>

