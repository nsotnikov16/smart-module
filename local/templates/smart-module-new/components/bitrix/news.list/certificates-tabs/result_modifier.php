<?php
if (!empty($arResult['ITEMS'])) {

    $sections = ['ALL' => ['NAME' => 'Все', 'ITEMS' => $arResult['ITEMS']]];

    $db_res = CIBlockElement::GetElementGroups(
        array_column($arResult['ITEMS'], 'ID'),
        false,
        ['ID', 'NAME', 'IBLOCK_ELEMENT_ID']
    );

    while ($arSection = $db_res->Fetch()) {
        if (!$sections[$arSection['ID']]) $sections[$arSection['ID']] = ['NAME' => $arSection['NAME'], 'ITEMS' => []];
        $index = array_search(
            $arSection['IBLOCK_ELEMENT_ID'],
            array_column($arResult['ITEMS'], 'ID')
        );
        $sections[$arSection['ID']]['ITEMS'][$arSection['IBLOCK_ELEMENT_ID']] = $arResult['ITEMS'][$index];
    }

    if (count($sections) > 1) unset($sections['ALL']);

    $this->__component->arResult['SECTIONS'] = $sections;
    $this->__component->SetResultCacheKeys(['SECTIONS']);
}
