<?php
//echo '<pre>'; var_dump($arResult); echo '</pre>';
if (!empty($arResult['ITEMS'])) {
    $sections = [['NAME' => 'Все', 'CODE' => 'ALL', 'SECTION_PAGE_URL' => '/proekty/']];
    $filter = ['IBLOCK_ID' => $arResult['ID'], 'ACTIVE' => 'Y'];
    $select = ['ID', 'NAME', 'CODE', 'SECTION_PAGE_URL', 'ELEMENT_CNT'];
    $db_res = \CIBlockSection::GetList(['SORT' => 'ASC'], $filter, true, $select);

    while ($arSection = $db_res->Fetch()) {
        if (($arSection['ELEMENT_CNT'] <= 0)) continue;
        if (!$sections[$arSection['ID']]) {
            $activeSection = array_search($arSection['CODE'], array_column($arResult['SECTION']['PATH'], 'CODE'));
            $sections[] = [
                'NAME' => $arSection['NAME'],
                'CODE' => $arSection['CODE'],
                'SECTION_PAGE_URL' => \CIBlock::ReplaceSectionUrl($arSection['SECTION_PAGE_URL'], $arSection, true, 'S'),
                'ACTIVE' => $activeSection !== false
            ];
        }
    }

    $this->__component->arResult['SECTIONS'] = $sections;
    $this->__component->SetResultCacheKeys(['SECTIONS']);

    if ($arResult['ID'] == 2) {
        foreach ($arResult['ITEMS'] as $key => $arItem) {
            $arResult['ITEMS'][$key]['DESCR'] = TruncateText(HTMLToTxt($arItem["PREVIEW_TEXT"]), 200);
            $arResult['ITEMS'][$key]['DATE'] = $arItem['DISPLAY_ACTIVE_FROM'];
            $arResult['ITEMS'][$key]['IMG_SRC'] = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width' => 610, 'height' => 460), BX_RESIZE_IMAGE_EXACT)['src'];
        }
    }
}
