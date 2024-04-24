<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//You may customize user card fields to display
$arResult['USER_PROPERTY'] = array(
    "UF_DEPARTMENT",
);

$arIBlocks = array();

$image_path = $this->GetFolder() . "/images/";
$abs_path = $_SERVER["DOCUMENT_ROOT"] . $image_path;

$arResult["SEARCH"] = array();
foreach ($arResult["CATEGORIES"] as $category_id => $arCategory) {
    foreach ($arCategory["ITEMS"] as $i => $arItem) {
        if (isset($arItem["ITEM_ID"]))
            $arResult["SEARCH"][] = &$arResult["CATEGORIES"][$category_id]["ITEMS"][$i];
    }
}

foreach ($arResult["SEARCH"] as $i => $arItem) {
    $file = false;
    $src = false;
    $SECTION_ID = 0;

    switch ($arItem["MODULE_ID"]) {
        case "iblock":
            if (mb_substr($arItem["ITEM_ID"], 0, 1) === "G") {
                if (file_exists($abs_path . "socialnetwork_group.png"))
                    $file = "socialnetwork_group.png";
            } elseif (CModule::IncludeModule('iblock')) {
                if (!array_key_exists($arItem["PARAM2"], $arIBlocks))
                    $arIBlocks[$arItem["PARAM2"]] = CIBlock::GetArrayByID($arItem["PARAM2"]);

                //section /element
                if (mb_substr($arItem["ITEM_ID"], 0, 1) !== "S") {
                    //Try to find gif by element proprety value xml id
                    $rsElement = CIBlockElement::GetList(array(), array(
                        "=ID" => mb_substr($arItem["ITEM_ID"], 1),
                        "IBLOCK_ID" => $arItem["PARAM2"],
                    ),
                        false, false, array(
                            "ID",
                            "PREVIEW_PICTURE"
                        )
                    );
                    $arElement = $rsElement->Fetch();

                    if ($arElement['PREVIEW_PICTURE']) $file = $arElement['PREVIEW_PICTURE'];

                } else {
                    $SECTION_ID = mb_substr($arItem["ITEM_ID"], 1);
                    $filter = ["=ID" => $SECTION_ID, 'IBLOCK_ID' => $arItem["PARAM2"], '!UF_ICONMENU' => false];
                    $rsSection = CIBlockSection::GetList([], $filter, false, ['ID', 'UF_ICONMENU'])->Fetch();
                    $file = $rsSection['UF_ICONMENU'];
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
            }
            break;
    }

    if ($src) $arResult["SEARCH"][$i]["ICON"] = $src;
}

?>