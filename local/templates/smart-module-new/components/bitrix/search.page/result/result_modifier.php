<?
if (!empty($arResult['SEARCH'])) {
    foreach ($arResult['SEARCH'] as $key => $arItem) {
        $file = false;
        $src = false;
        $SECTION_ID = 0;

        //section /element
        if (mb_substr($arItem["ITEM_ID"], 0, 1) !== "S") {
            $rsElement = CIBlockElement::GetList(
                array(),
                array(
                    "=ID" => $arItem['ITEM_ID'],
                    "IBLOCK_ID" => $arItem["PARAM2"],
                ),
                false,
                false,
                array(
                    "ID",
                    "PREVIEW_PICTURE"
                )
            );
            $arElement = $rsElement->Fetch();

            if ($arElement['PREVIEW_PICTURE']) $file = $arElement['PREVIEW_PICTURE'];
        } else {
            $SECTION_ID = mb_substr($arItem["ITEM_ID"], 1);
            $filter = ["=ID" => $SECTION_ID, 'IBLOCK_ID' => $arItem["PARAM2"]];
            $rsSection = CIBlockSection::GetList([], $filter, false, ['ID', 'UF_ICONMENU', 'DETAIL_PICTURE', 'PICTURE'])->Fetch();
            $file = $rsSection['UF_ICONMENU'] ?: $rsSection['PICTURE'] ?: $rsSection['DETAIL_PICTURE'];
        }

        //If no element icon was found. We'll take chances with section
        if ($file) {
            $arPhotoSmall = CFile::ResizeImageGet(
                $file,
                array(
                    'width' => 26,
                    'height' => 37
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                false,
                array(
                    "name" => "sharpen",
                    "precision" => 0
                )
            );
            $src = $arPhotoSmall['src'];
        }

        if ($src) $arResult['SEARCH'][$key]['ICON'] = $src;
    }
}
