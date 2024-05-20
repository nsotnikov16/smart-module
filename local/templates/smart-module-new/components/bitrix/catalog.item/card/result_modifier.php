<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!empty($arResult['ITEM'])) {
    $arItem = $arResult['ITEM'];
    if (isset($arItem['PREVIEW_PICTURE']['ID'])) {
        $arResult['ITEM']['MAIN_IMG_SRC'] = \CFile::ResizeImageGet(
            $arItem['PREVIEW_PICTURE'],
            array('width' => 355, 'height' => 220),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        )['src'];
    } else {
        $arResult['ITEM']['MAIN_IMG_SRC'] = ASSETS_PATH . "/img/noimage_355x220.jpg";
    }
}
