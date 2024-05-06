<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$aMenuLinksExt = [];
if (CModule::IncludeModule('iblock')) {
	$otrasli_iblock = \CIBlock::GetList([], ['CODE' => 'otrasli'], false)->Fetch();
	$filter_otrasli =  ['IBLOCK_ID' => $otrasli_iblock['ID'], 'ACTIVE' => 'Y'];
	$db_elements = \CIBlockElement::GetList([], $filter_otrasli, false, false, ['NAME', 'DETAIL_PAGE_URL', 'PROPERTY_TITLE_IN_MENU']);

	while ($arr = $db_elements->Fetch())
		$aMenuLinksExt[] = [
			$arr['PROPERTY_TITLE_IN_MENU_VALUE'] ?: $arr['NAME'],
			\CIBlock::replaceDetailUrl(
				$arr['DETAIL_PAGE_URL'],
				$arr,
				true,
				'E'
			) . '/',
			[],
			[],
			''
		];
}

$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
