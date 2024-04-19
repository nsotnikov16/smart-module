<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

if (!empty($arResult)) {
    // Компонент только для каталога
    $arResult = array_filter($arResult, function ($arItem) {
        return str_contains($arItem['LINK'], '/catalog/') && $arItem['DEPTH_LEVEL'] > 1;
    });

    foreach ($arResult as $key => $arItem) {
        if ($arItem['PARAMS']['UF_NAME_TOP_MENU']) $arResult[$key]['TEXT'] = $arItem['PARAMS']['UF_NAME_TOP_MENU'];
        if ($arItem['PARAMS']['UF_ICONMENU']) {
            $arPhotoSmall = CFile::ResizeImageGet(
                $arItem['PARAMS']['UF_ICONMENU'],
                array(
                    'width' => 26,
                    'height' => 37
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                array(
                    "name" => "sharpen",
                    "precision" => 0
                )
            );
            $arResult[$key]['IMG_SRC'] = $arPhotoSmall['src'];
        }
    }
}

