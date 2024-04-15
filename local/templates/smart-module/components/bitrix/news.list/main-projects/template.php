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

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
	function initYmaps(center, zoom) {
		var myMap,
			myPlacemark;
		myMap = new ymaps.Map("map", {
			center,
			zoom
		}, {});

		<? foreach ($arResult["ITEMS"] as $arItem) :
			$img = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width' => 150, 'height' => 150), BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true);
		?>

			myPlacemark = new ymaps.Placemark([<?= $arItem['DISPLAY_PROPERTIES']['MAP']['~VALUE'] ?>], {
				hintContent: '<?= $arItem["NAME"] ?>',
				balloonContent: `<a href="<?= $arItem["DETAIL_PAGE_URL"] ?>"><img src="<?= $img["src"] ?>" alt="" /></a><br><?= str_replace(array("r\/", "n\/", "\\"), '', $arItem["PREVIEW_TEXT"]); ?><br><a href="<?= $arItem["DETAIL_PAGE_URL"] ?>">Подробнее</a>`
			}, {
				iconLayout: 'default#image',
				iconImageHref: '<?= SITE_TEMPLATE_PATH ?>/images/mark.png',
				iconImageSize: [46, 55],
				iconImageOffset: [-23, -27]
			});

			myMap.geoObjects.add(myPlacemark);
		<? endforeach; ?>
	}
</script>
<div id="map"></div>