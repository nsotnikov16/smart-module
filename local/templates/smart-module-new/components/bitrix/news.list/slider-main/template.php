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
<? if (!empty($arResult['ITEMS'])): ?>
    <div class="slider slider-main">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="slider-main-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>"
                         class="slider-main-item__img slider-main-item__img-mobile" loading="lazy"/>
                    <img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>"
                         class="slider-main-item__img slider-main-item__img-pc" loading="lazy"/>
                    <div class="par-text">
                        <div class="box bg">
                            <div class="main-ee-img">
                                <div class="screen-box-text">
                                    <span><?= $arItem['PROPERTIES']['TITLE']['~VALUE']['TEXT'] ?></span>
                                </div>
                                <?= $arItem['~PREVIEW_TEXT'] ?>
                                <a href="<?= $arItem['PROPERTIES']['LINK_BUTTON']['VALUE'] ?>"
                                   class="btn btn-accent btn-accent-black text-transform projects-card-box__btn"><span><?= $arItem['PROPERTIES']['TEXT_BUTTON']['VALUE'] ?></span>
                                    <span class="btn-icon btn-icon-arrow">
                                        <svg class="svg-icon">
												<use xlink:href="<?= SITE_TEMPLATE_PATH ?>/assets/img/sprite.svg#arrow-link"></use>
											</svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <div class="slider-nav slider-main-nav"></div>
<? endif; ?>
