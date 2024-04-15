<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

/*  $arSelect = array();
    $arFilter = Array(
        "IBLOCK_ID" => 4,
        "ACTIVE_DATE"=>"Y",
        "ACTIVE"=>"Y"
    );
    $res = CIBlockElement::GetList(Array(), $arFilter, false, "", $arSelect);
    $conractors = array();
    while($ob = $res->GetNextElement()){
        $arFields = $ob->GetFields();
        $conractors[$arFields['ID']] = $arFields['NAME'];
    }*/

if(isset($_POST['city'])){
$arOrder = array();
$arFilter = array("IBLOCK_ID" => 4, "ACTIVE" => "Y", "ACTIVE_DATE"=>"Y", array(
        "LOGIC" => "OR",
        array("NAME" => "%".$_POST['city']."%"),
        array("PROPERTY_WF_REGION_VALUE" => "%".$_POST['city']."%"),
    ));
$arSelectFields = array();
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array('ID', 'NAME',  'PROPERTY_WF_REGION',  'PROPERTY_WF_SUBDOMAIN'));
?>

<?
$mass_region = [];
$mass_city = [];
while($ob = $res->GetNextElement())
{
	   $arFields = $ob->GetFields();	
	if($arFields['PROPERTY_WF_REGION_VALUE'] != ''){	
	$mass_region[] = $arFields['PROPERTY_WF_REGION_VALUE'];	}
 
	
	$mass_city[] = array('city' => $arFields['NAME'], 'region' => $arFields['PROPERTY_WF_REGION_VALUE'],'link' => $arFields['PROPERTY_WF_SUBDOMAIN_VALUE']);
    //echo '<li><a href="https://'.$arFields['PROPERTY_WF_SUBDOMAIN_VALUE'].'.smart-module.ru">'.$arFields['NAME'].'</li>';
}
$mass_region = array_unique($mass_region);

foreach ($mass_region as $item){
		echo '<ul class="all-city-block">';
		echo '<div class="h2">'.$item.'</div>';
		foreach ($mass_city as $city){
			if($city['region'] == $item){
			if($city['link'] != ''){
				$city['link'] = $city['link'].'.';
				}
			
			echo '<li><a href="https://'.$city['link'].'smart-module.ru">'.$city['city'].'</a></li>';
			}
			}
			
			
		echo '</ul>';
	}
}


if(isset($_POST['region'])){
	$arOrder = array();
$arFilter = array("IBLOCK_ID" => 4, "ACTIVE" => "Y", "ACTIVE_DATE"=>"Y", "PROPERTY_WF_REGION_VALUE" => $_POST['region']);
$arSelectFields = array();
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array('ID', 'NAME',  'PROPERTY_WF_REGION',  'PROPERTY_WF_SUBDOMAIN'));

echo '<ul class="all-city-block">';
echo '<div class="h2">'.$_POST['region'].'</div>';
while($ob = $res->GetNextElement())
{    $arFields = $ob->GetFields();
	if($arFields['PROPERTY_WF_REGION_VALUE'] != ''){	
	$mass_region[] = $arFields['PROPERTY_WF_REGION_VALUE'];	}


    //echo '<li><a href="https://'.$arFields['PROPERTY_WF_SUBDOMAIN_VALUE'].'.smart-module.ru">'.$arFields['NAME'].'</li>';

	
			
			if($arFields['PROPERTY_WF_SUBDOMAIN_VALUE'] != ''){
				$arFields['PROPERTY_WF_SUBDOMAIN_VALUE'] = $arFields['PROPERTY_WF_SUBDOMAIN_VALUE'].'.';}
			
			echo '<li><a href="https://'.$arFields['PROPERTY_WF_SUBDOMAIN_VALUE'].'smart-module.ru">'.$arFields['NAME'].'</a></li>';
}
	echo '</ul>';
	
	}
	
	
if(isset($_POST['allregion'])){
	$arOrder = array();
$arFilter = array("IBLOCK_ID" => 4, "ACTIVE" => "Y", "ACTIVE_DATE"=>"Y", "PROPERTY_WF_REGION_VALUE" => '');
$arSelectFields = array();
$res = CIBlockElement::GetList($arOrder, $arFilter, false, false, array('ID', 'NAME',  'PROPERTY_WF_REGION',  'PROPERTY_WF_SUBDOMAIN'));
$mass_region = [];
echo '<ul class="all-city-block all-region-mobile">';
while($ob = $res->GetNextElement())
{
	 $arFields = $ob->GetFields();
	$mass_region[] = $arFields['PROPERTY_WF_REGION_VALUE'];
	
	
}

$mass_region = array_unique($mass_region);
foreach($mass_region as $item){
	
	echo '<li><span>'.$item.'</span></li>';
	}
	echo '</ul>';
	
	}	
	
?>
