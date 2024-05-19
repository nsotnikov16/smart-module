<?//echo '<pre>'; var_dump($arResult['NAV_RESULT']); echo '</pre>';?>

<? if (!empty($arResult['ITEMS'])) : ?>
    <div class="row" data-products-container>
        <? if ($_GET['ajax'] == 'Y') $APPLICATION->RestartBuffer(); ?>
        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
            $photos = $arItem['PROPERTIES']['PHOTOS']['VALUE'];
            ?>
            <div class="col-12 col-sm-6 col-md-4 mb-30 product-item">
                <div class="recommended-products-card" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="recommended-products-card__show">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="recommended-products-card__title"><?= $arItem['NAME'] ?></a>
                        <div class="recommended-products-card__nav">
                            <? if (!empty(array_keys($arItem["DISPLAY_PROPERTIES"]))) : ?>
                                <? $propsJson = json_encode(array_keys($arItem["DISPLAY_PROPERTIES"])) ?>
                                <a href="javascript:void(0)" class="recommended-products-card__info" data-id="<?= $arItem['ID'] ?>" data-get-props='<?= $propsJson ?>'></a>

                                <div data-product-info class="recommended-products-card__hidden">
                                    <? // Здесь контент грузится аяксом (см. файл ajax.php в директории)
                                    ?>
                                    Загрузка...
                                </div>
                            <? endif; ?>
                            <? if ($arItem["PROPERTIES"]["FULL_SPRITE"]["VALUE"] > 0) : ?>
                                <a href="javascript:void(0)" class="recommended-products-card__3d" data-bs-toggle="tooltip" data-bs-custom-class="custom-tooltip" data-bs-placement="left" title="Посмотреть в 3D"></a>
                            <? endif; ?>
                        </div>
                        <div class="product-slider">
                            <div class="recommended-products-image-slider">
                                <div class="slide">
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="recommended-products-card__img">
                                        <img src="<?= $arItem['MAIN_IMG_SRC'] ?>" alt="<?= $arItem['NAME'] ?>" loading="lazy" />
                                    </a>
                                </div>
                                <? if (!empty($photos)) : ?>
                                    <? foreach ($photos as $photoId) : ?>
                                        <? $imgPhoto =  CFile::ResizeImageGet($photoId, array('width' => 355, 'height' => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                                        <div class="slide">
                                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="recommended-products-card__img">
                                                <img src="<?= $imgPhoto['src'] ?>" alt="<?= $arItem['NAME'] ?>" loading="lazy" />
                                            </a>
                                        </div>
                                    <? endforeach; ?>
                                <? endif; ?>
                            </div>

                            <div class="product-pagination-image">
                                <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" data-index="0" class="active" onmouseenter="paginationImageMouseEnter(this)"></a>
                                <? foreach ($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $k => $photo) : ?>
                                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" data-index="<?= $k + 1 ?>" onmouseenter="paginationImageMouseEnter(this)"></a>
                                <? endforeach ?>
                            </div>
                        </div>

                        <div class="price-wrapper">
                            <div class="price">Цена:
                                <? if ((intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) == 0)) : ?>
                                    По запросу
                                <? else : ?>
                                    <?= $arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ?> руб.
                                <? endif; ?>
                            </div>
                        </div>
                        <a href="#" class="btn btn-green recommended-products-card__btn" data-bs-toggle="modal" data-bs-target="#orderModal" data-base-price="<?= intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) ?>" data-product-id="<?= $arItem['ID'] ?>">Купить</a>
                    </div>
                </div>
            </div>
        <? endforeach; ?>

        <div class="no-products">
            <? if ($arResult['NAV_RESULT']->NavPageNomer < $arResult['NAV_RESULT']->NavPageCount) : ?>
                <div class="col-12">
                    <a href="javascript:void(0)" class="btn btn-loader btn-accent" data-show-more-catalog>Показать еще</a>
                </div>
            <? endif; ?>

            <? if ($arParams['DISPLAY_BOTTOM_PAGER'] == "Y") : ?>
                <?= $arResult['NAV_STRING'] ?>
            <? endif ?>
            <? if ($_GET['ajax'] == 'Y') die(); ?>
        </div>


    </div>
    <script>
        window.catalogSectionAjaxPropsPath = '<?= $templateFolder ?>/ajax.php'
    </script>
<? endif; ?>