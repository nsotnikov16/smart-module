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

<div class="row">
    <div class="col-12">
        <div class="calculate-wrapper mb-65">
            <form method="post" class="form-calculate">
                <? foreach ($arResult['PROPERTIES'] as $prop) : ?>
                    <input type="hidden" name="<?= $prop['CODE'] ?>" value="<?= $prop['VALUE'] ?>">
                <? endforeach; ?>
                <div class="row">
                    <div class="col-12 col-lg-7 mb-40">
                        <div class="form-calculate-box">
                            <h3>Выбор материала:</h3>
                        </div>
                        <div class="row">
                            <? if (!empty($arResult['MATERIALS'])) : ?>
                                <? foreach ($arResult['MATERIALS'] as $k => $arMaterial) : ?>
                                    <div class="col-12 col-sm-6 mb-20">
                                        <label class="label-checkbox" for="checkid<?= $arMaterial['ID'] ?>">
                                            <input type="radio" name="material" id="checkid<?= $arMaterial['ID'] ?>" <?= $k == 0 ? 'checked' : '' ?> value="<?= $arMaterial['PROPERTY_COEF_VALUE'] ?>" data-name="<?= $arMaterial['NAME'] ?>" />
                                            <span class="label-checkbox__custom"></span>
                                            <span class="label-checkbox__text"><?= $arMaterial['NAME'] ?>
                                                <a href="javascript:void(0)" class="btn-toolip-default" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="top" title="<?= $arMaterial['PREVIEW_TEXT'] ?>">?</a></span>
                                            <span class="label-checkbox__image align-items-start justify-content-end">
                                                <img src="<?= CFile::GetPath($arMaterial['PREVIEW_PICTURE']) ?>" alt="<?= $arMaterial['NAME'] ?>" loading="lazy" />
                                            </span>
                                        </label>
                                    </div>
                                <? endforeach ?>
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 col-xl-4 offset-xl-1 mb-40">
                        <div class="form-calculate-box">
                            <h3>Вариант исполнения:</h3>
                            <div class="row">
                                <div class="col-12 col-sm-6 mb-20">
                                    <label class="label-checkbox">
                                        <input type="radio" name="variant-ispoln" checked value="1" data-name="Стандарт" />
                                        <span class="label-checkbox__custom"></span>
                                        <span class="label-checkbox__text">Стандарт</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-6 mb-20">
                                    <label class="label-checkbox">
                                        <input type="radio" name="variant-ispoln" value="1.85" data-name="Север" />
                                        <span class="label-checkbox__custom"></span>
                                        <span class="label-checkbox__text">Север</span>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="slider-range-box">
                                        <div class="slider-range-box__head">
                                            <p>Количество блоков:</p>
                                            <input type="text" name="kolvo-blokov" class="slider-range-box__input dec3" value="6" readonly />
                                        </div>
                                        <div class="slider-range-box__body">
                                            <div class="slider-range slider-range3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-green btn-calculate-modal">
                            рассчитать
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal modal-v2 fade" id="calcModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">Обратный звонок</div>
                <div class="modal-description">
                    <p>Оставте заявку и наш оператор свяжется с Вами в течении 2х минут</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="form-callback" id="calcFB" novalidate name="fb-calc">
                    <p id="calc-messageform" class="mb-3 text-center"></p>
                    <input type="hidden" name="calc-material" value="">
                    <input type="hidden" name="calc-variant-ispoln" value="">
                    <input type="hidden" name="calc-kolvo-blokov" value="">
                    <input type="hidden" name="calc-stoimost" value="">
                    <input type="hidden" name="calc-vmestimost2" value="">
                    <input type="hidden" name="calc-vmestimost1" value="">
                    <input type="hidden" name="calc-srok" value="">
                    <input type="hidden" name="calc-ploshad" value="">
                    <div class="row">
                        <div class="col-12 mb-20">
                            <label>
                                <input type="text" placeholder="Ваше имя" name="name">
                            </label>
                        </div>
                        <div class="col-12 mb-20">
                            <label>
                                <input type="text" placeholder="Ваш телефон" name="phone" required="">
                            </label>
                        </div>
                        <div class="col-12 mb-20">
                            <button type="submit" class="btn btn-accent w-100">
                                Отправить
                            </button>
                        </div>
                        <div class="col-12">
                            <label class="label-checkbox">
                                <input type="checkbox" name="check" checked="">
                                <span class="label-checkbox__custom"></span>
                                <span class="label-checkbox__text">Согласие на обработку персональных данных</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>