<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"custom:menu.sections",
	"",
	Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "1",
		"DEPTH_LEVEL" => "2",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "360000"
	)
);


$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>