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
$this->setFrameMode(true); ?>
<? if (!empty($arResult['ITEMS'])) : ?>
    <section class="recommended-products p-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <? if ($arParams['TITLE']) : ?>
                        <h2><?= $arParams['TITLE'] ?></h2>
                    <? endif; ?>
                </div>
                <div class="col-12 col-md-6">
                    <div class="slider-nav slider-nav-end recommended-products-slider-nav"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="recommended-products-slider">
                        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
                            <div class="slide">
                                <?
                                $APPLICATION->IncludeComponent(
                                    'bitrix:catalog.item',
                                    'card',
                                    array(
                                        'RESULT' => array(
                                            'ITEM' => $arItem,
                                        ),
                                        'PARAMS' => $arParams
                                    ),
                                    $component,
                                    array('HIDE_ICONS' => 'Y')
                                );
                                ?>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>