<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (empty($arResult["ITEMS"]["0"])) {
    global $_SESSION;
    // проверяем в активных элементах свойство исключения
    $arFilter = array("IBLOCK_ID" => $arResult['ORIGINAL_PARAMETERS']["IBLOCK_ID"], "SECTION_ID" => $arResult["ORIGINAL_PARAMETERS"]["SECTION_ID"], "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(array("ID" => "ASC"), $arFilter, false, array(), array("ID", "IBLOCK_ID", "PROPERTY_CITY"));
    while ($ob = $res->Fetch()) {
        if (!empty($_SESSION['CITY']['ID']) && $_SESSION['CITY']['ID'] == $ob['PROPERTY_CITY_VALUE']) {
            //LocalRedirect('/404.php',301);
            if (!defined("ERROR_404"))
                define("ERROR_404", "Y");
            \CHTTP::setStatus("404 Not Found");
            if ($APPLICATION->RestartWorkarea()) {
                require(\Bitrix\Main\Application::getDocumentRoot() . "/404.php");
                die();
            }
            break;
        }
    }
}

if (!empty($arResult['ITEMS'])) {
    foreach ($arResult['ITEMS'] as $key => $arItem) {
        if (isset($arItem['PREVIEW_PICTURE']['ID'])) {
            $arResult['ITEMS'][$key]['MAIN_IMG_SRC'] = \CFile::ResizeImageGet(
                $arItem['PREVIEW_PICTURE'],
                array('width' => 355, 'height' => 220),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true
            )['src'];
        } else {
            $arResult['ITEMS'][$key]['MAIN_IMG_SRC'] = ASSETS_PATH . "/img/noimage_355x220.jpg";
        }
    }
}
