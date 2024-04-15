<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="contacts-page">
	#WF_SEO_TEXT_1#
	<div class="feedback">
		<div class="row">
			<div class="large-12 medium-12 small-12 columns">
				<div class="title">
					Форма обратной связи
				</div>
			</div>
		</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:form.result.new",
			"",
			array(
				"AJAX_MODE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_SHADOW" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"CACHE_TIME" => "3600",
				"CACHE_TYPE" => "A",
				"CHAIN_ITEM_LINK" => "",
				"CHAIN_ITEM_TEXT" => "",
				"EDIT_URL" => "",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"LIST_URL" => "",
				"SEF_MODE" => "N",
				"SUCCESS_URL" => "",
				"USE_EXTENDED_ERRORS" => "Y",
				"VARIABLE_ALIASES" => array("WEB_FORM_ID" => "WEB_FORM_ID", "RESULT_ID" => "RESULT_ID",
				),
				"WEB_FORM_ID" => "3"
			)
		); ?>
	</div>
</div>
<br>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>