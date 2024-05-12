<?php
$arFilterPopular = ['IBLOCK_ID' => $arResult['IBLOCK_ID'], '!ID' => $arResult['ID']];
$arSelectPopular = ['ID', 'NAME', 'ACTIVE_FROM', 'DETAIL_PICTURE', 'DETAIL_PAGE_URL'];
$db_popular = CIBlockElement::GetList(['date_active_from' => 'desc'], $arFilterPopular, false, ['nTopCount' => 3], $arSelectPopular);
$populars = [];
while ($popular = $db_popular->Fetch()) :
    $populars[] = [
        'IMG_SRC' => CFile::GetPath($popular['DETAIL_PICTURE']),
        'DATE' => date('d.m.Y', MakeTimeStamp($popular["ACTIVE_FROM"])),
        'NAME' => $popular['NAME'],
        'DETAIL_PAGE_URL' => \CIblock::ReplaceDetailUrl($popular['DETAIL_PAGE_URL'], $popular, true, 'E')
    ];
endwhile;
$arResult['POPULARS'] = $populars;
$this->__component->SetResultCacheKeys(['POPULARS']);
