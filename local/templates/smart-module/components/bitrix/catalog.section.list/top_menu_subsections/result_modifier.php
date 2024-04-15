<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arViewModeList = array('LIST', 'LINE', 'TEXT', 'TILE');

$arDefaultParams = array(
	'VIEW_MODE' => 'LIST',
	'SHOW_PARENT_NAME' => 'Y',
	'HIDE_SECTION_NAME' => 'N'
);

$arParams = array_merge($arDefaultParams, $arParams);

if (!in_array($arParams['VIEW_MODE'], $arViewModeList))
	$arParams['VIEW_MODE'] = 'LIST';
if ('N' != $arParams['SHOW_PARENT_NAME'])
	$arParams['SHOW_PARENT_NAME'] = 'Y';
if ('Y' != $arParams['HIDE_SECTION_NAME'])
	$arParams['HIDE_SECTION_NAME'] = 'N';

$arResult['VIEW_MODE_LIST'] = $arViewModeList;

if (0 < $arResult['SECTIONS_COUNT']) {
	if ('LIST' != $arParams['VIEW_MODE']) {
		$boolClear = false;
		$arNewSections = array();
		foreach ($arResult['SECTIONS'] as &$arOneSection) {
			if (1 < $arOneSection['RELATIVE_DEPTH_LEVEL']) {
				$boolClear = true;
				continue;
			}
			$arNewSections[] = $arOneSection;
		}
		unset($arOneSection);
		if ($boolClear) {
			$arResult['SECTIONS'] = $arNewSections;
			$arResult['SECTIONS_COUNT'] = count($arNewSections);
		}
		unset($arNewSections);
	}
}

if (0 < $arResult['SECTIONS_COUNT']) {
	$boolPicture = false;
	$boolDescr = false;
	$arSelect = array('ID');
	$arMap = array();
	if ('LINE' == $arParams['VIEW_MODE'] || 'TILE' == $arParams['VIEW_MODE']) {
		reset($arResult['SECTIONS']);
		$arCurrent = current($arResult['SECTIONS']);
		if (!isset($arCurrent['PICTURE'])) {
			$boolPicture = true;
			$arSelect[] = 'PICTURE';
		}
		if ('LINE' == $arParams['VIEW_MODE'] && !array_key_exists('DESCRIPTION', $arCurrent)) {
			$boolDescr = true;
			$arSelect[] = 'DESCRIPTION';
			$arSelect[] = 'DESCRIPTION_TYPE';
		}
	}
	if ($boolPicture || $boolDescr) {
		foreach ($arResult['SECTIONS'] as $key => $arSection) {
			$arMap[$arSection['ID']] = $key;
		}
		$rsSections = CIBlockSection::GetList(array(), array('ID' => array_keys($arMap)), false, $arSelect);
		while ($arSection = $rsSections->GetNext()) {
			if (!isset($arMap[$arSection['ID']]))
				continue;
			$key = $arMap[$arSection['ID']];
			if ($boolPicture) {
				$arSection['PICTURE'] = intval($arSection['PICTURE']);
				$arSection['PICTURE'] = (0 < $arSection['PICTURE'] ? CFile::GetFileArray($arSection['PICTURE']) : false);
				$arResult['SECTIONS'][$key]['PICTURE'] = $arSection['PICTURE'];
				$arResult['SECTIONS'][$key]['~PICTURE'] = $arSection['~PICTURE'];
			}
			if ($boolDescr) {
				$arResult['SECTIONS'][$key]['DESCRIPTION'] = $arSection['DESCRIPTION'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION'] = $arSection['~DESCRIPTION'];
				$arResult['SECTIONS'][$key]['DESCRIPTION_TYPE'] = $arSection['DESCRIPTION_TYPE'];
				$arResult['SECTIONS'][$key]['~DESCRIPTION_TYPE'] = $arSection['~DESCRIPTION_TYPE'];
			}
		}
	}
}

// скрытие пустых для этого города разделов
global $_SESSION;
if (!empty($_SESSION['CITY']['ID'])) {
	foreach ($arResult['SECTIONS'] as $key => $value) {
		$count_all = CIBlockSection::GetSectionElementsCount($value['ID'], array("CNT_ACTIVE" => "Y")); // всего элементов
		$count_in = CIBlockSection::GetSectionElementsCount($value['ID'], array("PROPERTY" => array("CITY" => [$_SESSION['CITY']['ID']]))); // скрытых элементов
		if ($count_all == $count_in) unset($arResult['SECTIONS'][$key]);
	}
}

// скрытие пункта из меню
foreach ($arResult['SECTIONS'] as $k => $arSection) :
	if($arSection['UF_HIDE_LINK'] == 1) unset($arResult['SECTIONS'][$k]);
endforeach;

//Работа с пользовательским полем раздела UF_CURRENT_TOP_MENU
$path = array_filter(explode('/', $APPLICATION->GetCurDir()), function ($value) {
	return $value != '';
});
$reqCode = $path[array_key_last($path)];
$currentSectionKey = array_search($reqCode, array_column($arResult['SECTIONS'], 'CODE'));

if ($currentSectionKey !== false) {
	foreach ($arResult['SECTIONS'][$currentSectionKey]['UF_CURRENT_TOP_MENU'] as $k => $v) :
		$arr = explode(', ', $v);
		$id = $arr[0];
		$newName = $arr[1];
		$findKeyForNewName = array_search($id, array_column($arResult['SECTIONS'], 'ID'));
		$arResult['SECTIONS'][$findKeyForNewName]['NAME'] = $newName;
	endforeach;
} else if ($arParams['arr_new_names'] && !empty($arParams['arr_new_names'])) {
	foreach ($arResult['SECTIONS'] as $k => $arSection) :
		if ($arParams['arr_new_names'][$arSection['ID']]) $arResult['SECTIONS'][$k]['NAME'] = $arParams['arr_new_names'][$arSection['ID']];
	endforeach;
}

//Передача массива $arResult в модуль "Сотбит: SEO умного фильтра – мета-теги, заголовки, карта сайта"
global $sotbitFilterResult;  
$sotbitFilterResult = $arResult;
?>