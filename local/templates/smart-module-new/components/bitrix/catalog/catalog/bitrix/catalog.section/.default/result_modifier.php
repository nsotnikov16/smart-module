<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(empty($arResult["ITEMS"]["0"]))
{
    global $_SESSION;
    // проверяем в активных элементах свойство исключения
    $arFilter = Array("IBLOCK_ID"=>$arResult['ORIGINAL_PARAMETERS']["IBLOCK_ID"], "SECTION_ID"=>$arResult["ORIGINAL_PARAMETERS"]["SECTION_ID"], "ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array("ID" => "ASC"), $arFilter, false, Array(), Array("ID", "IBLOCK_ID", "PROPERTY_CITY"));
    while($ob = $res->Fetch())
    {
        if(!empty($_SESSION['CITY']['ID']) && $_SESSION['CITY']['ID'] == $ob['PROPERTY_CITY_VALUE'])
        {
			//LocalRedirect('/404.php',301);
            if (!defined("ERROR_404"))
            define("ERROR_404", "Y");
            \CHTTP::setStatus("404 Not Found");
            if ($APPLICATION->RestartWorkarea())
            {
                require(\Bitrix\Main\Application::getDocumentRoot() . "/404.php");
                die();
            }
            break;
        }
    }
}
?>