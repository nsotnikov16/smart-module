<?
if (!empty($arResult['SECTIONS'])) {
    $arResult['SECTIONS'] = array_filter($arResult['SECTIONS'], function ($section) {
        return $section['UF_HIDE_LINK'] != 1;
    });
}