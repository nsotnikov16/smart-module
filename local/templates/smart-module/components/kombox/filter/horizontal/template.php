<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(method_exists($this, 'setFrameMode'))
	$this->setFrameMode(true);?>
<?if($arResult['ITEMS_COUNT_SHOW'] == 0): // скрытие фильтра при отсутствии активных пунктов?>
<script>
$("document").ready(function(){
    $("#filter_header").hide();
	$("#filter_header_mobile").hide();
});
</script>
<?endif?>
<?
if(count($arResult['ELEMENTS']) > 1 && $arResult["ITEMS_COUNT_SHOW"]):
$arParams['MESSAGE_ALIGN'] = isset($arParams['MESSAGE_ALIGN']) ? $arParams['MESSAGE_ALIGN'] : 'LEFT';
$arParams['MESSAGE_TIME'] = intval($arParams['MESSAGE_TIME']) >= 0 ? intval($arParams['MESSAGE_TIME']) : 5;

include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/functions.php");

CJSCore::Init(array("ajax", "popup"));
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.filter.js");
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/ion.rangeSlider.js");
$APPLICATION->AddHeadScript("/bitrix/js/kombox/filter/jquery.cookie.js");
$cntClosedProperty = 0;
?>
<style>
.kombox-filter-submit{
	position: sticky;
    bottom: 0;
    background: white;
	box-shadow: 0px -5px 5px -5px rgba(0, 0, 0, 0.5);
    padding-top: 10px !important;
	z-index: 2;
	padding-bottom: 10px !important;
	}
.kombox-filter-submit input{
	    margin-top: -7px;
		width: 48%;
    margin-right: 2%;
	    height: 39px !important;
	}
.mysidebar #kombox-filter .kombox-fields{
	padding-top:47px !important;}	
.mysidebar #kombox-filter .lvl1.kombox-column:first-child{
	margin-top:-47px;
	
	}		
</style>	
<?// echo "<pre>"; print_r($arResult); echo "</pre>";?>
<div class="kombox-filter" id="kombox-filter">
	<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get"<?if($arResult['IS_SEF']):?> data-sef="yes"<?endif;?>>
		<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input
				type="hidden"
				name="<?echo $arItem["CONTROL_NAME"]?>"
				id="<?echo $arItem["CONTROL_ID"]?>"
				value="<?echo $arItem["HTML_VALUE"]?>"
			/>
		<?endforeach;?>
		<div class="kombox-fields typography">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?if($arItem['SETTINGS']['VIEW'] == "SLIDER" && $arItem['CODE'] != 'PRICE'):?>
				<?if($arItem["CLOSED"])$cntClosedProperty++;?>
					<?if(isset($arItem["VALUES"]["MIN"]["VALUE"]) && isset($arItem["VALUES"]["MAX"]["VALUE"]) && $arItem["VALUES"]["MAX"]["VALUE"] > $arItem["VALUES"]["MIN"]["VALUE"]):?>
					<div class="lvl1 kombox-column<?if($arItem["CLOSED"]):?> kombox-closed<?endif;?>" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>">
						<div class="kombox-filter-property-head kombox-middle">
							<span class="kombox-filter-property-name"><?echo $arItem["NAME"]?></span>
							<?if(strlen($arItem['HINT'])):?>
							<span class="kombox-filter-property-hint"></span>
							<div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
							<?endif;?>
							<span class="for_modef"></span>
						</div>
						<?komboxShowField($arItem);?>
					</div>
					<?endif;?>
				<?endif;?>
			<?endforeach;?>

			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?if(!empty($arItem["VALUES"]) && $arItem['SETTINGS']['VIEW'] != "SLIDER"):?>
				<?if($arItem["CLOSED"])$cntClosedProperty++;?>
				<div class="lvl1 kombox-column<?if($arItem["CLOSED"]):?> kombox-closed<?endif;?>" data-id="<?echo $arItem["CODE_ALT"].'-'.$arItem["ID"]?>"<?if($arItem["CLOSED"]):?> style="display:none;"<?endif;?>>
					<!--<div class="kombox-filter-property-head">
						<span class="kombox-filter-property-name"><?echo $arItem["NAME"]?></span>
						<?if(strlen($arItem['HINT'])):?>
						<span class="kombox-filter-property-hint"></span>
						<div class="kombox-filter-property-hint-text"><?echo $arItem['HINT']?></div>
						<?endif;?>
						<span class="for_modef"></span>
					</div>-->
					<div class="select-title" data-property-name="<?echo $arItem["NAME"]?>">
						<?
						$selected = array();
						foreach($arItem["VALUES"] as $val => $ar) {
							if ($ar["CHECKED"]) {
								$selected[] = $ar["VALUE"];
							}
						}
						echo (count($selected) > 0) ? implode(", ", $selected) : $arItem["NAME"];
						?>

					</div>
					<?komboxShowField($arItem);?>
					<div class="kombox-clear">&nbsp;</div>
				</div>
				<?endif;?>
			<?endforeach;?>
			<div class="kombox-clear" style="display:none">&nbsp;</div>
			<div class="kombox-filter-submit">
               <div class="kombox-filter-submit-cont">

				<input style="display:block;" type="submit" id="set_filter" value="<?=GetMessage("KOMBOX_CMP_FILTER_SET_FILTER")?>" />

				<a href="<?=$arResult["DELETE_URL"]?>" class="kombox-del-filter" style="font-size: 12px;border: 1px solid #6989ad;color: #6989ad;padding: 4px 20px;width: 50%;margin-right: 0px;"><?=GetMessage("KOMBOX_CMP_FILTER_DEL_FILTER")?></a>

				<?/*
				<input type="clear" id="clear_filter" value="Сбросить">
				*/?>
				</div>
			</div>
			<div class="kombox-clear" style="display: block; height:0px">&nbsp;</div>
		</div>
		<div class="modef" id="modef" style="display:none">
			<div class="modef-wrap">
				<?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_COUNT", array("#ELEMENT_COUNT#" => '<span id="modef_num">'.intval($arResult["ELEMENT_COUNT"]).'</span>'));?>
				<a href="<?echo $arResult["FILTER_URL"]?>"><?echo GetMessage("KOMBOX_CMP_FILTER_FILTER_SHOW")?></a>
				<span class="ecke"></span>
			</div>
		</div>
	</form>
</div>
<script>
	$(function(){
		komboxFilterJsInit();
		$('#kombox-filter').komboxHorizontalSmartFilter({
			ajaxURL: '<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>',
			urlDelete: '<?echo CUtil::JSEscape($arResult["DELETE_URL"])?>',
			align: '<?echo $arParams['MESSAGE_ALIGN']?>',
			modeftimeout: <?echo $arParams['MESSAGE_TIME']?>,
			columns: <?echo intval($arParams['COLUMNS']) > 0 ? intval($arParams['COLUMNS']) : 3;?>
		});
	});
</script>

<?endif;?>
