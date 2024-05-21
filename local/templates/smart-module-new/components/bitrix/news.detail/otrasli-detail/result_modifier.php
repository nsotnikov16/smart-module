<?

if (!empty($arResult['PROPERTIES']['ADVANTAGES']['VALUE'])) {
    $adv_images = [];
    if (is_array($arResult['PROPERTIES']['ADVANTAGES_IMG']['VALUE'])) {
        $adv_images = $arResult['PROPERTIES']['ADVANTAGES_IMG']['VALUE'];
    }

    foreach ($arResult['PROPERTIES']['ADVANTAGES']['VALUE'] as $key => $item) {
        if (!$arResult['PROPERTIES']['ADVANTAGES']['ITEMS']) $arResult['PROPERTIES']['ADVANTAGES']['ITEMS'] = [];
        $arResult['PROPERTIES']['ADVANTAGES']['ITEMS'][$key] = [
            'NAME' => $item,
            'DESCRIPTION' => $arResult['PROPERTIES']['ADVANTAGES']['DESCRIPTION'][$key],
            'IMG_SRC' => \CFile::GetPath($adv_images[$key])
        ];
    }
}

$GLOBALS['otrasliFilter'] = ['ID' => false]; // Для блока "Это может вам понравиться"
if (!empty($arResult['PROPERTIES']['PRODUCTS']['VALUE'])) {
    $GLOBALS['otrasliFilter'] = ['=ID' => $arResult['PROPERTIES']['PRODUCTS']['VALUE']];
}
