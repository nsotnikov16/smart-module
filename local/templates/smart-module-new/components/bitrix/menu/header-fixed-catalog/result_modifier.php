<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
// -----ПЕРЕНОС-------
// фильтр по городам, если в разделе все твоары исключены по свойству - этот раздел не выводим
$iden = explode(".", $_SERVER['HTTP_HOST']); 
$city_code = $iden[0]; // получаем код города
if(!empty($city_code)) // и если он есть
{
	$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID"=>4, "PROPERTY_WF_SUBDOMAIN"=>$city_code), false, Array(), Array("ID"));
	if($ob = $res->Fetch())
	{
		global $arrFilter, $_SESSION;
		$arrFilter = Array(
			array("!ID" => \CIBlockElement::SubQuery("ID", array("IBLOCK_ID" => 1, "PROPERTY_CITY" => $ob['ID'])))
		);
		$_SESSION['CITY']['ID'] = $ob['ID'];
	}
}
// -----ПЕРЕНОС-----

if (!empty($arResult)) {
    // Компонент только для каталога
    $arResult = array_filter($arResult, function ($arItem) {
        return str_contains($arItem['LINK'], '/catalog/') && $arItem['DEPTH_LEVEL'] > 1;
    });

    foreach ($arResult as $key => $arItem) {
        if ($arItem['PARAMS']['UF_NAME_TOP_MENU']) $arResult[$key]['TEXT'] = $arItem['PARAMS']['UF_NAME_TOP_MENU'];
        if ($arItem['PARAMS']['UF_ICONMENU']) {
            $arPhotoSmall = CFile::ResizeImageGet(
                $arItem['PARAMS']['UF_ICONMENU'],
                array(
                    'width' => 26,
                    'height' => 37
                ),
                BX_RESIZE_IMAGE_PROPORTIONAL,
                array(
                    "name" => "sharpen",
                    "precision" => 0
                )
            );
            $arResult[$key]['IMG_SRC'] = $arPhotoSmall['src'];
        }
    }
}

