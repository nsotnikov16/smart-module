<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * Дополнительные услуги
 */
$arResult['ADD_SERVICES'] = array();

$res_sections = Bitrix\Iblock\SectionTable::getList(array(
	'select'  => array("ID", "CODE", "NAME", "PICTURE", "DETAIL_PICTURE"),
	'filter'  => array("IBLOCK_ID" => 3),
	'order'   => array("SORT" => "DESC")
));

while ($row = $res_sections->fetch()) {
	$arResult['ADD_SERVICES'][$row['ID']] = $row;
}

$res_el = Bitrix\Iblock\ElementTable::getList(array(
	'select'  => array("ID", "CODE", "IBLOCK_SECTION_ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE"),
	'filter'  => array("IBLOCK_ID" => 3),
	'order'   => array("SORT" => "DESC")
));

while ($row = $res_el->fetch()) {
	$arResult['ADD_SERVICES'][$row['IBLOCK_SECTION_ID']]['ELEMENTS'][] = $row;
}


if(empty($arResult["ITEMS"]["0"]))

global $_SESSION;
if (!empty($_SESSION['CITY']['ID']) && in_array($_SESSION['CITY']['ID'], $arResult['PROPERTIES']['CITY']['VALUE'])) 
{
	if (!defined("ERROR_404"))
	define("ERROR_404", "Y");
	\CHTTP::setStatus("404 Not Found");
	if ($APPLICATION->RestartWorkarea())
	{
		require(\Bitrix\Main\Application::getDocumentRoot() . "/404.php");
		die();
	}
}
?>