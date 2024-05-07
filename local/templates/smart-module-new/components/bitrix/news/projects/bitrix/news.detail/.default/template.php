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
<div class="row">
    <? if (!empty($arResult['PHOTOS'])) : ?>
        <div class="col-12 col-lg-7">
            <div class="project-sliders-wrapper">
                <div class="projects-slider-preview">
                    <? foreach ($arResult['PHOTOS'] as $photo) : ?>
                        <div class="slide">
                            <div class="projects-slider__item">
                                <span class="image-border"></span>
                                <img src="<?= $photo ?>" loading="lazy" />
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
                <div class="projects-slider-max">
                    <? foreach ($arResult['PHOTOS'] as $photo) : ?>
                        <div class="slide">
                            <a href="<?= $photo ?>" data-fancybox="project-gallery" class="projects-slider__item">
                                <img src="<?= $photo ?>" alt="" loading="lazy" />
                            </a>
                        </div>
                    <? endforeach ?>
                </div>
            </div>
        </div>
    <? endif; ?>
    <div class="col-12 col-lg-5 mb-35">
        <div class="project-information">
            <? if ($deadline = $arResult['DISPLAY_PROPERTIES']['SROKI_REALIZACII']['VALUE']) : ?>
                <div class="project-information-box">
                    <div class="project-information-box__icon"><img src="#ASSETS_PATH#/img/clock.svg" alt="" loading="lazy" /></div>
                    <div class="project-information-box__text">
                        <p>Сроки реализации:</p>
                        <p><strong><?= $deadline ?></strong></p>
                    </div>
                </div>
            <? endif; ?>
            <? if ($square = $arResult['DISPLAY_PROPERTIES']['OBCHAYA_PLOTHAT']['VALUE']) : ?>
                <div class="project-information-box">
                    <div class="project-information-box__icon"><img src="#ASSETS_PATH#/img/vector.svg" alt="" loading="lazy" /></div>
                    <div class="project-information-box__text">
                        <p>Общая площадь:</p>
                        <p><strong><?= $square ?></strong></p>
                    </div>
                </div>
            <? endif; ?>
            <? if ($customer = $arResult['DISPLAY_PROPERTIES']['ZAKAZCHIK']['VALUE']) : ?>
                <div class="project-information-box">
                    <div class="project-information-box__icon"><img src="#ASSETS_PATH#/img/man.svg" alt="" loading="lazy" /></div>
                    <div class="project-information-box__text">
                        <p>Заказчик:</p>
                        <p><strong><?= $customer ?></strong></p>
                    </div>
                </div>
            <? endif; ?>

            <a href="#" class="btn btn-green btn-order-project" data-bs-toggle="modal" data-bs-target="#orderModal">Заказать похожий
                проект</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="table-wrapper" data-preview-table>
            <?= $arResult["~PREVIEW_TEXT"] ?>
        </div>
    </div>
</div>

<? if ($arResult['DISPLAY_PROPERTIES']['MAP']['DISPLAY_VALUE']) : ?>
    <section class="project-location" data-project-map>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-center mb-30">Проект на карте</h2>
                    <div class="project-location__map">
                        <?= $arResult['DISPLAY_PROPERTIES']['MAP']['DISPLAY_VALUE'] ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>