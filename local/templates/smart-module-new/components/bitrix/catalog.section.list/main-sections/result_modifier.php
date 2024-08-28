<?
if (!empty($arResult['SECTIONS'])) {
    $arResult['SECTIONS'] = array_filter($arResult['SECTIONS'], function ($section) use ($arParams) {
        return $section['UF_HIDE_LINK'] != 1 && !shouldHideSection($section['ID'], $arParams['IBLOCK_ID'], $GLOBALS['arrFilter'][0]);
    });
}