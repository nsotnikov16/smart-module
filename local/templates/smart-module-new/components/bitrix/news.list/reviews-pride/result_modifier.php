<?php

if (!empty($arResult['ITEMS'])) {
    $arResult['ITEMS'] = array_filter($arResult['ITEMS'], function ($item) {
        return $item['PREVIEW_PICTURE']['SRC'];
    });
}