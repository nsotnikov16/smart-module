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
<style>
	select-title catalog_mobile .large-4 {
		max-height: 475px;
		margin-top: 5px;
		margin-bottom: 5px;
	}
</style>
<? $count_el = CIBlockSection::GetSectionElementsCount($catalog_section_id); ?>
<?/*foreach ($arResult['ITEMS'] as $arItem):
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
				<?if (count($arItem['PROPERTIES']['PHOTOS']['VALUE']) > 0):?>
					<?foreach ($arItem['PROPERTIES']['PHOTOS']['VALUE'] as $photo):
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
<?endforeach*/ ?>
<? //if($USER->isAdmin()){
?>
<?/*
<div class="mobile-menu_block">

	<? $intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => $arResult['IBLOCK_ID'], 'SECTION_ID' => $arResult['ID']));
	if ($intCount > 0) : ?>
		<div class="select-title catalog_mobile">
			Каталог
		</div>
		<ul class="filter-sections-list mobile-menu_list">
			<? $i = 7;
			$arFilter = array('IBLOCK_ID' => $arResult['IBLOCK_ID'], 'SECTION_ID' => $arResult['ID']);
			$db_list = CIBlockSection::GetList(array("SORT" => "ASC"), $arFilter, true);
			while ($arSect = $db_list->GetNext()) { ?>
				<? $intCount0 = CIBlockSection::GetCount(array('IBLOCK_ID' => $arResult['IBLOCK_ID'], 'SECTION_ID' => $arSect['ID'])); ?>
				<li class="list <? if ($intCount0 > 0) {
									echo 'list_no_before';
								} ?>" id="bx_398857043_<?= $i ?>">
					<a href="<?= $arSect['SECTION_PAGE_URL'] ?>" class="link"><?= $arSect['NAME'] ?></a>
					<? // echo "<pre>"; print_r($arSect); echo "</pre>";
					?>
					<?
					if ($intCount0 > 0) : ?>
						<div class="line">
							<ul class="filter-sections-sublist">
								<? $arFilter0 = array('IBLOCK_ID' => $arResult['IBLOCK_ID'], 'SECTION_ID' => $arSect['ID']);
								$db_list0 = CIBlockSection::GetList(array("SORT" => "ASC"), $arFilter0, true);
								while ($arSect0 = $db_list0->GetNext()) { ?>
									<li class="sublist_item">
										<a href="<?= $arSect0['SECTION_PAGE_URL'] ?>"><?= $arSect0['NAME'] ?></a>
									</li>
								<? }
								?>
							</ul>
						</div>
					<? endif ?>
				</li><? $i++; ?>
			<?   }
			?>
		</ul>
	<? endif ?>




	<div id="filter_header_mobile">
		<div class="select-title filter_mobile">
			Фильтр
		</div>
		<div class="filter-mobile">
			<?php
			$APPLICATION->IncludeComponent(
				"kombox:filter",
				"horizontal",
				array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"FILTER_NAME" => $arParams["FILTER_NAME"],
					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"HIDE_NOT_AVAILABLE" => $arParams["HIDE_NOT_AVAILABLE"],
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"SAVE_IN_SESSION" => "N",
					"INCLUDE_JQUERY" => "Y",
					"MESSAGE_ALIGN" => "LEFT",
					"MESSAGE_TIME" => "0",
					"IS_SEF" => "N",
					"CLOSED_PROPERTY_CODE" => array(),
					"CLOSED_OFFERS_PROPERTY_CODE" => array(),
					"SORT" => "N",
					"FIELDS" => array(),
					"PRICE_CODE" => $arParams["PRICE_CODE"],
					"CONVERT_CURRENCY" => $arParams["CONVERT_CURRENCY"],
					"CURRENCY_ID" => $arParams["CURRENCY_ID"],
					"XML_EXPORT" => "N",
					"SECTION_TITLE" => "NAME",
					"SECTION_DESCRIPTION" => "DESCRIPTION",
					"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
					"COLUMNS" => 5
				),
				false
			); ?>
		</div>
	</div>
</div>
*/ ?>
<div class="question_block ttttt2222">
	<div class="row">
		<div class="large-3 medium-3 columns">

			<div class="portrait">
				<div class="portrait_image">
					<span class="portrait-box">
						<span class="portrait-border "></span>
						<img class="portrait-box-img" data-alt-src="/local/templates/smart-module/images/call-m2.png" src="/local/templates/smart-module/images/call-m1.png" alt="">
					</span>
				</div>
				<div class="portrait_name">
					<p class="manager_name">
						Максим Вячеславович
					</p>
					<p class="manager">
						Консультант-менеджер
					</p>
				</div>
			</div>

		</div>
		<div class="large-9 medium-9 columns">
			<span class="manager_title">
				Есть вопросы? Оставьте заявку и мы свяжемся с Вами!
			</span>
			<div class="questions_form">


				<form action="" method="POST" id="form-questions2">
					<p id="content_questions"></p>
					<input type="text" class="manager_callback__input" name="name" required placeholder="Ваше Имя">
					<input type="text" class="manager_callback__input" name="phone" required placeholder="Ваш телефон">
					<span class="manager_callback__btn_span"><input type="submit" class="manager_callback__btn" value="Отправить"></span>
					<div class="p-popup__check manager__check">
						<input type="checkbox" id="checkid2" name="check" checked="checked">
						<label for="checkid2">
							Даю согласие на обработку <a href="/politika-konfidentsialnosti/">персональных данных</a>
						</label>
					</div>
				</form>

			</div>


		</div>
	</div>
</div>
<!-- <div class="advantages">
	<div class="row 3333">
		<div class="large-3 medium-3 columns tac"> <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/catalog/pic1.php"), false); ?></div>
		<div class="large-3 medium-3 columns tac"> <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/catalog/pic2.php"), false); ?></div>
		<div class="large-3 medium-3 columns tac"> <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/catalog/pic3.php"), false); ?></div>
		<div class="large-3 medium-3 columns tac"> <? $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR . "include/catalog/pic4.php"), false); ?></div>
	</div>
</div>-->



<div class="advantages-new">
	<div class="row advantages-new-block">
		<div class="large-3 medium-3 columns adv-new-b" data-id="51">
			<img src="/local/templates/smart-module/images/adv-clock.png" alt="">
			<p class="advantages_title-new">Быстро-возводимые</p>
		</div>

		<div class="large-3 medium-3 columns adv-new-b adv-new-b-small" data-id="52">
			<img src="/local/templates/smart-module/images/adv-cost.png" alt="">
			<p class="advantages_title-new">Выгодно</p>
		</div>

		<div class="large-3 medium-3 columns adv-new-b" data-id="53">
			<img src="/local/templates/smart-module/images/adv-complete.png" alt="">
			<p class="advantages_title-new">Сборно-разборные</p>
		</div>

		<div class="large-3 medium-3 columns adv-new-b" data-id="54">
			<img src="/local/templates/smart-module/images/arv-thermometer.png" alt="">
			<p class="advantages_title-new">До -50 градусов</p>
		</div>
	</div>



	<div class="row advantages-new-block adv-new-detail" data-id="51">
		<img class="adv-close" src="/local/templates/smart-module/images/adv-new-close.png" alt="">

		<div class="large-3 medium-3 columns adv-new-b">
			<img src="/local/templates/smart-module/images/adv-clock.png" alt="">
			<p class="advantages_title-new">Быстро-возводимые</p>
		</div>

		<div class="col-lg-9 adv-new-detail-text">
			<p> Перед тем, как выйти на рынок модульного строительства, мы изучили и
				проанализировали и детально разобрали 37 производственных площадки
				на территории Российской Федерации и Европы.
				Результатом исследования стал вывод о том, что потребителям
				предлагают некачественные и зачастую одноразовые конструкции.</p>
		</div>
	</div>


	<div class="row advantages-new-block adv-new-detail" data-id="52">
		<img class="adv-close" src="/local/templates/smart-module/images/adv-new-close.png" alt="">

		<div class="large-3 medium-3 columns adv-new-b">
			<img src="/local/templates/smart-module/images/adv-cost.png" alt="">
			<p class="advantages_title-new">Выгодно</p>
		</div>

		<div class="col-lg-9 adv-new-detail-text">
			<p> Современное оборудование и инновационные технологии производства модульных зданий позволяют максимально оптимизировать все технологические процессы. Результатом является эффективное снижение себестоимости продукции. Это дает возможность предложить клиентам наиболее выгодную стоимость и высокое качество изделий.</p>
		</div>
	</div>



	<div class="row advantages-new-block adv-new-detail" data-id="53">
		<img class="adv-close" src="/local/templates/smart-module/images/adv-new-close.png" alt="">

		<div class="large-3 medium-3 columns adv-new-b">
			<img src="/local/templates/smart-module/images/adv-complete.png" alt="">
			<p class="advantages_title-new">Сборно-разборные</p>
		</div>

		<div class="col-lg-9 adv-new-detail-text">
			<p> Особенности конструкции металлических бытовок позволяют осуществлять быструю сборку и разборку конструкции. Данные операции могут проводиться многократно без повреждения комплектующих. Для транспортировки модулей в разобранном виде не обязательно использовать крупногабаритную спецтехнику.</p>
		</div>
	</div>





	<div class="row advantages-new-block adv-new-detail" data-id="54">
		<img class="adv-close" src="/local/templates/smart-module/images/adv-new-close.png" alt="">

		<div class="large-3 medium-3 columns adv-new-b">
			<img src="/local/templates/smart-module/images/arv-thermometer.png" alt="">
			<p class="advantages_title-new">До -50 градусов</p>
		</div>

		<div class="col-lg-9 adv-new-detail-text">
			<p> Бытовки выполнены из качественных сэндвич-панелей, изготовленных по передовым технологиям. Стеновые и кровельные модули могут эксплуатироваться в самых суровых климатических зонах. Энергосберегающий утеплитель обеспечивает комфортную температуру в помещении при температуре окружающего воздуха до -50°С.</p>
		</div>
	</div>





</div>






<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"akci_mob",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "60",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "1",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("ENDDATE", "TITLE", "TEXTBUTTON", ""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
); ?>

<div class="products">
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
					<? if (!empty(array_keys($arItem["DISPLAY_PROPERTIES"]))) : ?>
						<? $func = 'getInfo(this, ' . CUtil::PhpToJsObject(array_keys($arItem["DISPLAY_PROPERTIES"]))  . ')' ?>
						<i class="info" data-id="<?= $arItem['ID'] ?>" onmouseover="<?= $func ?>" onclick="<?= $func ?>"><a href="javascript:void(0);"></a></i>
						<div class="info_block">
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

						<i class="look" id="catalog_tooltip"><a href="javascript:void(0);" class="js-fullscreen"></a></i>

						<div class="spritespinBig spritespin-instance with-canvas" style="display: block; user-select: none; position: relative; overflow: hidden; width: 1366px; height: 768px;" unselectable="on">
							<div class="spritespin-stage" style="width: 1152px; height: 768px; top: 0px; left: 107px; bottom: 0px; right: 107px; position: absolute; overflow: hidden; display: block; background-image: none;"></div><canvas class="spritespin-canvas" width="1152" height="768" style="width: 1152px; height: 768px; top: 0px; left: 107px; bottom: 0px; right: 107px; position: absolute; overflow: hidden; display: block;"></canvas>
						</div>
					<? endif; ?>
				</div>
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
						<? if (!empty($arItem['PROPERTIES']['PHOTOS']['VALUE'])) : ?>
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
						Цена:
						<? if ((intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) == 0)) : ?>
							По запросу
						<? else : ?>
							<span><?= $arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ?> руб.</span>
						<? endif; ?>
					</p>
					<a href="#order-popup" class="js-fancy buy_button" data-base-price="<?= intval($arItem['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) ?>">Купить</a>
				</div>
			</div>
		</div>
	<? endforeach; ?>
	<div class="more_product_4 columns" style="flex-wrap: wrap; align-content: space-between;"></div>
</div>
<? //} display: flex;
?>


<script>
	function getInfo(element, props) {
		const id = element.dataset.id
		const infoBlock = element.nextElementSibling
		if (!infoBlock.classList.contains('info_block')) return
		if (element.dataset.get) return
		infoBlock.textContent = 'Загрузка...'
		fetch('<?= $templateFolder ?>/ajax.php', {
			method: 'POST',
			body: JSON.stringify({
				props,
				id,
				iblock_id: '<?= $arParams['IBLOCK_ID'] ?>'
			})
		}).then(res => res.text()).then(res => infoBlock.innerHTML = res)
		element.dataset.get = true
	}
</script>

<? if (count($arResult['ITEMS']) < 4) : // скрытие блока при 3х и менее элементов
?>
	<script>
		$("document").ready(function() {
			$("#advantages_block").hide();
		});
	</script>
<? endif ?>
<? if (count($arResult['ITEMS']) < 1) : // скрытие блока акций если нет товаров
?>
	<script>
		$("document").ready(function() {
			$("#akcii").hide();
		});
	</script>
<? endif ?>
<? if ($count_el > $arParams['PAGE_ELEMENT_COUNT']) : ?>


	<script>
		/*
	var newsPagen = 2;
	function loadMore(){
		$.ajax({
			method: 'POST',
			data: {"sec_id": <?= $catalog_section_id ?>},
			url: '/catalog/more.php?PAGEN_1=' + newsPagen,
			success: function(data){
				$('.more_product_4').append(data);
				newsPagen++;
			}
		});
	}
	*/
	</script>
	<?
	$url = '';
	foreach ($_GET as $key => $get) {
		if ($key == 'PAGEN_1')
			continue;
		$url .= '&' . $key . '=' . $get;
	}
	?>
	<?/*<pre><?print_r($url)?></pre>*/ ?>
	<script>
		var newsPagen = 2;

		function loadMore2(maxpage) {
			var maxpage = maxpage;
			$.ajax({
				method: 'POST',
				data: {
					"sec_id": <?= $catalog_section_id ?>
				},
				url: '/catalog/more2.php?PAGEN_1=' + newsPagen + '<?= $url ?>',
				success: function(data) {
					$('.more_product_4').append(data);
					//console.log(newsPagen);
					if (newsPagen == maxpage) {
						//console.log('last');
						$('.show-more').css('display', 'none');
					}
					newsPagen++;

					setTimeout(function() {
						const slider = $('.more_product_4 .product-image').not('.slick-initialized').slick();
					}, 500);



				}
			});
		}
	</script>

	<? if ($arParams['DISPLAY_BOTTOM_PAGER'] == "Y" && $arResult['NAV_RESULT']->NavPageCount > 1) : ?>

		<?= $arResult['NAV_STRING'] ?>


	<? endif ?>
<? endif; ?>
<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"sert_mob",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("", ""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "56",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("", ""),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ACTIVE_FROM",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N"
	)
); ?>


<script>
	$(document).ready(function() {
		var ranger = $('.product-detail-page .product-image input[type="range"]');
		var loop_change = false; //Стоп зацикливанию
		/**
		 * 3D модель товара
		 */
		$('a.js-fullscreen').click(function(e) {
			e.preventDefault();
			$('.spritespinBig').spritespin('api').requestFullscreen();
		});

		//next slide
		$('#nextSlide').click(function(e) {
			e.preventDefault();
			$('.spritespinBig').spritespin('api').nextFrame();
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').nextFrame();
			}, 50);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').nextFrame();
			}, 100);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').nextFrame();
			}, 150);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').nextFrame();
			}, 200);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').nextFrame();
			}, 250);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').nextFrame();
			}, 300);
		});

		//prew slide
		$('#prewSlide').click(function(e) {
			e.preventDefault();
			$('.spritespinBig').spritespin('api').prevFrame();
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').prevFrame();
			}, 50);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').prevFrame();
			}, 100);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').prevFrame();
			}, 150);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').prevFrame();
			}, 200);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').prevFrame();
			}, 250);
			setTimeout(function() {
				$('.spritespinBig').spritespin('api').prevFrame();
			}, 300);
		});

		$('.spritespin').spritespin({
			source: '/upload/iblock/dd8/dd8b8a193e296187f280ced511457b3e.jpg',
			width: 600,
			height: 400,
			frames: 30,
			framesX: 5,
			sense: -1,
			frameTime: 160,
			animate: false,
			reverse: false,
			loop: false,
			responsive: true,
			onLoad: function() {
				/**
				 * Слайдер положения 3Д картинки на странице товара
				 * Doc: http://rangeslider.js.org/
				 */
				ranger.rangeslider({
					polyfill: false,
					onSlide: function(position, value) {
						var api = $('.spritespin').spritespin('api');
						api.stopAnimation();
						api.updateFrame(value);
						loop_change = false;
					}
				});
			},
			onFrame: function(e, data) {
				ranger.val(data.frame);
				if (!loop_change) {
					loop_change = true;
					ranger.change();
				}
			}
		});
		$('.spritespinBig').spritespin({
			source: '/upload/iblock/261/261a3683ca49f5bdc6e5196a9dfbb5a3.jpg',
			width: 600,
			height: 400,
			frames: 30,
			framesX: 5,
			sense: -1,
			frameTime: 160,
			animate: false,
			reverse: false,
			loop: false,
			responsive: true,
			onLoad: function() {

				/**
				 * Слайдер положения 3Д картинки на странице товара
				 * Doc: http://rangeslider.js.org/
				 */
				$('.spritespinBig').css('display', 'block');

				ranger.rangeslider({
					polyfill: false,
					onSlide: function(position, value) {
						var api = $('.spritespinBig').spritespin('api');
						api.stopAnimation();
						api.updateFrame(value);
						loop_change = false;
					}
				});
			},
			onFrame: function(e, data) {
				ranger.val(data.frame);
				if (!loop_change) {
					loop_change = true;
					ranger.change();
				}
			}
		});
		/*
		document.addEventListener('fullscreenchange', exitHandler);
		document.addEventListener('webkitfullscreenchange', exitHandler);
		document.addEventListener('mozfullscreenchange', exitHandler);
		document.addEventListener('MSFullscreenChange', exitHandler);

		function exitHandler() {
		    if (!document.fullscreenElement && !document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
		        $('.spritespinBig').css('cssText', 'display: none !important');
		    }
		} */
	});



	var sourceSwap = function() {
		var $this = $(this);
		var newSource = $this.data('alt-src');
		$this.data('alt-src', $this.attr('src'));
		$this.attr('src', newSource);
	}

	$(function() {
		$('img.portrait-box-img').hover(sourceSwap, sourceSwap);
	});
</script>