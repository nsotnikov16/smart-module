<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

//You may customize user card fields to display
$arResult['USER_PROPERTY'] = array(
    "UF_DEPARTMENT",
);

//Code below searches for appropriate icon for search index item.
//All filenames should be lowercase.

//1
//Check if index item is information block element with property DOC_TYPE set.
//This property should be type list and we'll take it's values XML_ID as parameter
//iblock_doc_type_<xml_id>.png

//2
//When no such fle found we'll check for section attributes
//iblock_section_<code>.png
//iblock_section_<id>.png
//iblock_section_<xml_id>.png

//3
//Next we'll try to detect icon by "extention".
//where extension is all a-z between dot and end of title
//iblock_type_<iblock type id>_<extension>.png

//4
//If we still failed. Try to match information block attributes.
//iblock_iblock_<code>.png
//iblock_iblock_<id>.png
//iblock_iblock_<xml_id>.png

//5
//If indexed item is section when checkj for
//iblock_section.png
//If it is an element when chek for
//iblock_element.png

//6
//If item belongs to main module (static file)
//when check is done by it's extention
//main_<extention>.png

//7
//For blog module we'll check if icon for post or user exists
//blog_post.png
//blog_user.png

//8, 9 and 10
//forum_message.png
//intranet_user.png
//socialnetwork_group.png

//11
//In case we still failed to find an icon
//<module_id>_default.png

//12
//default.png

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
                        "=ID" => $arItem["ITEM_ID"],
                        "IBLOCK_ID" => $arItem["PARAM2"],
                    ),
                        false, false, array(
                            "ID",
                            "IBLOCK_ID",
                            "CODE",
                            "XML_ID",
                            "PROPERTY_DOC_TYPE",
                        )
                    );
                    $arElement = $rsElement->Fetch();
                    if ($arElement && $arElement["PROPERTY_DOC_TYPE_ENUM_ID"] <> '') {
                        $arEnum = CIBlockPropertyEnum::GetByID($arElement["PROPERTY_DOC_TYPE_ENUM_ID"]);
                        if ($arEnum && $arEnum["XML_ID"]) {
                            if (file_exists($abs_path . "iblock_doc_type_" . mb_strtolower($arEnum["XML_ID"]) . ".png"))
                                $file = "iblock_doc_type_" . mb_strtolower($arEnum["XML_ID"]) . ".png";
                        }
                    }

                } else {
                    $SECTION_ID = $arItem["ITEM_ID"];
                }

                //If no element icon was found. We'll take chances with section
                if (!$file && $SECTION_ID) {
                    $filter = ["=ID" => $SECTION_ID, "IBLOCK_ID" => $arItem["PARAM2"]];
                    $rsSection = CIBlockSection::GetList([], $filter, false, ['UF_ICONMENU']);
                    if ($arSection = $rsSection->Fetch()) {
                        if ($arSection['UF_ICONMENU']) {
                            $file = \CFile::GetPath($arSection['UF_ICONMENU']);
                        }
                    }
                }
            }
            break;
    }


    if ($file) $arResult["SEARCH"][$i]["ICON"] = $file;
}

?>