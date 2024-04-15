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
<div class="list">
	<div class="row">
		<?foreach($arResult["ITEMS"] as $arItem):
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="large-4 medium-6 small-12 columns" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="item">
					<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["DETAIL_PICTURE"])):
						$image = CFile::ResizeImageGet($arItem["DETAIL_PICTURE"], array('width'=>610, 'height'=>460), BX_RESIZE_IMAGE_EXACT);
						?>
						<div class="image">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
								<img src="<?=$image["src"]?>" alt="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>" />
							</a>
						</div>
					<?endif?>
					<div class="bottom">
						<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
							<div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
						<?endif?>
						<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
							<a class="name" href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
						<?endif;?>
						<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
							<?=TruncateText(HTMLToTxt($arItem["PREVIEW_TEXT"]), 200);?>
						<?endif;?>
						<div class="more">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">Читать полностью >></a>
						</div>
					</div>
				</div>
			</div>
			<?if ($APPLICATION->GetCurPage() =='/proekty/'):?>
<style>
.large-4{
	height: 500px;
}
</style>
<?endif;?>
		<?endforeach;?>
	</div>
	<div class="clearfix"></div>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<div class="paginate">
			<?=$arResult["NAV_STRING"]?>
		</div>
	<?endif;?>
</div>

<script>
	$(function() {
		$('.cols.show-more').remove()
	})
</script>
