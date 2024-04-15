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

	<div class="slider-main-section">
		<div class="slider slider-main">

			<? foreach ($arResult['ITEMS'] as $key => $arItem) : ?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				?>
				<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<section class="screen-box-eee">
						<img class="par-fone par-fone-mobile" <? if ($key == 0) : ?>src<? else : ?>data-lazy<? endif; ?>="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>">
						<img <? if ($key == 0) : ?>src<? else : ?>data-lazy<? endif; ?>="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" class="par-fone par-fone-pc">
						<div class="par-text">
							<div class="box bg">
								<div class="main-ee-img <?= $arItem['PROPERTIES']['POSITION']['VALUE_XML_ID'] === 'RIGHT' ? 'right' : '' ?>">
									<div class="screen-box-text">
										<span><?= $arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT'] ?></span>
									</div>
									<?= $arItem['~PREVIEW_TEXT'] ?>

									<div class="screen-box-button">
										<a href="<?= $arItem['PROPERTIES']['LINK_BUTTON']['VALUE'] ?>" class="button">
											<?= $arItem['PROPERTIES']['TEXT_BUTTON']['VALUE'] ?> </a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>


			<? endforeach ?>


		</div>
		<div class="slider-main-nav"></div>
	</div>
	<script>
		function setPositionNav() {
			if (window.innerWidth < 768) return;
			setTimeout(() => {
				const right = document.querySelector('.slider-main-section .slick-active .main-ee-img').classList.contains('right')
				const nav = document.querySelector('.slider-main-section .slider-main-nav')
				if (right) {
					nav.style.justifyContent = 'end'
				} else {
					nav.style.justifyContent = ''
				}
			}, 100)
		}

		$('.slider-main').slick({
			lazyLoad: 'ondemand',
			slidesToShow: 1,
			arrows: true,
			dots: true,
			fade: true,
			appendDots: '.slider-main-nav',
			appendArrows: '.slider-main-nav',
			prevArrow: '<button type="button" class="slick-prev slick-arrow-my" onclick="setPositionNav()"></button>',
			nextArrow: '<button type="button" class="slick-next slick-arrow-my" onclick="setPositionNav()"></button>',
		})

		if ($(window).width() > 500) {

			var parFoneMobileArr = document.querySelectorAll(".slider-main .par-fone-mobile");
			var parFonePcArr = document.querySelectorAll(".slider-main .par-fone-pc");

			var parTextArr = document.querySelectorAll(".slider-main .par-text");
			var parNavArr = document.querySelectorAll(".slider-main-nav");


			function setTranslate(xPos, yPos, el) {
				el.style.transform = "translate3d(" + xPos + ", " + yPos + "px, 0)";
				el.style.transition = 'transform 0.1s linear'
			}

			window.addEventListener("DOMContentLoaded", scrollLoop, false);

			let xScrollPosition;
			let yScrollPosition;

			function scrollLoop() {
				xScrollPosition = window.scrollX;
				yScrollPosition = window.scrollY;

				let heightHeaderBottom = document.querySelector('.header__bottom').getBoundingClientRect().height;
				if (yScrollPosition >= (heightHeaderBottom + heightHeaderBottom * 0.5)) {
					yScrollPosition = yScrollPosition * 0.2
				} else {
					yScrollPosition = 0
				}

				parFoneMobileArr.forEach(item => setTranslate(0, yScrollPosition, item))
				parFonePcArr.forEach(item => setTranslate(0, yScrollPosition, item))
				parTextArr.forEach(item => setTranslate(0, yScrollPosition, item))
				parNavArr.forEach(item => setTranslate('-50%', yScrollPosition, item))

				requestAnimationFrame(scrollLoop);
			}
		}
	</script>

<? endif; ?>