<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true); ?>
<div class="page page-product product-detail-page">
    <div class="container">
        <div class="row">
            #BREADCRUMB#
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <h1>#H1#</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-7 d-flex flex-wrap">
                <? if (!empty($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'])) : ?>
                    <div class="additional">
                        <? foreach ($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'] as $photoId) : ?>
                            <? $imgSrc = CFile::ResizeImageGet($photoId, array('width' => 355, 'height' => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src']; ?>
                            <a href="<?= \CFile::GetPath($photoId) ?>" class="new-js-popup-min" data-fancybox="new-js-popup-min">
                                <span class="image-border"></span>
                                <img src="<?= $imgSrc ?>" alt="<?= $arResult['NAME'] ?>" loading="lazy">
                            </a>
                        <? endforeach ?>
                    </div>
                    <div class="product-image">
                        <a class="js-fullscreen" href="#" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="left" title="Посмотреть подробно"><i class="fa fa-expand" id="tooltip" aria-hidden="true"></i></a>
                        <div class="spritespin"></div>
                        <div class="spritespinBig"></div>
                        <div id="container_for_button">
                            <div id="prewSlide"></div>
                            <input type="range" min="0" max="29" step="1" value="0" data-orientation="horizontal" />
                            <div id="nextSlide"></div>
                        </div>
                    </div>
                <? endif; ?>
            </div>
            <div class="col-12 col-lg-5">
                <div class="product-information">
                    <? if (!empty($arResult['PROPERTIES']['ADV_PROD']['ITEMS'])) : ?>
                        <div class="product-information-advantages">
                            <? foreach ($arResult['PROPERTIES']['ADV_PROD']['ITEMS'] as $adv) : ?>
                                <div class="product-information-advantages-item" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="top" title="<?= $adv['NAME'] ?>">
                                    <img src="<?= $adv['PREVIEW_PICTURE'] ?>" alt="" class="img-default">
                                    <img src="<?= $adv['DETAIL_PICTURE'] ?>" alt="" class="img-hover" loading="lazy">
                                </div>
                            <? endforeach; ?>
                        </div>
                    <? endif; ?>
                    <? if (!empty($arResult['PRODUCT_INFO'])) : ?>
                        <ul class="product-information-characteristics my-ul">
                            <? foreach ($arResult['PRODUCT_INFO'] as $arItem) : ?>
                                <li>
                                    <p><strong><?= $arItem['NAME'] ?>:</strong><span><?= $arItem['VALUE'] ?></span></p>
                                </li>
                            <? endforeach; ?>
                        </ul>
                    <? endif; ?>

                    <div class="product-information__footer">
                        <div class="price-wrapper">
                            <div class="price">
                                <p><strong>Стоимость:</strong><?= $arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ?: 'по запросу' ?></p>
                            </div>
                        </div>
                        <? if (!$arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) : ?>
                            <a href="javascript:void(0)" class="btn btn-green product-information__btn" data-bs-toggle="modal" data-bs-target="#orderModal">Узнать стоимость</a>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-details">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="nav nav-tabs nav-tabs-products" role="tablist">
                    <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">Дополнительные услуги</button>
                    <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">Сертификаты</button>
                    <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">Описание</button>
                </nav>
            </div>
        </div>
    </div>
</div>