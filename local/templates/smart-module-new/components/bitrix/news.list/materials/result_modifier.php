<?
if (!empty($arResult['ITEMS'])) {
    $domain = 'smart-module.ru';
    foreach ($arResult['ITEMS'] as $key => $arItem) {
        if ($_SERVER['SERVER_NAME'] !== $domain) {
            $arResult['ITEMS'][$key]['DETAIL_PAGE_URL'] = 'https://' . $domain . $arItem['DETAIL_PAGE_URL'];
        }
    }
}
