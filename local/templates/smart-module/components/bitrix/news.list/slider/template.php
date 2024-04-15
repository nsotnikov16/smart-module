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

	<div class="slider slider-main">
		<? foreach ($arResult['ITEMS'] as $arItem) : ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
				<section class="screen-box-eee">
					<img class="par-fone" src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>">
					<div class="par-text <?= $arItem['PROPERTIES']['POSITION']['VALUE_XML_ID'] === 'RIGHT' ? 'right' : '' ?>">
						<div class="box <?= $arItem['PROPERTIES']['BACKGROUND']['VALUE_XML_ID'] === 'Y' ? 'bg' : '' ?>">
							<div class="main-ee-img">
								<div class="screen-box-text">
									<span><?= $arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT'] ?></span>
								</div>
								<div class="screen-box-button">
									<a href="<?= $arItem['PROPERTIES']['LINK_BUTTON']['VALUE'] ?>" class="button">
										<?= $arItem['PROPERTIES']['TEXT_BUTTON']['VALUE'] ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		<? endforeach; ?>

	</div>
	<script>
		$('.slider-main').slick({
			dots: true
		});

		if ($(window).width() > 500) {

			var parFoneArr = document.querySelectorAll(".slider-main .par-fone");

			var parTextArr = document.querySelectorAll(".slider-main .par-text");

			function setTranslate(xPos, yPos, el) {
				el.style.transform = "translate3d(" + xPos + ", " + yPos + "px, 0)";
			}

			window.addEventListener("DOMContentLoaded", scrollLoop, false);

			let xScrollPosition;
			let yScrollPosition;

			function scrollLoop() {
				xScrollPosition = window.scrollX;
				yScrollPosition = window.scrollY;

				parFoneArr.forEach(item => setTranslate(0, yScrollPosition * .45, item))
				parTextArr.forEach(item => setTranslate(0, yScrollPosition * .24, item))

				requestAnimationFrame(scrollLoop);
			}
		}
	</script>
<? endif; ?>