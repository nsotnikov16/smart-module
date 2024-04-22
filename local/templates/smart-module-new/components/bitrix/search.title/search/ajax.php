<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult["CATEGORIES"]) && $arResult['CATEGORIES_ITEMS_EXISTS']): ?>
    <div class="title-search-result">
        <? foreach ($arResult["CATEGORIES"] as $category_id => $arCategory): ?>
            <? foreach ($arCategory["ITEMS"] as $i => $arItem): ?>
                <? if ($category_id === "all") continue; ?>
                <a class="search-wrapper-result-item" href="<? echo $arItem["URL"] ?>">
                    <? if ($arItem['ICON']): ?>
                        <span class="search-wrapper-result-item__img">
                            <img src="<?= $arItem['ICON']; ?>" loading="lazy"/>
                        </span>
                    <? endif; ?>
                    <span class="search-wrapper-result-item__title"><span
                                class="color-accent font-700"><?= $arItem["NAME"] ?></span>
                </a>
            <? endforeach; ?>
        <? endforeach; ?>
    </div>
<? endif; ?>