<? if (!empty($arResult['ITEMS'])) : ?>
    <div class="row" data-products-container>
        <? if ($_GET['ajax'] == 'Y') $APPLICATION->RestartBuffer(); ?>
        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
            <div class="col-12 col-sm-6 col-md-4 mb-30 product-item">
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
<? endif; ?>