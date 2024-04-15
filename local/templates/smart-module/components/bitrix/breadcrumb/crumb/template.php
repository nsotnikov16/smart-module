<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn .= '<div class="breadcrumb">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++) {

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	
	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index).'"' : '');
	$child = ($index > 0? ' itemprop="child"' : '');
	$arrow = ($index > 0? '&gt;' : '');


 $Url=$APPLICATION->GetCurPage();
 $arUrl=explode('/', $Url);
 $arSelect = Array("ID", "NAME", "CODE");
 $arFilter = Array("IBLOCK_ID"=>array(1), '=CODE' => $arUrl[count($arUrl)-2]);
 $res = CIBlockSection::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
 while($ob = $res->GetNextElement())
 {
  $arFields = $ob->GetFields();
 }



	  if($index > 0) {
	    //$strReturn .= '';
	    $cutLink=explode("/", $arResult[$index]["LINK"]);
	    $cnt=count($cutLink);
	    $numSecNow=$cnt-2;
	    $secNow=$cutLink["$numSecNow"];
	  }
	  else $secNow="first";

 	  $iblock_id = 1; 
	  $custom_name = 'UF_TITLEBREAD'; 

	  
	  if(CModule::IncludeModule("iblock")){
	    $dbSection = CIBlockSection::GetList(
	      array("SORT"=>"ASC"),
	      array(
	        "IBLOCK_ID" => $iblock_id,
	        "CODE" => $secNow
	        ),
	      false,
	      array($custom_name)
	    );
	    if ($arSection = $dbSection->GetNext()){
	      $new_name = $arSection["$custom_name"];
	    }
	  }
	  $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	  if ($new_name) {
	    $name=$new_name;
	  }
	  else {
	    $name=$title;
	  }


	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<div class="path-link" id="bx_breadcrumb_'.($index).'" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"'.$child.$nextRef.' data-test="'.$new_name.'">
				'.$arrow.'
				<a href="'.$arResult[$index]["LINK"].'" title="'.$name.'" itemprop="url">
					<span itemprop="title">'.strtoupper(mb_substr($name, 0, 1)).strtolower(mb_substr($name, 1)).'</span>
				</a>
			</div>';
	} else {
		if($arFields){
			$strReturn .= '
				<div class="path-link" data-test="'.$new_name.'">
					'.$arrow.'
					<span>'.strtoupper(mb_substr($name, 0, 1)).strtolower(mb_substr($name, 1)).'</span>
				</div>';
		}else{
			$strReturn .= '
				<div class="path-link" data-test="'.$title.'">
					'.$arrow.'
					<span>'.strtoupper(mb_substr($title, 0, 1)).strtolower(mb_substr($title, 1)).'</span>
				</div>';
		}

	}
}

$strReturn .= '</div>';

return $strReturn;
?>