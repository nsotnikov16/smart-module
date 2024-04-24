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

    <section class="reviews">
        <div class="container">
            <div class="row align-items-center">
                <? if ($arParams['TITLE']): ?>
                    <div class="col-12 col-md-6">
                        <h2><?= $arParams['TITLE'] ?></h2>
                    </div>
                <? endif; ?>
                <div class="col-12 col-md-6">
                    <div class="slider-nav slider-nav-end reviews-slider-nav"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="reviews-slider">
                        <? foreach ($arResult['ITEMS'] as $arItem): ?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="slide">
                                <a href="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" class="reviews-slider__item"
                                   data-fancybox="reviews-photo" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                    <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt=""loading="lazy"/>
                                </a>
                            </div>
                        <? endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>