<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

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

if(!empty($_SESSION['CITY']['ID']))
{
	foreach ($arResult as $key => $value) 
	{
		$iden = explode("/", $value['LINK']);
		if(!empty($iden[2]))
		{
			$res = CIBlockSection::GetList(Array("ID" => "ASC"), Array("IBLOCK_ID"=>1, "CODE"=>$iden[2]), false, Array("ID"), Array("nPageSize"=>1));
			while($ob = $res->Fetch())
			{
				$count_all = CIBlockSection::GetSectionElementsCount($ob['ID'], Array("CNT_ACTIVE"=>"Y")); // всего элементов
				$count_in = CIBlockSection::GetSectionElementsCount($ob['ID'], Array("PROPERTY" => Array("CITY"=>[ $_SESSION['CITY']['ID'] ]))); // скрытых элементов
				if($count_all == $count_in && $count_in != 0)
				{
					$arParams['INCLUDED'][ $ob['ID'] ] = $iden[2];
					unset($arResult[$key]);
				}
			}
		}
	}
}
?>