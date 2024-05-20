<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

if ($arResult['DETAIL_PICTURE']['SRC'] && ($fspritepath = \CFile::GetPath($arResult['PROPERTIES']['FULL_SPRITE']['VALUE']))) {
	Asset::getInstance()->addString('
	<script>
	(function(){
	try {
		window.spritespinObj = {
			min: "' . $arResult['DETAIL_PICTURE']['SRC'] . '",
			big: "' . $fspritepath . '"
		}
	} catch (error) {
		
	}})()
	</script>');
}


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

if (!$arResult['DETAIL_PICTURE']['SRC']) {
	$arResult['DETAIL_PICTURE']['SRC'] = ASSETS_PATH . '/img/noimage_400x300.jpg';
}

if (!is_array($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'])) $arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'] = [];

array_unshift($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'], $arResult['PREVIEW_PICTURE']['ID']);

if (!empty($arResult['PROPERTIES']['ADV_PROD']['VALUE'])) {
	foreach ($arResult['PROPERTIES']['ADV_PROD']['VALUE'] as $id) {
		$filter = ['IBLOCK_ID' => 58, '=ID' => $id];
		$select = ['NAME', 'PREVIEW_PICTURE', 'DETAIL_PICTURE'];
		$arr = \CIBlockElement::GetList([], $filter, false, false, $select)->Fetch();
		$arr['PREVIEW_PICTURE'] = \CFile::GetPath($arr['PREVIEW_PICTURE']);
		$arr['DETAIL_PICTURE'] = \CFile::GetPath($arr['DETAIL_PICTURE']);
		$arResult['PROPERTIES']['ADV_PROD']['ITEMS'][] = $arr;
	}
}

$infoProps = ['FLOOR', 'MATERIAL', 'MODIFICATION', 'TYPE', 'BLOCKS'];
$arResult['PRODUCT_INFO'] = [];
foreach ($infoProps as $propCode) {
	$arrProp = $arResult['PROPERTIES'][$propCode];
	if (!empty($arrProp['VALUE'])) {
		$arResult['PRODUCT_INFO'][] = ['NAME' => $arrProp['NAME'], 'VALUE' => implode(', ', $arrProp['VALUE'])];
	}
}
