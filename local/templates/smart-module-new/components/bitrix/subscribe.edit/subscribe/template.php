<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="col-12 col-sm-6 col-md-4 mb-20" id="subscribe">
	<div class="subscribe-box">
		<? foreach ($arResult["MESSAGE"] as $itemID => $itemValue)
			echo ShowMessage(array("MESSAGE" => $itemValue, "TYPE" => "OK"));
		foreach ($arResult["ERROR"] as $itemID => $itemValue)
			echo ShowMessage(array("MESSAGE" => $itemValue, "TYPE" => "ERROR"));

		if ($arResult["ALLOW_ANONYMOUS"] == "N" && !$USER->IsAuthorized()) :
			echo ShowMessage(array("MESSAGE" => GetMessage("CT_BSE_AUTH_ERR"), "TYPE" => "ERROR"));
		else : ?>
			<div class="subscribe-box__title">Подпишитесь на новые статьи
				от компания Смарт-модуль</div>
			<form method="post" class="form-subscribe" action="<?= $arResult["FORM_ACTION"] . '#subscribe' ?>">
				<? echo bitrix_sessid_post(); ?>
				<input type="hidden" name="PostAction" value="<? echo ($arResult["ID"] > 0 ? "Update" : "Add") ?>" />
				<input type="hidden" name="ID" value="<?= $arResult["SUBSCRIPTION"]["ID"]; ?>" />
				<input type="hidden" name="RUB_ID[]" value="0" />
				<input type="hidden" name="FORMAT" value="html" />
				<? foreach ($arResult["RUBRICS"] as $itemID => $itemValue) : ?>
					<input type="hidden" id="RUBRIC_<?= $itemID ?>" name="RUB_ID[]" value="<?= $itemValue["ID"] ?>" checked />
				<? endforeach ?>
				<div class="form-group">
					<label>
						<input type="email" placeholder="Ваш email" name="EMAIL" required value="<?= $arResult["SUBSCRIPTION"]["EMAIL"] != "" ? $arResult["SUBSCRIPTION"]["EMAIL"] : $arResult["REQUEST"]["EMAIL"]; ?>">
					</label>
					<button type="submit" class="btn btn-green"><svg class="svg-icon">
							<use xlink:href="#ASSETS_PATH#/img/sprite.svg#subscribe-icon"></use>
						</svg></button>
				</div>
				<label class="label-checkbox">
					<input type="checkbox" name="privacy_policy" id="privacy_policy" checked>
					<span class="label-checkbox__custom"></span>
					<span class="label-checkbox__text">Даю согласие на обработку <a target="_blank" href="/politika-konfidentsialnosti/">персональных данных</a></span>
				</label>
			</form>
		<? endif; ?>
	</div>
</div>