<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Для решения SEO умного фильтра: мета-теги, заголовки, карта сайта
 */
global $sotbitFilterResult;
$sotbitFilterResult = $arResult;

if (is_array($arResult['ELEMENTS']) && count($arResult['ELEMENTS']) > 1 && $arResult["ITEMS_COUNT_SHOW"]) {
    $arParams['MESSAGE_ALIGN'] = isset($arParams['MESSAGE_ALIGN']) ? $arParams['MESSAGE_ALIGN'] : 'LEFT';
    $arParams['MESSAGE_TIME'] = intval($arParams['MESSAGE_TIME']) >= 0 ? intval($arParams['MESSAGE_TIME']) : 5;

    //include($_SERVER["DOCUMENT_ROOT"] . $templateFolder . "/functions.php");

    CJSCore::Init(array("ajax", "popup"));
    $APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.filter.js");
    $APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/ion.rangeSlider.js");
    $APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.cookie.js");
}

if (!empty($arResult['ITEMS'])) {
    $showPanelFilter = false;
    foreach ($arResult['ITEMS'] as $key => $arItem) {
        if (empty($arItem['VALUES'])) continue;
        $isChecked = false;
        foreach ($arItem['VALUES'] as $arValue) {
            if ($arValue['CHECKED']) {
                $isChecked = true;
                $showPanelFilter = true;
                break;
            }
        }
        if ($isChecked) $arResult['ITEMS'][$key]['IS_SHOW'] = true;
    }
    if ($showPanelFilter) $arResult['SHOW_PANEL'] = true;
}
