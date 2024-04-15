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

<? foreach ($arResult['ITEMS'] as $arItem) :
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
?>
	<div class="large-4 medium-6 columns" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
		<div class="product-item">
			<div class="product-title">
				<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><?= $arItem['NAME'] ?></a>
			</div>
			<div class="product-icons">
				<? if ($arItem["DISPLAY_PROPERTIES"] != "") : ?>
					<i class="info"><a href="javascript:void(0);"></a></i>
					<div class="info_block" style="display: none;">
						<?/*
							<pre><?print_r($arItem["DISPLAY_PROPERTIES"])?></pre>
							*/ ?>
						<? foreach ($arItem["DISPLAY_PROPERTIES"] as $arProp) : ?>
							<p class="info_block__text">
								<span><?= $arProp["NAME"] ?>:</span>
								<? if (!is_array($arProp["VALUE"])) : ?>
									<?= $arProp["VALUE"] ?>
								<? else : ?>
									<? $z = 1;
									foreach ($arProp["VALUE"] as $arVal) : ?>
										<?= $arVal ?><? if (count($arProp["VALUE"]) > 1 && $z != count($arProp["VALUE"])) : ?>, <? endif; ?>
								<? $z++;
									endforeach; ?>
							<? endif; ?>
							</p>
						<? endforeach; ?>
						<?/*
							<p class="info_block__text"><span>Этажность:</span> Двухэтажные</p>
							<p class="info_block__text"><span>Материал:</span> Сэндвич панели</p>
							<p class="info_block__text"><span>Модификации:</span> Зимние, С туалетом и раковиной, Утеплением</p>
							<p class="info_block__text"><span>Внутренняя отделка:</span> ЛДСП</p>
							<p class="info_block__text"><span>Тип:</span> Мобильные</p>
							<p class="info_block__text"><span>Количество блоков:</span> 16</p>*/ ?>
					</div>
				<? endif; ?>
				<? if ($arItem["PROPERTIES"]["FULL_SPRITE"]["VALUE"] > 0) : ?>
					<i class="look" id="catalog_tooltip"><a href="javascript:void(0);"></a></i>
				<? endif; ?>
			</div>
			<?/*<div class="product-image">
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
			</div>*/ ?>
			<div class="product-slider">
				<div class="product-image">
					<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
						<?
						if (isset($arItem['PREVIEW_PICTURE']['ID'])) {
							$main_image =  CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], array('width' => 355, 'height' => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						} else {
							$main_image['src'] = SITE_TEMPLATE_PATH . "/images/noimage_355x220.jpg";
						}
						?>
						<img src="<?= $main_image['src'] ?>" alt="<?= $arItem['NAME'] ?>">
					</a>
					<? if (count($arItem['PROPERTIES']['PHOTOS']['VALUE']) > 0) : ?>
						<? foreach ($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $photo) :
							$image =  CFile::ResizeImageGet($photo, array('width' => 355, 'height' => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						?>
							<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
								<img src="<?= $image['src'] ?>" alt="<?= $arItem['NAME'] ?>">
							</a>
						<? endforeach ?>
					<? endif ?>
				</div>
				<? if (is_array($arItem['PROPERTIES']['PHOTOS']['VALUE']) && (count($arItem['PROPERTIES']['PHOTOS']['VALUE']) > 0)) : ?>

					<div class="product-pagination-image">
						<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" data-index="0" class="active" onmouseenter="paginationImageMouseEnter(this)"></a>
						<? foreach ($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $k => $photo) : ?>
							<a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" data-index="<?= $k + 1 ?>" onmouseenter="paginationImageMouseEnter(this)"></a>
						<? endforeach ?>
					</div>
				<? endif; ?>
			</div>
			<div class="product-pricing">
				<p class="this-price">
					Стоимость:
					<? if ((intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) == 0)) : ?>
						По запросу
					<? else : ?>
						<span><?= $arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ?> руб.</span>
					<? endif; ?>
				</p>
				<a href="#order-popup" class="js-fancy buy_button" data-base-price="<?= intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) ?>">Оформить заказ</a>
			</div>
		</div>
	</div>

<? endforeach ?>
<script>
	$('.info').click(function() {
		$(this).siblings('.info_block').fadeToggle();
		$(this).toggleClass('active');
	});
</script>
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

<?endif*/ ?>