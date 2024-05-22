<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$arResult['MATERIALS'] = [];
$arSelect = array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE", "PROPERTY_COEF");
$arFilter = array("IBLOCK_ID" => 65, "ACTIVE" => "Y");
$db_res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while($arr = $db_res->Fetch()) {
    $arResult['MATERIALS'][] = $arr;
}
