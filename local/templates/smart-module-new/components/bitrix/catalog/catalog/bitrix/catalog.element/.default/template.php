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
                        <? if ($arResult['DETAIL_PICTURE']['SRC'] && $arResult['PROPERTIES']['FULL_SPRITE']['VALUE']) : ?>
                            <a class="js-fullscreen" href="#" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="left" title="Посмотреть подробно"><i class="fa fa-expand" id="tooltip" aria-hidden="true"></i></a>
                            <div class="spritespin"></div>
                            <div class="spritespinBig"></div>
                            <div id="container_for_button">
                                <div id="prewSlide"></div>
                                <input type="range" min="0" max="29" step="1" value="0" data-orientation="horizontal" />
                                <div id="nextSlide"></div>
                            </div>
                        <? else : ?>
                            <div>
                                <a href="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" class="new-js-popup-min" data-fancybox="new-js-popup-min-2">
                                    <img src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arResult['NAME'] ?>">
                                </a>
                            </div>
                        <? endif; ?>
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

                        <a href="javascript:void(0)" class="btn btn-green product-information__btn" data-base-price="<?= intval($arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) ?>" onclick="clickProduct(this)" data-bs-toggle="modal" data-bs-target="#orderModal"><?= $arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ? 'Купить' : 'Узнать стоимость' ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<? if (!empty($arResult['ADD_SERVICES']) || $arResult['DETAIL_TEXT'] || !empty($arResult['CERTIFICATES'])) : ?>
    <div class="product-details">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="nav nav-tabs nav-tabs-products" role="tablist">
                        <? if (!empty($arResult['ADD_SERVICES'])) : ?>
                            <button class="nav-link" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">Дополнительные услуги</button>
                        <? endif; ?>
                        <? if (!empty($arResult['CERTIFICATES'])) : ?>
                            <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">Сертификаты</button>
                        <? endif; ?>
                        <? if ($arResult['DETAIL_TEXT']) : ?>
                            <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">Описание</button>
                        <? endif; ?>
                    </nav>
                </div>
            </div>
        </div>
        <div class="section-tabs-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content tab-content-product">
                            <? if (!empty($arResult['ADD_SERVICES'])) : ?>
                                <div class="tab-pane fade" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                                    <div class="tab-content-product-wrapper tabs">
                                        <div class="tab-product-category">
                                            <div class="tab-product-category__col">
                                                <? foreach (($arResult['ADD_SERVICES']) as $key => $service) : ?>
                                                    <div class="js-tab-trigger tab-product-category-item" data-tab="<?= $key ?>">
                                                        <div class="tab-product-category-item__icon">
                                                            <img src="<?= CFile::GetPath($service["DETAIL_PICTURE"]); ?>" alt="<?= $service['NAME'] ?>" loading="lazy">
                                                        </div>
                                                        <div class="tab-product-category-item__text"><?= $service['NAME'] ?></div>
                                                    </div>
                                                <? endforeach; ?>
                                            </div>
                                        </div>
                                        <div class="tab-product-category-content">
                                            <? foreach (($arResult['ADD_SERVICES']) as $key => $service) : ?>
                                                <div class="js-tab-content" data-tab="<?= $key ?>">
                                                    <? if (!empty($service['ELEMENTS'])) : ?>
                                                        <? foreach ($service['ELEMENTS'] as $element) : ?>
                                                            <div class="product-component-row" data-services-element-id="<?= $element['ID'] ?>">
                                                                <? if ($element['PREVIEW_PICTURE']) : ?>
                                                                    <a href="javascript:void(0)" class="product-component-row__img">
                                                                        <img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="<?= $element['NAME'] ?>" loading="lazy">
                                                                    </a>
                                                                <? endif; ?>
                                                                <a href="javascript:void(0)" class="product-component-row__name" data-name><?= $element['NAME'] ?></a>
                                                                <div class="price-wrapper">
                                                                    <p>Стоимость:</p>
                                                                    <div class="price" data-price><?= $element['PREVIEW_TEXT'] ?></div>
                                                                </div>
                                                                <a href="javascript:void(0)" class="btn btn-accent btn-add-card" data-add-to-card>
                                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                    <span>Добавить</span>
                                                                </a>
                                                                <div class="amount">
                                                                    <span class="down" data-minus>-</span>
                                                                    <input type="text" value="0" data-count />
                                                                    <span class="up" data-plus>+</span>
                                                                </div>
                                                            </div>
                                                        <? endforeach; ?>
                                                    <? endif; ?>
                                                </div>
                                            <? endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if (!empty($arResult['CERTIFICATES'])) : ?>
                                <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab" tabindex="0">
                                    <div class="row">
                                        <? foreach ($arResult['CERTIFICATES'] as $arCert) : ?>
                                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-20">
                                                <a href="<?= \CFile::GetPath($arCert['DETAIL_PICTURE'] ?: $arCert['PREVIEW_PICTURE']) ?>" class="certificate-box" data-fancybox="certificate">
                                                    <img src="<?= \CFile::GetPath($arCert['PREVIEW_PICTURE'] ?: $arCert['DETAIL_PICTURE']) ?>" alt="<?= $arCert['NAME'] ?>" loading="lazy">
                                                </a>
                                            </div>
                                        <? endforeach; ?>
                                    </div>
                                </div>
                            <? endif; ?>
                            <? if ($arResult['DETAIL_TEXT']) : ?>
                                <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab" tabindex="0">
                                    <div class="box-text">
                                        <?= $arResult['DETAIL_TEXT'] ?>
                                    </div>
                                </div>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>