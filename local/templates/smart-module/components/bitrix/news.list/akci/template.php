<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?
if (isset($_COOKIE['SaleCookie'])){
	
	$today = $_COOKIE['SaleCookie'];

} else {
	
	$Date = date('d.m.Y H:i:s');
	$today = date('d.m.Y H:i:s', strtotime($Date. ' + 3 days'));
	
	setcookie("SaleCookie", $today, strtotime("+30 day"), "/", "smart-module.ru", 1);

}?>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<?
	$diff = abs(strtotime(date('d.m.Y H:i:s')) - strtotime($today));

	$days = floor($diff / (60*60*24));
	$hours = floor(($diff - $days * 60*60*24) / (60*60));
	$minutes = floor(($diff - $days * 60*60*24 - $hours * 60*60) / (60));
	$seconds = floor($diff - $days * 60*60*24 - $hours * 60*60 - $minutes * 60);
	?>
	<div class="promo_block">
		<p class="promo_title"><?=$arItem["PROPERTIES"]["TITLE"]["VALUE"]?> </p>
		<div class="timer_block">
			<?if(strtotime(date('d.m.Y H:i:s'))<strtotime($today)):?>
			<script type="text/javascript" data-skip-moving="true">
			(function(){var _id="6cd91e0e0899178fc878278f6dbfc92b";while(document.getElementById("timer"+_id))_id=_id+"0";document.write("<div id='timer"+_id+"' style='min-width:262px;height:64px;'></div>");var _t=document.createElement("script");_t.src="https://megatimer.ru/timer/timer.min.js";var _f=function(_k){
				var l=new MegaTimer(_id, {"view":[1,1,1,1],"type":{"currentType":"2","params":{
					"startByFirst":true,"days":"<?=$days?>","hours":"<?=$hours?>","minutes":"<?=$minutes?>","seconds":"<?=$seconds?>","utc":0
				}},"design":{"type":"circle","params":{"width":"2","radius":"29","line":"solid","line-color":"#507298","background":"solid","background-color":"#f9f9f9","direction":"direct","number-font-family":{"family":"Open Sans","link":"<link href='//fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"},"number-font-size":"14","number-font-color":"#000000","separator-margin":"0","separator-on":false,"separator-text":":","text-on":true,"text-font-family":{"family":"Open Sans","link":"<link href='//fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>"},"text-font-size":"14","text-font-color":"#000000"}},"designId":7,"theme":"white","width":262,"height":64});if(_k!=null)l.run();};_t.onload=_f;_t.onreadystatechange=function(){if(_t.readyState=="loaded")_f(1);};var _h=document.head||document.getElementsByTagName("head")[0];_h.appendChild(_t);}).call(this);
			</script>
			<?else:?>
				Акция окончена.
			<?endif;?>
		</div>
		
		<form action="" method="POST" id="form-timer">
			<input type="hidden" name="akcid" value="<?=$arItem["ID"]?>">
			<input type="hidden" name="akcname" value="<?=$arItem["NAME"]?>">
			<input type="text" class="p-popup__input" name="phone" placeholder="+7 (___) ___-__-__" id="akc-phone">
			<button class="promo_confirmation"><?=$arItem["PROPERTIES"]["TEXTBUTTON"]["VALUE"]?></button>
			<div class="p-popup__check sidebar__check">
				<input type="checkbox" id="checkid1" checked="checked" name="check">
				<label for="checkid1">
					Согласие на обработку <a href="#">персональных данных</a>
				</label>
			</div>
			<p class="content_timer"></p>
		</form>
	</div>
<?endforeach;?>
