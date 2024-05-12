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
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs nav-tabs-v2" role="tablist">
                <? foreach ($arResult['SECTIONS'] as $id => $arSection) : ?>
                    <li class="nav-item" role="presentation">
                        <a href="<?= $arSection['SECTION_PAGE_URL'] ?>" class="nav-link <?= $arSection['ACTIVE'] ? 'active' : '' ?>"><?= $arSection['NAME'] ?></a>
                    </li>
                <? endforeach; ?>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active">
                    <div class="row">
                        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
                            <?
                            $this->AddEditAction(
                                $arItem['ID'],
                                $arItem['EDIT_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")
                            );
                            $this->AddDeleteAction(
                                $arItem['ID'],
                                $arItem['DELETE_LINK'],
                                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
                            );
                            ?>
                            <div class="col-12 col-sm-6 col-md-4 mb-20">
                                <div class="blog-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="blog-card__img"><img src="<?= $arItem['IMG_SRC'] ?>" alt="" loading="lazy"></a>
                                    <div class="blog-card__body">
                                        <? if ($arItem['DATE']) : ?>
                                            <div class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                <span><?= $arItem['DATE'] ?></span>
                                            </div>
                                        <? endif; ?>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="blog-card__title"><?= $arItem['NAME'] ?></a>
                                        <? if ($arItem['DESCR']) : ?>
                                            <div class="box-text">
                                                <?= $arItem['DESCR'] ?>
                                            </div>
                                        <? endif; ?>
                                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="text-decoration color-accent blog-card__link">Читать полностью >></a>
                                    </div>
                                </div>
                            </div>
                        <? endforeach; ?>
                        <?
                        if ($arResult['ID'] == 6) : ?>
                            <div class="col-12 col-sm-6 col-md-4 mb-20">
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:subscribe.edit",
                                    "subscribe",
                                    array(
                                        "AJAX_MODE" => "N",
                                        "SHOW_HIDDEN" => "N",
                                        "ALLOW_ANONYMOUS" => "Y",
                                        "SHOW_AUTH_LINKS" => "N",
                                        "CACHE_TYPE" => "N",
                                        "CACHE_TIME" => "3600",
                                        "SET_TITLE" => "N",
                                        "AJAX_OPTION_JUMP" => "N",
                                        "AJAX_OPTION_STYLE" => "N",
                                        "AJAX_OPTION_HISTORY" => "N",
                                        "COMPONENT_TEMPLATE" => ".default",
                                        "AJAX_OPTION_ADDITIONAL" => "",
                                        "COMPOSITE_FRAME_MODE" => "A",
                                        "COMPOSITE_FRAME_TYPE" => "AUTO"
                                    ),
                                    false
                                ); ?>
                            </div>
                        <? endif; ?>
                        <? if ($arParams['DISPLAY_BOTTOM_PAGER']) : ?>
                            <?= $arResult["NAV_STRING"] ?>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? endif; ?>