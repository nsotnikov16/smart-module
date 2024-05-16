<?
if (!function_exists('getWebflyCatalogTopText')) {
    function getWebflyCatalogTopText()
    {
        if (!\CModule::IncludeModule('webfly.seocities')) return;
        $arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_WF_CATALOG_TOP_TEXT");
        $arFilter = array("IBLOCK_CODE" => WF_SEO_IBLOCK, "ACTIVE" => "Y", "NAME" => strtok($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], '?'));

        $res = \CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect)->Fetch();
        

        return $res['PROPERTY_WF_CATALOG_TOP_TEXT_VALUE'] ? $res['PROPERTY_WF_CATALOG_TOP_TEXT_VALUE']['TEXT'] : '';
    }
}
