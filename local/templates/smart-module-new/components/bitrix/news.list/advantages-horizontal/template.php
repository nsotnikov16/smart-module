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
	<div class="advantages-events tabs">
		<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>

			<div class="advantages-events-box js-tab-trigger" data-tab="<?= $key ?>" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
				<div class="advantages-events-box__icon">
					<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>" loading="lazy" />
				</div>
				<div class="advantages-events-box__text">
					<div class="box-text">
						<p><?= $arItem["NAME"] ?></p>
					</div>
				</div>
			</div>

			<div class="advantages-events-box__hidden js-tab-content" data-tab="<?= $key ?>">
				<div class="advantages-events-box__close">
					<svg class="svg-icon">
						<use xlink:href="#ASSETS_PATH#/img/sprite.svg#close"></use>
					</svg>
				</div>
				<div class="advantages-events-box">
					<div class="advantages-events-box__icon">
						<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["NAME"] ?>" loading="lazy" />
					</div>
					<div class="advantages-events-box__text">
						<div class="box-text">
							<p><?= $arItem["NAME"] ?></p>
						</div>
					</div>
				</div>
				<div class="advantages-events-box__body">
					<div class="box-text">
						<p>
							<?= $arItem['PREVIEW_TEXT'] ?>
						</p>
					</div>
				</div>
			</div>
		<? endforeach; ?>
	</div>
<? endif; ?>