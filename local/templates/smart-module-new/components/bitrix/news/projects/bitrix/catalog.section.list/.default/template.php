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
	<div class="col-12">

		<? foreach ($arResult['SECTIONS'] as $arSection) :
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
		?>
			<div class="projects-card panel_heading" id="<?= $this->GetEditAreaId($arSection['ID']) ?>">
				<div class="block_title">
					<div class="projects-card__icon">
						<? if ($arSection['PICTURE']['SRC']) : ?>
							<img src="<?= $arSection['PICTURE']['SRC'] ?>" loading="lazy" />
						<? endif; ?>
					</div>
					<div class="h3"><?= $arSection['NAME'] ?></div>
					<a href="<?= $arSection['SECTION_PAGE_URL'] ?>" onclick="!this.closest('.panel-heading.in') ? false : ''" class="projects-card__link h3"><?= $arSection['NAME'] ?></a>
					<div class="projects-card__images">
						<? if (!empty($arSection['ITEMS'])) : ?>
							<? foreach ($arSection['ITEMS'] as $key => $item) : ?>
								<? if ($key > 2) break; ?>
								<div class="projects-card__img"><img src="<?= $item['PREVIEW_PICTURE'] ?: $item['DETAIL_PICTURE'] ?>" loading="lazy" /></div>
							<? endforeach; ?>
						<? endif; ?>
					</div>
					<div class="projects-card__btn">
						<svg class="svg-icon svg-icon-plus">
							<use xlink:href="#ASSETS_PATH#/img/sprite.svg#plus"></use>
						</svg>
						<svg class="svg-icon svg-icon-minus">
							<use xlink:href="#ASSETS_PATH#/img/sprite.svg#minus"></use>
						</svg>
					</div>
				</div>
				<div class="block_hover">
					<div class="row">
						<? if (!empty($arSection['ITEMS'])) : ?>
							<? foreach ($arSection['ITEMS'] as $key => $item) : ?>
								<div class="col-12 col-sm-6 col-lg-4 mb-25 projects-card-col">
									<div class="projects-card-box">
										<img src="<?= $item['PREVIEW_PICTURE'] ?: $item['DETAIL_PICTURE'] ?>" alt="" class="projects-card-box__img">
										<div class="projects-card-box__body">
											<div class="projects-card-box__text">
												<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="projects-card-box__title"><?= $item['NAME'] ?></a>
												<div class="box-text">
													<? if ($deadline = $item['PROPERTY_SROKI_REALIZACII_VALUE']) : ?>
														<p>Срок: <?= $deadline ?></p>
													<? endif; ?>
													<? if ($square = $item['PROPERTY_OBCHAYA_PLOTHAT_VALUE']) : ?>
														<p>Общая площадь: <?= $square ?></p>
													<? endif; ?>
												</div>
											</div>
											<a href="<?= $item['DETAIL_PAGE_URL'] ?>" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn">Подробнее
												<span class="btn-icon btn-icon-arrow"><svg class="svg-icon">
														<use xlink:href="#ASSETS_PATH#/img/sprite.svg#arrow-link"></use>
													</svg></span></a>
										</div>
									</div>
								</div>
							<? endforeach ?>
						<? endif; ?>
						<? if (!empty($arSection['ITEMS']) && count($arSection['ITEMS']) > 3) : ?>
							<div class="col-12">
								<a href="#" class="btn btn-grey btn-load-projects">Показать еще</a>
							</div>
						<? endif; ?>
					</div>
				</div>
			</div>
		<? endforeach; ?>

	</div>
<? endif; ?>