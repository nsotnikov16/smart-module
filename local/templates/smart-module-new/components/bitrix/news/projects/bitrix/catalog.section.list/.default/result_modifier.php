<?
if (!empty($arResult['SECTIONS'])) {
    $order = ['id' => 'desc'];
    $filter = [
        'IBLOCK_ID' => $arParams['IBLOCK_ID'],
        'SECTION_ID' => array_column($arResult['SECTIONS'], 'ID'),
        'ACTIVE' => 'Y'
    ];
    $select = [
        'NAME',
        'IBLOCK_SECTION_ID',
        'PROPERTY_SROKI_REALIZACII',
        'PROPERTY_OBCHAYA_PLOTHAT',
        'PREVIEW_PICTIRE',
        'DETAIL_PICTURE',
        'DETAIL_PAGE_URL'
    ];
    $sections = [];
    $db_res = \CIBlockElement::GetList($order, $filter, false, false, $select);

    while ($arr = $db_res->Fetch()) {
        if (!$sections[$arr['IBLOCK_SECTION_ID']]) $sections[$arr['IBLOCK_SECTION_ID']] = [];
        $arr['PREVIEW_PICTURE'] ? $arr['PREVIEW_PICTURE'] = \CFile::GetPath($arr['PREVIEW_PICTURE']) : '';
        $arr['DETAIL_PICTURE'] ? $arr['DETAIL_PICTURE'] = \CFile::GetPath($arr['DETAIL_PICTURE']) : '';
        $arr['DETAIL_PAGE_URL'] = \CIBlock::ReplaceDetailUrl($arr['DETAIL_PAGE_URL'], $arr, true, 'E');
        $arr['PREVIEW_PICTURE'] = CFile::ResizeImageGet($arr['PREVIEW_PICTURE'], array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
        $arr['DETAIL_PICTURE'] = CFile::ResizeImageGet($arr['DETAIL_PICTURE'], array('width' => 200, 'height' => 200), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
        $sections[$arr['IBLOCK_SECTION_ID']][] = $arr;
    }

    foreach ($arResult['SECTIONS'] as $key => $arSection) {
        $arResult['SECTIONS'][$key]['ITEMS'] = $sections[$arSection['ID']];
    }

    $arResult['SECTIONS'] = array_filter($arResult['SECTIONS'], function ($arr) {
        return !empty($arr['ITEMS']);
    });
}
