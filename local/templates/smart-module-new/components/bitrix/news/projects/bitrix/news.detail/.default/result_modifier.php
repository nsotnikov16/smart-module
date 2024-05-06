<?
$first = $arResult['DETAIL_PICTURE']['SRC'] ?: $arResult['PREVIEW_PICTURE']['SRC'];
$arResult['PHOTOS'] = $first ? [$first] : [];
if (!empty($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'])) {
    foreach ($arResult['PROPERTIES']['MORE_PHOTO']['VALUE'] as $key => $value) {
        $arResult['PHOTOS'][] = \CFile::GetPath($value);
    }

    $this->__component->SetResultCacheKeys(['PHOTOS']);
}
?>