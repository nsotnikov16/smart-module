<?
//if($USER->isAdmin()){	echo"<pre>";print_r($arResult);echo"</pre>";	}	
CModule::IncludeModule("iblock");
foreach($arResult['ITEMS'] as $key => $value)
{
    $res = CIBlockSection::GetByID($value["~IBLOCK_SECTION_ID"]);
    if($ar_res = $res->GetNext()) $CODE = $ar_res['CODE'];
    $DETAIL_PAGE_URL_RAW = explode('/', $value["DETAIL_PAGE_URL"]);
    $DETAIL_PAGE_URL_RAW[2] = $CODE;
    $DETAIL_PAGE_URL = implode('/', $DETAIL_PAGE_URL_RAW); 
    $arResult['ITEMS'][$key]['DETAIL_PAGE_URL'] = $DETAIL_PAGE_URL;
}
?>