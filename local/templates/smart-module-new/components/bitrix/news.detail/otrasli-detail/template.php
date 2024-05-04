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
<div class="home-section">
	<div class="breadcrumb-wrapper">
		<div class="container">
			<div class="row">
				#BREADCRUMB#
			</div>
		</div>
	</div>
	<div class="slider slider-main">
		<div class="slide">
			<div class="slider-main-item">
				<img src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" class="slider-main-item__img slider-main-item__img-mobile" />
				<img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" class="slider-main-item__img slider-main-item__img-pc" />
				<div class="par-text">
					<div class="box bg">
						<div class="main-ee-img">
							<h1 class="screen-box-text">
								<span><?= $arResult['NAME'] ?></span>
							</h1>
							<? if ($subtitle = $arResult['PROPERTIES']['SUBTITLE']['VALUE']) : ?>
								<div class="box-text">
									<p><?= $subtitle ?></p>
								</div>
							<? endif; ?>
							<? if (($button = $arResult['PROPERTIES']['BUTTON']) && $button['VALUE']) : ?>
								<a href="<?= $button['DESCRIPTION'] ?: '#advantages-events' ?>" class="btn btn-accent btn-accent-black text-transform projects-card-box__btn go_to">
									<span><?= $button['VALUE'] ?></span>
									<span class="btn-icon btn-icon-arrow">
										<svg class="svg-icon">
											<use xlink:href="#ASSETS_PATH#/img/sprite.svg#arrow-link"></use>
										</svg>
									</span>
								</a>
							<? endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page page-events" id="advantages-events">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<? if (($advantages = $arResult['PROPERTIES']['ADVANTAGES']['ITEMS'])) : ?>
					<div class="advantages-events tabs">
						<? foreach ($advantages as $key => $adv) : ?>
							<div class="advantages-events-box js-tab-trigger" data-tab="<?= $key ?>">
								<div class="advantages-events-box__icon">
									<img src="<?= $adv['IMG_SRC'] ?>" alt="<?= $adv['NAME'] ?>" loading="lazy" />
								</div>
								<div class="advantages-events-box__text">
									<div class="box-text">
										<p><?= $adv['NAME'] ?></p>
									</div>
								</div>
							</div>
							<? if ($adv['DESCRIPTION']) : ?>
								<div class="advantages-events-box__hidden js-tab-content" data-tab="<?= $key?>">
									<div class="advantages-events-box__close">
										<svg class="svg-icon">
											<use xlink:href="#ASSETS_PATH#/img/sprite.svg#close"></use>
										</svg>
									</div>
									<div class="advantages-events-box">
										<div class="advantages-events-box__icon">
											<img src="<?= $adv['IMG_SRC'] ?>" alt="<?= $adv['NAME'] ?>" loading="lazy" />
										</div>
										<div class="advantages-events-box__text">
											<div class="box-text">
												<p><?= $adv['NAME'] ?></p>
											</div>
										</div>
									</div>
									<div class="advantages-events-box__body">
										<div class="box-text">
											<p>
												<?= $adv['DESCRIPTION'] ?>
											</p>
										</div>
									</div>
								</div>
							<? endif; ?>
						<? endforeach ?>
					</div>
				<? endif; ?>
			</div>
			<?= $arResult['~PREVIEW_TEXT']?>
			<div id="content"><?= $arResult['~DETAIL_TEXT']?></div>
			
		</div>
	</div>
</div>