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
    <section class="reviews-pride">
        <div class="container">
            <div class="row">
                <? if ($arParams['TITLE']): ?>
                    <div class="col-12">
                        <h2 class="text-center mb-60"> <?= $arParams['TITLE'] ?></h2>
                    </div>
                <? endif; ?>

                <div class="col-12">
                    <div class="reviews-pride-slider">
                        <? foreach ($arResult['ITEMS'] as $arItem): ?>
                            <?
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                            ?>
                            <div class="slide">
                                <div class="reviews-pride-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                    <div class="reviews-pride-item__text <?= !$arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE'] ? 'visibility-hidden' : ''?>" >
                                        <div class="reviews-pride-item__name"><?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_NAME']['VALUE'] ?: '1'?></div>
                                        <div class="reviews-pride-item__position"><?= $arItem['DISPLAY_PROPERTIES']['AUTHOR_POST']['VALUE'] ?: '1'?></div>
                                    </div>
                                    <a href="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
                                       class="reviews-pride-item__photo" data-fancybox="reviews-photo"><img
                                                src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt="" loading="lazy"/></a>
                                </div>
                            </div>

                        <? endforeach; ?>
                    </div>
                    <div class="slider-nav reviews-pride-slider-nav"></div>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>