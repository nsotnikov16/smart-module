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
$this->setFrameMode(true);?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if(strlen($INPUT_ID) <= 0)
	$INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if(strlen($CONTAINER_ID) <= 0)
	$CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if($arParams["SHOW_INPUT"] !== "N"):?>
	<div class="search_block " id="<?echo $CONTAINER_ID?>">
		<div class="box">
			<form role="search" method="get" class="search-form open" action="<?echo $arResult["FORM_ACTION"]?>">
				<label for="">
					<input type="search" class="search-field" placeholder="" value="" name="q" id="<?echo $INPUT_ID?>" autocomplete="off">
					<input type="submit" class="search-submit desktop" value="Поиск">
					<button class="search-submit mobile" type="submit"><img src="<?=SITE_TEMPLATE_PATH?>/images/right-chevron.png" alt=""></button>
				</label>
			</form>
		</div>
		<?//$APPLICATION->ShowViewContent('searchnew');?>
		<?//213?>
	</div>
<?endif?>
<script>
	BX.ready(function(){
		new JCTitleSearch({
			'AJAX_PAGE' : '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
			'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
			'INPUT_ID': '<?echo $INPUT_ID?>',
			'MIN_QUERY_LEN': 2
		});
	});
</script>

<script>
$(document).ready(function(){         
     var pathname = window.location.pathname;
	 console.log (pathname);
     if(pathname.indexOf('search') > -1){
        $(".box-title").addClass('box-title-off');
     }     
});

</script>