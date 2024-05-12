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
//echo '<pre>'; var_dump($arResult); echo '</pre>';
?>

<? if (!empty($arResult['ITEMS'])) : ?>

	<section class="materials">
		<div class="container">
			<div class="row">

				<div class="col-12 d-flex align-items-center">
					<? if ($arParams['TITLE']) : ?>
						<h2><?= $arParams['TITLE'] ?></h2>
					<? endif; ?>
					<div class="slider-nav slider-nav-end materials-slider-nav"></div>
				</div>

				<div class="materials-slider">
					<? foreach ($arResult['ITEMS'] as $arItem) : ?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>
						<div class="slide">
							<div class="materials-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
								<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="materials-card__image">
									<img src="<?= $arItem['DETAIL_PICTURE']['SRC']; ?>" alt="<?= $arItem['NAME'] ?>" />
								</a>
								<div class="materials-card__body">
									<div class="materials-card-list">
										<? if ($arParams['DISPLAY_DATE'] != 'N' && $arItem['DISPLAY_ACTIVE_FROM']) : ?>
											<div class="materials-card-list__item">
												<svg class="svg-icon svg-icon-calendar">
													<use xlink:href="#ASSETS_PATH#/img/sprite.svg#calendar"></use>
												</svg>
												<span><?= $arItem['DISPLAY_ACTIVE_FROM'] ?></span>
											</div>
										<? endif; ?>
										<? if ($arItem['PROPERTIES']['READING_TIME']['VALUE']) : ?>
											<div class="materials-card-list__item">
												<svg class="svg-icon svg-icon-calendar">
													<use xlink:href="#ASSETS_PATH#/img/sprite.svg#time"></use>
												</svg>
												<span><?= $arItem['PROPERTIES']['READING_TIME']['VALUE'] ?></span>
											</div>
										<? endif; ?>
										<div class="materials-card-list__item">
											<svg class="svg-icon svg-icon-calendar">
												<use xlink:href="#ASSETS_PATH#/img/sprite.svg#view"></use>
											</svg>
											<span>156</span>
										</div>
									</div>
									<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="materials-card__name"><?= $arItem['NAME'] ?></a>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<? endif; ?>