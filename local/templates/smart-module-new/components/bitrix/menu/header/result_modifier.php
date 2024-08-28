<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

if (!empty($arResult)) {
    foreach ($arResult as $key => $arItem) {
        if ($arItem['PARAMS']['UF_NAME_TOP_MENU']) $arResult[$key]['TEXT'] = $arItem['PARAMS']['UF_NAME_TOP_MENU'];
        if ($arItem['PARAMS']['UF_ICONMENU']) {
            $arPhotoSmall = CFile::ResizeImageGet(
                $arItem['PARAMS']['UF_ICONMENU'],
                array(
                    'width' => 26,
                    'height' => 37
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                array(
                    "name" => "sharpen",
                    "precision" => 0
                )
            );
            $arResult[$key]['IMG_SRC'] = $arPhotoSmall['src'];
        }
    }

    // Для фиксированной шапки в компонент добавляем исключения по урл
    // Если элемент меню в ссылке имеет данное исключение, то убираем из arResult
    if (is_array($arParams['EXCLUDED']) && !empty($arParams['EXCLUDED'])) {
        $this->__component->arResult = array_filter($arResult, function ($arItem) use ($arParams) {
            $ok = true;
            foreach ($arParams['EXCLUDED'] as $ex) {
                if (str_contains($arItem['LINK'], $ex)) $ok = false;
            }
            return $ok;
        });
    }
}

