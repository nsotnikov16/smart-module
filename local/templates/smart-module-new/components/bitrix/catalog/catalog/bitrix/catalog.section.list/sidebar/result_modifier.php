<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (!empty($arResult['SECTIONS'])) {
	foreach ($arResult['SECTIONS'] as $key => $arSection) {
		
		$arSelect = array('ID', 'NAME', 'SECTION_PAGE_URL', 'UF_TITLEMENU');
		$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID'], '=SECTION_ID' => $arSection["ID"], 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y');
		$res = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, true, $arSelect);
		$arSubSections = [];
		while ($ob = $res->GetNext()) 
			$arSubSections[] = $ob;

		$arResult['SECTIONS'][$key]['SUBSECTIONS'] = $arSubSections;
	}
}

if (is_array($arParams['SECTION_FILTER']) && count($arParams['SECTION_FILTER']) > 0) {
	// 6. Выбираем только нужные разделы
	foreach ($arResult['SECTIONS'] as $key => $arSection) {
		if (!in_array($arSection["ID"], $arParams['SECTION_FILTER'])) {
			unset($arResult['SECTIONS'][$key]);
		}
	}

	// 7. Получаем ссылку фильтра и дополняем её ссылку раздела
	$currentUrl = $_SERVER["REQUEST_URI"];
	if (strlen($currentUrl) > 0) {
		$explodedUrl = explode("/filter/", $currentUrl);
		if (isset($explodedUrl[1])) {
			foreach ($arResult['SECTIONS'] as $key => $arOneSection) {
				$arResult['SECTIONS'][$key]["SECTION_PAGE_URL"] = $arOneSection["SECTION_PAGE_URL"] . "filter/" . $explodedUrl[1];
			}
		}
	}
}
// фильтр по городам, если в разделе все твоары исключены по свойству - этот раздел не выводим
global $arrFilter, $_SESSION;
if (!empty($arrFilter["!PROPERTY_CITY"][0])) // $_SESSION['CITY']['ID']
{
	foreach ($arResult['SECTIONS'] as $key => $value) {
		$count_all = CIBlockSection::GetSectionElementsCount($value['ID'], array("CNT_ACTIVE" => "Y")); // всего элементов
		$count_in = CIBlockSection::GetSectionElementsCount($value['ID'], array("PROPERTY" => array("CITY" => [$arrFilter["!PROPERTY_CITY"][0]]))); // скрытых элементов
		if ($count_all == $count_in) unset($arResult['SECTIONS'][$key]);
	}
}
