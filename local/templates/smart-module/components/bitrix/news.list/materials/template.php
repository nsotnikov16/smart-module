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
		<div class="box">
			<div class="title-wrapper">
				<h2>Полезные материалы</h2>
				<div class="slider-nav-my materials-slider-nav"></div>
			</div>

			<div class="materials-slider">
				<? foreach ($arResult['ITEMS'] as $arItem) :
					if ($_SERVER['SERVER_NAME'] !== 'smart-module.ru') :
						$arItem['DETAIL_PAGE_URL'] = 'https://smart-module.ru' . $arItem['DETAIL_PAGE_URL'];
					endif;
				?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					$src = $arItem['DETAIL_PICTURE']['SRC'];
					?>
					<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="slide">
						<div class="materials-card">
							<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="materials-card__image"><img src="<?= $src ?>" alt="<?= $arItem['NAME'] ?>"></a>
							<div class="materials-card__body">
								<div class="materials-card-list">
									<div class="materials-card-list__item">
										<?
											$blog = strripos($APPLICATION->GetCurPage(), "/blog/");
											
											$img_calendar_path = "upload/new-image/calendar.svg";
											$img_clock_path = "upload/new-image/clock.svg";

											if($blog !== false) {
												$img_calendar_path = "/local/templates/smart-module/images/calendar__gray.svg";
												$img_clock_path = "/local/templates/smart-module/images/clock__gray.svg";
											}
										?>
										<img src="<?= $img_calendar_path ?>" alt="">
										<span><?= $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
									</div>
									<? if ($arItem['PROPERTIES']['READING_TIME']['VALUE']) : ?>
										<div class="materials-card-list__item">
											<img src="<?= $img_clock_path ?>" alt="">
											<span><?= $arItem['PROPERTIES']['READING_TIME']['VALUE'] ?></span>
										</div>
									<? endif; ?>
									<!-- пусть просмотры пока будут только в блоге -->
									<? if($blog !== false) {?>
										<div class="materials-card-list__item">
											<img src="/local/templates/smart-module/images/eye__gray.svg" alt="">
											<span>156</span>
										</div> 
									<?}?>
								</div>
								<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="materials-card__name"><?= $arItem['NAME'] ?></a>
							</div>
						</div>
					</div>
				<? endforeach ?>
			</div>
		</div>
	</section>
<? endif; ?>