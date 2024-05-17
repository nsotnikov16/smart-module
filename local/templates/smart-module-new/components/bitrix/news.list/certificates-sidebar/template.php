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
    <div class="certificates-sidebar sidebar-box">
        <div class="certificates-sidebar-slider">
            <? foreach ($arResult['ITEMS'] as $arItem) : ?>
                <div class="slide">
                    <a href="<?= $arItem['DETAIL_PICTURE']['SRC'] ?: $arItem['PREVIEW_PICTURE']['SRC'] ?>" class="certificate-box" data-fancybox="certificate">
                        <img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?: $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>" loading="lazy" /></a>
                </div>
            <? endforeach; ?>
        </div>
    </div>
<? endif; ?>