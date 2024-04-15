<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 */

$this->setFrameMode(true);
$catalog_section_id = $arResult['ID'];
?>

<?foreach ($arResult['ITEMS'] as $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
	?>
<div class="product-box" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<div class="cols">
		<div class="col">
			<div class="product-title">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
			</div>
		</div>
	</div>
	<div class="cols">
		<div class="col">
			<div class="product-image">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
					<?
					if (isset($arItem['PREVIEW_PICTURE']['ID'])) {
						$main_image =  CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width'=>355, 'height'=>220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					} else {
						$main_image['src'] = SITE_TEMPLATE_PATH."/images/noimage_355x220.jpg";
					}
					?>
					<img src="<?=$main_image['src']?>" alt="<?=$arItem['NAME']?>">
				</a>
				<?if (count($arItem['DISPLAY_PROPERTIES']['PHOTOS']['VALUE']) > 0):?>
					<?foreach ($arItem['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'] as $photo):
						$image =  CFile::ResizeImageGet($photo, array('width'=>355, 'height'=>220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						?>
						<a href="<?=$arItem['DETAIL_PAGE_URL']?>">
							<img src="<?=$image['src']?>" alt="<?=$arItem['NAME']?>">
						</a>
					<?endforeach?>
				<?endif?>
			</div>
		</div>
		<div class="col">
			<div class="product-info">
				<table>
					<?
					$n = 0;
					$props = $arItem['DISPLAY_PROPERTIES'];
					unset($props['PHOTOS'], $props['PRICE']);
					$total = count($props);
					foreach ($props as $prop):
						$prop_value = (is_array($prop['DISPLAY_VALUE'])) ? implode(", ", $prop['DISPLAY_VALUE']) : $prop['DISPLAY_VALUE'];
						if (!empty($prop_value)):
							$total--;
							?>
							<?if ($n == 0):?>
								<tr>
							<?endif?>
								<td>
									<p><strong><?=$prop['NAME']?>:</strong>&nbsp;<?=$prop_value?></p>
								</td>
							<?if ($n % 2 && $total != 0):?>
								</tr>
								<tr>
							<?endif?>
							<?if($total == 0):?>
								<?if($n % 2 == 0):?>
										<td></td>
									</tr>
								<?else:?>
									</tr>
								<?endif?>
							<?endif?>
						<?endif?>
						<? $n++;
					endforeach;?>
				</table>
			</div>
			<div class="product-price">
				Стоимость:
				<?if((intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) == 0)):?>
					По запросу
				<?else:?>
					<span><?=$arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']?> руб.</span>
				<?endif;?>
			</div>
			<div class="product-box-footer">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="button border-button">
					подробнее
				</a>
				<a href="#order-popup" class="button js-fancy" data-base-price="<?=intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'])?>">
					оформить заказ
				</a>
			</div>
		</div>
	</div>
</div>

<?endforeach?>
<?/*
<div class="show-more">
	<a href="javascript:" onmousedown="loadMore(); return false" class=" btn show-more__button">
		Показать еще
	</a> 
</div>
<script>
var newsPagen = 2;
function loadMore(){

$.ajax({
method: 'POST',
data: { 
"section_id": <?=$catalog_section_id?>
},
url: '/catalog/more.php?PAGEN_1=' + newsPagen,
success: function(data){

$('.products').append(data);
newsPagen++;

}

});

}
</script>
<?if ($arParams['DISPLAY_BOTTOM_PAGER'] == "Y" && $arResult['NAV_RESULT']->NavPageCount > 1):?>
	<div class="paginate">
		<?=$arResult['NAV_STRING']?>
	</div>

<?endif*/?>