<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//echo "<pre>"; print_r($arResult); echo "</pre>";

foreach($arResult["MESSAGE"] as $itemID=>$itemValue)
	echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"OK"));
foreach($arResult["ERROR"] as $itemID=>$itemValue)
	echo ShowMessage(array("MESSAGE"=>$itemValue, "TYPE"=>"ERROR"));

if($arResult["ALLOW_ANONYMOUS"]=="N" && !$USER->IsAuthorized()):
	echo ShowMessage(array("MESSAGE"=>GetMessage("CT_BSE_AUTH_ERR"), "TYPE"=>"ERROR"));
else:
	?>
	<div class="subscribe">
		<form action="<?=$arResult["FORM_ACTION"]?>" method="post">
			<?echo bitrix_sessid_post();?>
			<input type="hidden" name="PostAction" value="<?echo ($arResult["ID"]>0? "Update":"Add")?>" />
			<input type="hidden" name="ID" value="<?=$arResult["SUBSCRIPTION"]["ID"];?>" />
			<input type="hidden" name="RUB_ID[]" value="0" />
			<input type="hidden" name="FORMAT" value="html" />
		
			<div class="title">
				Подпишитесь на новые статьи от компании Смарт-модуль
				<!--<?=GetMessage("CT_BSE_SUBSCRIPTION_FORM_TITLE")?>-->
			</div>

			<div class="form">
				<?foreach($arResult["RUBRICS"] as $itemID => $itemValue):?>
					<!-- class="rubric-desc" -->
					<div>
						<input type="hidden" id="RUBRIC_<?=$itemID?>" name="RUB_ID[]" value="<?=$itemValue["ID"]?>" checked />
						<!-- <?=$itemValue["DESCRIPTION"]?> -->
					</div>
				<?endforeach;?>
				<div class="subscribe__emailRow">
					<input class="subscribe__email" type="text" name="EMAIL" value="<?=$arResult["SUBSCRIPTION"]["EMAIL"]!="" ? $arResult["SUBSCRIPTION"]["EMAIL"] : $arResult["REQUEST"]["EMAIL"];?>" placeholder="Ваш email" />
					<input class="subscribe__submitBtn" type="submit" name="Save" value=""/><!-- value="<?=GetMessage("CT_BSE_BTN_ADD_SUBSCRIPTION")?>" -->
				</div>
				<div class="privacy">
					<div class="privacy__inner">
						<input class="privacy__check" id="privacy__check" type="checkbox" name="privacy_policy" required checked>
						<label class="privacy__label" for="privacy__check"></label>
					</div>
					<a href="/politika-konfidentsialnosti/" target="_blank">Даю согласие на обработку персональных данных</a>
				</div>
			</div>
			
			<!-- <div class="agree">
				Оставляя свои личные данные, вы соглашаетесь с <a href="/politika-konfidentsialnosti/" target="_blank">Политикой конфиденциальности</a>
			</div> -->
		</form>
	</div>
<?endif;?>