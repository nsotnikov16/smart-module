<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

$this->setFrameMode(true);
?>



<div class="product-detail-page">
	<section class="box" id="<?= $this->GetEditAreaId($arResult['ID']) ?>">
		<div class="product-box">
			<div class="cols">
				<div class="col">
					<div class="product-image">
						<?
						if ($arResult['DETAIL_PICTURE']['SRC'] == '') {
							$arResult['DETAIL_PICTURE']['SRC'] = '/local/templates/smart-module/images/noimage_400x300.jpg';
						}

						if (isset($arResult['DETAIL_PICTURE']['ID'])): ?>
							<script>
								$(document).ready(function () {
									var ranger = $('.product-detail-page .product-image input[type="range"]');
									var ranger2 = $('.big_range');
									var loop_change = false; //Стоп зацикливанию
									/**
									* 3D модель товара
									*/
									$('a.js-fullscreen').click(function (e) {
										e.preventDefault();
										$('.spritespinBig').spritespin('api').requestFullscreen();
									});

									//next slide
									$('#nextSlide').click(function (e) {
										e.preventDefault();
										$('.spritespinBig').spritespin('api').nextFrame();
										setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 50);
										setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 100);
										setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 150);
										setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 200);
										setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 250);
										setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 300);
									});

									//prew slide
									$('#prewSlide').click(function (e) {
										e.preventDefault();
										$('.spritespinBig').spritespin('api').prevFrame();
										setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 50);
										setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 100);
										setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 150);
										setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 200);
										setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 250);
										setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 300);
									});

									$('.spritespin').spritespin({
										source: '<?= $arResult['DETAIL_PICTURE']['SRC'] ?><? //=$arResult['PROPERTIES']['FULL_SPRITE']['VALUE']?>',
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
										onLoad: function () {
											/**
											 * Слайдер положения 3Д картинки на странице товара
											 * Doc: http://rangeslider.js.org/
											 */
											ranger.rangeslider({
												polyfill: false,
												onSlide: function (position, value) {
													var api = $('.spritespin').spritespin('api');
													api.stopAnimation();
													api.updateFrame(value);
													loop_change = false;
												}
											});
										},
										onFrame: function (e, data) {
											ranger.val(data.frame);
											if (!loop_change) {
												loop_change = true;
												ranger.change();
											}
										}
									});
									$('.spritespinBig').spritespin({
										source: '<?= CFile::GetPath($arResult['PROPERTIES']['FULL_SPRITE']['VALUE']) ?>',
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
										onLoad: function () {

											/**
											 * Слайдер положения 3Д картинки на странице товара
											 * Doc: http://rangeslider.js.org/
											 */

											$('.spritespinBig').css('display', 'block');
											$('.spritespinBig').append('<a href="#callback-fb" class="h-callback neiros__open-lead-catch h-callback_new h-callback_in_sprite">Получить консультацию</a>');
											$('.spritespinBig').append('<ion-icon name="close" class="exit_fs"></ion-icon>');
											/*$('.spritespinBig').append('<div id="container_for_button"><div id="prewSlide"></div><input class="big_range" type="range" min="0" max="29" step="1" value="0" data-orientation="horizontal" /><div id="nextSlide"></div></div>');*/
											$('.h-callback_new').click(function () {
												document.exitFullscreen();
											});
											$('.exit_fs').click(function () {
												document.exitFullscreen();
											});

											ranger2.rangeslider({
												polyfill: false,
												onSlide: function (position, value) {
													var api = $('.spritespinBig').spritespin('api');
													api.stopAnimation();
													api.updateFrame(value);
													loop_change = false;
												}
											});
										},
										onFrame: function (e, data) {
											ranger2.val(data.frame);
											if (!loop_change) {
												loop_change = true;
												ranger2.change();
											}
										}

										//$('.spritespinBig').html($('.spritespinBig').html()+'<a href="#callback-fb" class="h-callback h-callback_in_sprite">Получить консультацию</a><a href="#" class="close_in_sprite">X</a>');


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
							</script>
							<? if (isset($arResult['PREVIEW_PICTURE']['ID']) || count($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE']) > 0):
								$main_image = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE'], array('width' => 355, 'height' => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
								?>
							<? endif ?>

							<a class="js-fullscreen" href="#"><i class="fa fa-expand" id="tooltip"
									aria-hidden="true"></i></a>
							<div class="spritespin"></div>
							<div class="spritespinBig" style="display: none;"></div>

							<div id="container_for_button">
								<div id="prewSlide"></div>
								<input type="range" min="0" max="29" step="1" value="0" data-orientation="horizontal" />
								<div id="nextSlide"></div>
							</div>
						<? else: ?>
							<? $main_image = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width' => 450, 'height' => 300), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
							<? if ($main_image["src"] == '') {
								$main_image["src"] = '/local/templates/smart-module/images/noimage_400x300.jpg';
							}
							if ($arResult['PREVIEW_PICTURE']['SRC'] == '') {
								$arResult['PREVIEW_PICTURE']['SRC'] = '/local/templates/smart-module/images/noimage_400x300.jpg';
							}
							?>
							<div class="new-js-popup-big">
								<a href="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" rel="gallery" tabindex="0">
									<img src="<?= $main_image["src"] ?>" alt="<?= $arResult["NAME"] ?>">
								</a>
								<? if (!empty($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'][0])) { ?>
									<? foreach ($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'] as $photo):
										$image = CFile::ResizeImageGet($photo, array('width' => 355, 'height' => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
										?>
										<?php /*?>                                       <a href="<?=CFile::GetPath($photo)?>" class="new-js-popup-min" style="display: none !important;">
																	   <span class="image-border"></span>
																	   <img src="<?=$image['src']?>" alt="<?=$arResult['NAME']?>">
																   </a><?php */?>
									<? endforeach ?>
								<? } ?>
								<?
								$arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE");
								$arFilter = array("IBLOCK_ID" => 56, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
								$res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 20), $arSelect);
								while ($arFields = $res->Fetch()) { ?>
									<?php /*?>                                    <a href="<?=CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" style="display: none !important;">
																<img src="<?=CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" alt="<?=$arFields["NAME"]?>">
															</a><?php */?>
								<? }
								?>
							</div>
						<? endif ?>
						<div class="additional">
							<? $i = 0; ?>
							<? foreach ($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'] as $photo):
								$image = CFile::ResizeImageGet($photo, array('width' => 355, 'height' => 220), BX_RESIZE_IMAGE_PROPORTIONAL, true);
								?>
								<? $b = 0; ?>
								<div class="new-js-popup-min-wp">
									<? foreach ($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'] as $photo): ?>
										<a href="<?= CFile::GetPath($photo) ?>" class="new-js-popup-min" <? if ($i != $b) { ?>style="display: none !important;" <? } ?>>
											<span class="image-border"></span>
											<img src="<?= $image['src'] ?>" alt="<?= $arResult['NAME'] ?>">
										</a>
										<? $b++; ?>
									<? endforeach; ?>
									<? if (!isset($arResult['DETAIL_PICTURE']['ID'])): ?>
										<? $main_image = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], array('width' => 450, 'height' => 300), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
										<?php /*?>                                                    <a href="<?=$arResult['PREVIEW_PICTURE']['SRC']?>" style="display: none !important;">
																				   <img src="<?=$main_image["src"]?>" alt="<?=$arResult["NAME"]?>">
																			   </a><?php */?>
									<? endif; ?>
									<?php /*?>                                                <?
																	   $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE");
																	   $arFilter = Array("IBLOCK_ID"=>56, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
																	   $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>20), $arSelect);
																	   while($arFields = $res->Fetch())
																	   {?>
																		   <a href="<?=CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" style="display: none !important;">
																			   <img src="<?=CFile::GetPath($arFields['PREVIEW_PICTURE']);?>" alt="<?=$arFields["NAME"]?>">
																		   </a>
																	   <?}
																	   ?><?php */?>
								</div>
								<? $i++; ?>
							<? endforeach ?>
						</div>
						<script>
							$(document).ready(function () {

								$('.slider-dop').slick({

									infinite: false,
									slidesToShow: 1,
									slidesToScroll: 1,
									arrows: true


								});

								// $('.additional').bxSlider( {
								// 	mode: 'vertical',
								// 	minSlides: 4,
								// 	moveSlides: 1,
								// });

								$('.additional').slick({
									infinite: false,
									slidesToShow: 1,
									slidesToScroll: 1,
									arrows: true,
									dots: false,
									vertical: true,
									variableWidth: false,

									responsive: [
										{
											breakpoint: 1920,
											settings: {
												slidesToShow: 4,
												slidesToScroll: 1,
												vertical: true
											}
										},
										{
											breakpoint: 769,
											settings: {
												slidesToShow: 2,
												slidesToScroll: 2,
												vertical: false
											}
										}
									]

									// You can unslick at a given breakpoint now by adding:
									// settings: "unslick"
									// instead of a settings object


								});
								new Tooltip(document.getElementById("wet"), {
									placement: 'top', // or bottom, left, right, and variations
									title: "Влагостойкое"
								});
								new Tooltip(document.getElementById("north"), {
									placement: 'top', // or bottom, left, right, and variations
									title: "Исполнение СЕВЕР"
								});
								new Tooltip(document.getElementById("dgu"), {
									placement: 'top', // or bottom, left, right, and variations
									title: "Для ДГУ"
								});
								new Tooltip(document.getElementById("basalt"), {
									placement: 'top', // or bottom, left, right, and variations
									title: "Базальтовая плита 100 мм"
								});
								new Tooltip(document.getElementById("vandal"), {
									placement: 'top', // or bottom, left, right, and variations
									title: "Вандалозащитный"
								});

							});
						</script>

					</div>
				</div>

				<div class="col">
					<div class="product-cards">

						<? /*foreach ($arResult['PROPERTIES']['ICONS']['VALUE'] as $det_icon):?>
											 <span class="product-cards__item">	<img src="<?echo CFile::GetPath($det_icon);?>" />
												 <img src="/local/templates/smart-module/images/card_icon_1.png" alt="">
											 </span>
										 <?endforeach;*/?>
						<? foreach ($arResult['PROPERTIES']['ADV_PROD']['VALUE'] as $adv): ?>
							<?
							$res = CIBlockElement::GetByID($adv);
							if ($ar_res = $res->GetNext()) { ?>
								<div class="product-cards__item" id="<?= $ar_res['CODE']; ?>">
									<img class="hover" src="<?= CFile::GetPath($ar_res['PREVIEW_PICTURE']); ?>" alt="">
									<img class="hover_show" src="<?= CFile::GetPath($ar_res['DETAIL_PICTURE']); ?>" alt="">
								</div>
							<? }
							?>

						<? endforeach; ?>
						<? /*
											 <span class="product-cards__item" id="north" style="display: none;">	

												 <img src="/local/templates/smart-module/images/card_icon_1.png" alt="">
											 </span>
												 <span class="product-cards__item" id="dgu" style="display: none;">	
												 <img src="/local/templates/smart-module/images/card_icon_2.png" alt="">
											 </span>
												 <span class="product-cards__item" id="basalt" style="display: none;">	
												 <img src="/local/templates/smart-module/images/card_icon_3.png" alt="">
											 </span>
												 <span class="product-cards__item" id="wet" style="display: none;">	
												 <img src="/local/templates/smart-module/images/card_icon_4.png" alt="">
											 </span>
												 <span class="product-cards__item" id="vandal" style="display: none;">	
												 <img src="/local/templates/smart-module/images/card_icon_5.png" alt="">
											 </span>
										 

											 <span class="product-cards__item" id="north" style="">	

												 
											 </span>
												 <span class="product-cards__item" id="dgu" style="">	
											 
											 </span>
												 <span class="product-cards__item" id="basalt" style="">	
												 
											 </span>
												 <span class="product-cards__item" id="wet" style="">	
												 
											 </span>
												 <span class="product-cards__item" id="vandal" style="">	
												 
											 </span>*/?>

					</div>
					<script type="text/javascript">
						<? foreach ($arResult["PROPERTIES"]["ADV_PROD"]["VALUE"] as $adv): ?>
							<?
							$res = CIBlockElement::GetByID($adv);
							if ($ar_res = $res->GetNext()) { ?>
								new Tooltip(document.getElementById("<?= $ar_res['CODE']; ?>"), {
									placement: 'top', // or bottom, left, right, and variations
									title: "<?= $ar_res['NAME']; ?>"
								});
							<? }
							?>

						<? endforeach; ?>
					</script>

					<div class="product-price" style="display:none;">
						Стоимость: <span id="total-product-price"
							data-base-price="<?= intval($arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) ?>">
							<? if ((intval($arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) == 0)): ?>
								По запросу
							<? else: ?>
								<?= $arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ?>
							<? endif; ?>
						</span>
						<? if ((intval($arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE']) != 0)): ?> руб.
						<? endif; ?>
					</div>
					<div class="product-info">
						<!--
						<table>
							<?
							$n = 0;
							$props = $arResult['DISPLAY_PROPERTIES'];
							unset($props['PHOTOS'], $props['PRICE']);
							$total = count($props);
							foreach ($props as $prop):
								$prop_value = (is_array($prop['DISPLAY_VALUE'])) ? implode(", ", $prop['DISPLAY_VALUE']) : $prop['DISPLAY_VALUE'];
								if (!empty($prop_value)):
									$total--;
									?>
									<? if ($n == 0): ?>
										<tr>
									<? endif ?>
									<td>
										<p><strong><?= $prop['NAME'] ?>:</strong>&nbsp;<?= $prop_value ?></p>
									</td>
									<? if ($n % 2 && $total != 0): ?>
											</tr>
										<tr>
									<? endif ?>
									<? if ($total == 0): ?>
										<? if ($n % 2 == 0): ?>
											<td></td>
											</tr>
										<? else: ?>
											</tr>
										<? endif ?>
									<? endif ?>
								<? endif ?>
								<? $n++;
							endforeach; ?>
						</table>
-->

						<table>
							<tbody>
								<? if ($arResult["PROPERTIES"]["FLOOR"]["VALUE"] != "" || $arResult["PROPERTIES"]["MATERIAL"]["VALUE"] != ""): ?>
									<tr>
										<td>
											<? if ($arResult["PROPERTIES"]["FLOOR"]["VALUE"] != ""): ?>
												<p>
													<strong>
														<?= $arResult["PROPERTIES"]["FLOOR"]["NAME"] ?>:
													</strong>
													<?= $arResult["PROPERTIES"]["FLOOR"]["VALUE"] ?>
												</p>
											<? endif; ?>
											<? if (!empty($arResult["PROPERTIES"]["MATERIAL"]["VALUE"])): ?>
												<p>
													<strong>
														<?= $arResult["PROPERTIES"]["MATERIAL"]["NAME"] ?>:
													</strong>
													<? $z = 1;
													foreach ($arResult["PROPERTIES"]["MATERIAL"]["VALUE"] as $arEach): ?>
														<?= $arEach ?>
														<? if (count($arResult["PROPERTIES"]["MATERIAL"]["VALUE"]) > 1 && $z != count($arResult["PROPERTIES"]["MATERIAL"]["VALUE"])): ?>,
														<? endif; ?>
														<? $z++; endforeach; ?>
												</p>
											<? endif; ?>
										</td>
									</tr>
								<? endif; ?>
								<? if ($arResult["PROPERTIES"]["MODIFICATION"]["VALUE"] != "" || $arResult["PROPERTIES"]["INTERIOR"]["VALUE"] != ""): ?>
									<tr>
										<td>
											<? if ($arResult["PROPERTIES"]["MODIFICATION"]["VALUE"] != ""): ?>
												<p>
													<strong>
														<?= $arResult["PROPERTIES"]["MODIFICATION"]["NAME"] ?>:
													</strong>
													<? $z = 1;
													foreach ($arResult["PROPERTIES"]["MODIFICATION"]["VALUE"] as $arEach): ?>
														<?= $arEach ?>
														<? if (count($arResult["PROPERTIES"]["MODIFICATION"]["VALUE"]) > 1 && $z != count($arResult["PROPERTIES"]["MODIFICATION"]["VALUE"])): ?>,
														<? endif; ?>
														<? $z++; endforeach; ?>
												</p>
											<? endif; ?>
											<? if ($arResult["PROPERTIES"]["INTERIOR"]["VALUE"] != ""): ?>
												<p>
													<strong>
														<?= $arResult["PROPERTIES"]["INTERIOR"]["NAME"] ?>:
													</strong>
													<? $z = 1;
													foreach ($arResult["PROPERTIES"]["INTERIOR"]["VALUE"] as $arEach): ?>
														<?= $arEach ?>
														<? if (count($arResult["PROPERTIES"]["INTERIOR"]["VALUE"]) > 1 && $z != count($arResult["PROPERTIES"]["INTERIOR"]["VALUE"])): ?>,
														<? endif; ?>
														<? $z++; endforeach; ?>
												</p>
											<? endif; ?>
										</td>
									</tr>
								<? endif; ?>
								<? if ($arResult["PROPERTIES"]["TYPE"]["VALUE"] != "" || $arResult["PROPERTIES"]["BLOCKS"]["VALUE"] != ""): ?>
									<tr>
										<td>
											<? if ($arResult["PROPERTIES"]["TYPE"]["VALUE"] != ""): ?>
												<p>
													<strong>
														<?= $arResult["PROPERTIES"]["TYPE"]["NAME"] ?>:
													</strong>
													<? $z = 1;
													foreach ($arResult["PROPERTIES"]["TYPE"]["VALUE"] as $arEach): ?>
														<?= $arEach ?>
														<? if (count($arResult["PROPERTIES"]["TYPE"]["VALUE"]) > 1 && $z != count($arResult["PROPERTIES"]["TYPE"]["VALUE"])): ?>,
														<? endif; ?>
														<? $z++; endforeach; ?>
												</p>
											<? endif; ?>
											<? if ($arResult["PROPERTIES"]["BLOCKS"]["VALUE"] != ""): ?>
												<p><strong>
														<?= $arResult["PROPERTIES"]["BLOCKS"]["NAME"] ?>:
													</strong>
													<?= $arResult["PROPERTIES"]["BLOCKS"]["VALUE"] ?>
												</p>
											<? endif; ?>
										</td>
									</tr>
								<? endif; ?>
							</tbody>
						</table>


						<div class="product-box-footer">
							<p><strong>Стоимость:</strong>&nbsp; по запросу
								<?= $arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ?>
							</p>
							<a href="#order-popup" class="button js-fancy">
								Узнать стоимость
							</a>
						</div>
					</div>
				</div>



			</div>
		</div>
	</section>
	<div class="clear"></div>

	<div class="stick-price-wrapper">
		<section class="box">
			<div class="stick-price">
				<div class="stick-price-head">
					<a href="#order-popup" class="fl-r js-fancy button">оформить заказ</a>
					<div class="stick-price-box">
						Стоимость: <span id="total-product-price-scroll">
							<?= $arResult['DISPLAY_PROPERTIES']['PRICE']['DISPLAY_VALUE'] ?>
						</span> руб.
						<span class="stick-price-dropdown-button"></span>
						<div class="stick-price-dropdown">
							<div class="stick-price-body">

							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<section class="box">
		<div class="tabs">
			<?php /*?><div class="tab js-tab" data-tab="tab-1">Сертификаты</div><?php */?>
			<div class="tab js-tab" data-tab="tab-2">Дополнительные услуги</div>
			<?php /*?><div class="tab js-tab" data-tab="tab-3">Сбор и доставка</div><?php */?>
			<? if ($arResult['PREVIEW_TEXT']): ?>
				<div class="tab js-tab" data-tab="tab-4">Подробные характеристики</div>
			<? endif ?>

			<? $res_url = CIBlockElement::GetByID($arResult["ID"]);
			if ($ar_res_url = $res_url->GetNext()) {
				$url_page = $ar_res_url['DETAIL_PAGE_URL'];
				$url_page_arr = explode("/", $url_page);
			}
			$curr_page = 0;
			$url_page_arr = $url_page_arr[2];
			if ($url_page_arr == 'ofisnye-zdaniya' || $url_page_arr == 'bystrovozvodimye-sklady' || $url_page_arr == 'stroitelnye-zdaniya' || $url_page_arr == 'zdaniya-dlya-biznesa' || $url_page_arr == 'sooruzheniya-dlya-sporta' || $url_page_arr == 'selskokhozyaystvennye-zdaniya' || $url_page_arr == 'torgovye-zdaniya' || $url_page_arr == 'promyshlennye-zdaniya' || $url_page_arr == 'bystrovozvodimye-zdaniya') {
				$curr_page = 1;
			}

			?>
			<? if ($curr_page === 1) { ?>
				<div class="tab js-tab" data-tab="tab-5">Технология</div>
			<? } ?>
		</div>
	</section>

	<div class="tabs-box">
		<? if ($curr_page === 1) { ?>
			<div class="js-tab-box" data-tab="tab-5" style="padding-top:0px; padding-bottom:0px;">
				<div class="video-container-tab">

					<div class="video-conainer-tab-cont active" id="video-tab-0">
						<video muted id="video-0" poster="/local/templates/smart-module/images/video-n/1.jpg">
							<source type="video/mp4" src="/upload/video/1.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-1">
						<video muted poster="/local/templates/smart-module/images/video-n/2.jpg" id="video-1">
							<source type="video/mp4" src="/upload/video/2.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-2">
						<video muted poster="/local/templates/smart-module/images/video-n/3.jpg" id="video-2">
							<source type="video/mp4" src="/upload/video/3.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-3">
						<video muted poster="/local/templates/smart-module/images/video-n/4.jpg" id="video-3">
							<source type="video/mp4" src="/upload/video/4.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-4">
						<video muted poster="/local/templates/smart-module/images/video-n/5.jpg" id="video-4">
							<source type="video/mp4" src="/upload/video/5.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-5">
						<video muted poster="/local/templates/smart-module/images/video-n/6.jpg" id="video-5">
							<source type="video/mp4" src="/upload/video/6.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-6">
						<video muted poster="/local/templates/smart-module/images/video-n/7.jpg" id="video-6">
							<source type="video/mp4" src="/upload/video/7.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-7">
						<video muted poster="/local/templates/smart-module/images/video-n/8.jpg" id="video-7">
							<source type="video/mp4" src="/upload/video/8.mp4">
						</video>
					</div>

					<div class="video-conainer-tab-cont" id="video-tab-8">
						<video muted poster="/local/templates/smart-module/images/video-n/9.jpg" id="video-8">
							<source type="video/mp4" src="/upload/video/9.mp4">
						</video>
					</div>


				</div>




				<div class="myprogress">

					<section class="box">
						<div class="progres-h1">Основу составляют легкие металоконструкции с обшивкой металлопрофилем или
							сендвич-панелями</div>
						<ul class="video-tab">
							<li data-id="video-tab-0" class="actives" style="padding-top: 10px;">Фасад<div></div>
								<span></span></li>
							<li data-id="video-tab-1" style="padding-top: 10px;">Фундамент<div></div><span></span></li>
							<li data-id="video-tab-2" style="padding-top: 10px;">Опора<div></div><span></span></li>
							<li data-id="video-tab-3">Силовой<br>каркас<div></div><span></span></li>
							<li data-id="video-tab-4">Вторичный<br>каркас<div></div><span></span></li>
							<li data-id="video-tab-5" style="padding-top: 10px;">Водоотлив<div></div><span></span></li>
							<li data-id="video-tab-6">Стык<br>панелей<div></div><span></span></li>
							<li data-id="video-tab-7" style="padding-top: 10px;">Окно<div></div><span></span></li>
							<li data-id="video-tab-8" style="padding-top: 10px;">Ворота<div></div><span></span></li>
						</ul>
					</section>
					<div class="myprogress-bar"></div>
				</div>
			</div>
		<? } ?>
		<section class="box">
			<?php /*?><?$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"sertificate",
		Array(
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
			"DISPLAY_NAME" => "N",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "N",
			"DISPLAY_TOP_PAGER" => "N",
			"FIELD_CODE" => array("", ""),
			"FILTER_NAME" => "",
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => "56",
			"IBLOCK_TYPE" => "content",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"INCLUDE_SUBSECTIONS" => "N",
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
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N"
		)
	);?><?php */?>

			<div class="tab-box js-tab-box" data-tab="tab-2">
				<div class="slider-dop">

					<? foreach ($arResult['ADD_SERVICES'] as $service): ?>
						<div class="slider-dop-item">
							<a href="#" class="services-link js-product-tab" data-tab="<?= $service['CODE'] ?>">
								<? if ($service["PICTURE"] != ""): ?>
									<span class="tab-img whiteimg"><img src="<?= CFile::GetPath($service["PICTURE"]); ?>" alt=""
											class=""></span>
								<? endif; ?>
								<? if ($service["DETAIL_PICTURE"] != ""): ?>
									<span class="tab-img blackimg"><img src="<?= CFile::GetPath($service["DETAIL_PICTURE"]); ?>"
											alt="" class=""></span>
								<? endif; ?>
								<?= $service['NAME'] ?>
							</a>
						</div>
					<? endforeach ?>

				</div>
				<div class="services-list">
					<div class="services-aside">

						<div class="bordering">
							<? foreach ($arResult['ADD_SERVICES'] as $service): ?>
								<div class="slider-dop-item">
									<a href="#" class="services-link js-product-tab" data-tab="<?= $service['CODE'] ?>">
										<? if ($service["PICTURE"] != ""): ?>
											<span class="tab-img whiteimg"><img src="<?= CFile::GetPath($service["PICTURE"]); ?>"
													alt="" class=""></span>
										<? endif; ?>
										<? if ($service["DETAIL_PICTURE"] != ""): ?>
											<span class="tab-img blackimg"><img
													src="<?= CFile::GetPath($service["DETAIL_PICTURE"]); ?>" alt=""
													class=""></span>
										<? endif; ?>
										<?= $service['NAME'] ?>
									</a>
								</div>
							<? endforeach ?>
						</div>
					</div>
					<? foreach ($arResult['ADD_SERVICES'] as $service): ?>
						<div class="services-body js-product-tab-box" data-tab="<?= $service['CODE'] ?>">
							<? if (count($service['ELEMENTS']) > 0): ?>
								<? foreach ($service['ELEMENTS'] as $element): ?>
									<div class="services-box" id="<?= $element['CODE'] ?>">
										<div class="services-image">
											<? if ($element['PREVIEW_PICTURE'] != ""): ?>
												<img src="<?= CFile::GetPath($element['PREVIEW_PICTURE']) ?>" alt="<?= $element['NAME'] ?>">
											<? endif ?>
										</div>
										<div class="services-description">
											<?= $element['NAME'] ?>
										</div>
										<div class="services-price">
											<p class="services-title_price">Стоимость</p>
											<span class="count-price" data-default-price="<?= $element['PREVIEW_TEXT'] ?>"
												id="<?= $element['CODE'] ?>"><?= $element['PREVIEW_TEXT'] ?> руб.
											</span>
										</div>
										<div class="services-count mobile">
											<div class="count">
												<a href="#" class="count-minus">-</a>
												<input class="nomb" type="text" value="0" disabled="" />
												<a href="#" class="count-plus">+</a>
											</div>
										</div>
										<div class="services-buy-button element count-plus" style="border-style: none">
											<div class="btn-buy">
												<button class="btn btn-add-buy"><img
														src="/local/templates/smart-module/images/basket-icon.png"
														alt="">Добавить</button>
											</div>
										</div>
										<div class="services-count">
											<div class="count">
												<a href="#" class="count-minus">-</a>
												<input class="nomb" type="text" value="0" disabled="" />
												<a href="#" class="count-plus">+</a>
											</div>
										</div>
									</div>
								<? endforeach ?>
							<? endif ?>
						</div>
					<? endforeach ?>
				</div>
			</div>
			<div class="tab-box js-tab-box" data-tab="tab-3">
				<p><span class="text-title pt"> Доставка </span></p>
				<p>Стоимость доставки: <br>7 000 руб. в пределах КАД, <br>7 000 руб. + 60 руб./км за пределами КАД.</p>
				<p><span class="text-title pt"> Сборка </span></p>
				<p>При закупке бытовок некоторые застройщики отдают предпочтение бывшим в употреблении изделиям. Однако
					здесь нужно быть осторожным: ремонт бытовок иногда может обойтись дороже, чем приобретение новой
					конструкции. Предполагаемых вариантов повреждений множество, поэтому перед оплатой стоит трезво
					оценить состояние сооружения. Часто ремонт бытовки все же оказывается целесообразнее, чем
					приобретение новой. Но каждый отдельный случай ремонта бытовок индивидуален, и нужно учитывать объем
					работ и время на восстановление конструкции. Это может оттянуть сроки введения в эксплуатацию
					объекта.</p>
				<p>Любое строительство, особенно на начальных этапах, требует наличия специальных подсобных помещений
					для безопасного хранения материалов и инструментов — бытовок. Достаточно большая и качественно
					построенная бытовка способна годами обеспечивать рабочим комфорт во время отдыха и защиту от
					погодных условий, в той или иной степени заменяя полноценное жилище. После завершения стройки
					бытовка может найти себе применение на другом месте, или послужить в качестве сарая.</p>
			</div>


			<? if ($arResult['PREVIEW_TEXT']): ?>
				<div class="tab-box js-tab-box typography" data-tab="tab-4">
					<?= $arResult['PREVIEW_TEXT'] ?>
				</div>
			<? endif ?>
		</section>
	</div>


	<section class="box popular_box">
		<? global $arrFilter;
		$arrFilter['!ID'] = $arResult['ID'] ?>
		<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"popular-slider",
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
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array("", ""),
				"FILTER_NAME" => "arrFilter",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "",
				"IBLOCK_TYPE" => "catalog",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "20",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => $arResult['SECTION']['ID'],
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array("INTERIOR", "BLOCKS", "ROOMS", "PERSONS", "MATERIAL", "MODIFICATION", "SQUARE", "ADV_PROD", "SIZE", "TYPE", "FLOOR", "", ""),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N"
			)
		); ?>
	</section>

	<!--
	<div class="gray-box">
		<section class="box quest-box">
			ОСТАЛИСЬ ВОПРОСЫ?<br>
			<p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>
			<div class="quest-box-button">
				<a href="#discount-popup" class="js-fancy button">Получить скидку</a>
			</div>
		</section>
	</div>-->
	<!--<div class="gray-box">
	<section class="box quest-box">
		<div class="row">
			<div class="large-3 medium-3 small-4 columns">
	<div class="quest-box_image">
		<img src="/local/templates/smart-module/images/call-center-operator.png" alt="">
		</div>
		</div>
		<div class="large-9 medium-9 small-8 columns helper">
			<div class="quest-box_text">
		ОСТАЛИСЬ ВОПРОСЫ?<br>
		<p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>
		</div>
		</div>
		<div class="paragraph_mobile">
		<div class="small-12 columns nopadding">
			<p>Оставьте ваши данные и мы сделаем вам персональную скидку!</p>
		</div>
		</div>
		<div class="quest-box-button">
			<a href="#discount-popup" class="js-fancy button">Получить скидку</a>
		</div>
		
		</div>
	</section>
</div>-->


	<section class="footer-gray-box" data-image="/local/templates/smart-module/images/bg-form-foto-3.jpg">
		<div class="large-12 medium-12 columns center footer-gray-box-block ">
			<p class="manager_title-head">Остались вопросы?</p>
			<span class="manager_title-span">
				Оставьте ваши данные и мы сделаем вам персональную скидку!
			</span>
			<div class="questions_form">


				<form action="" method="POST" id="form-questions">
					<p id="content_questions"></p>
					<input type="text" class="manager_callback__input" name="name" placeholder="Ваше Имя">
					<input type="text" class="manager_callback__input" name="phone" placeholder="Ваш телефон">
					<span class="manager_callback__btn_span"><input type="submit" class="manager_callback__btn"
							value="Отправить"></span>
					<div class="p-popup__check manager__check">
						<input type="checkbox" id="checkid2" name="check" checked="checked">
						<label for="checkid2">
							Даю согласие на обработку <a href="/politika-konfidentsialnosti/">персональных данных</a>
						</label>
					</div>
				</form>

			</div>

		</div>
	</section>





	<? if ($arResult['DETAIL_TEXT']): ?>
		<section class="box">
			<div class="cols text-cols">
				<div class="col typography">
					<?= $arResult['DETAIL_TEXT'] ?>
				</div>
			</div>
		</section>
	<? endif ?>
</div>

<style>
	.lg-outer {
		z-index: 9999 !important;
	}

	.lg-sub-html {
		display: none !important;
	}

	#lg-download {
		display: none !important;
	}

	.lg-fullscreen {
		display: none !important;
	}

	#lg-actual-size {
		display: none !important;
	}

	#lg-share {
		display: none !important;
	}

	.lg-backdrop {
		z-index: 9998 !important;
		background-color: rgba(0, 0, 0, .3);
	}

	.lg-thumb-outer.lg-grab {
		display: none !important;
	}
</style>
<script>



	function count_li_slider() {

		var it = 0;
		$('.video-tab li').each(function (index, element) {
			if ($(this).is('.actives')) {
				return it;
			}
			it = it + 1;
		});

	}
	$('.video-tab li').on('click', function () {
		var index = $(".video-tab li").index(this);
		$this = this;
		$('.video-tab li').removeClass('actives');
		$('.video-tab li').removeClass('chose');
		$('.video-conainer-tab-cont').removeClass('active');
		for (i = 0; i <= index; i++) {
			if (index == 0) {
				$($this).addClass('actives');

				$('#video-tab-' + index + '').addClass('active');
				$('video').get(index).load();
				$('#video-' + index + '').trigger('play');

			}
			else {
				if (i == index) {
					$($this).addClass('actives');
					$('#video-tab-' + index + '').addClass('active');
					$('video').get(index).load();
					$('#video-' + index + '').trigger('play');
				}
				else {
					$('.video-tab li:eq(' + i + ')').addClass('chose');
				}
			}

		}


		/*		t=0;
			$('.video-tab li').each(function(index, element) {
				if(t === 0){
				if($(this).is('.actives')){
					$(this).removeClass('actives');
					$(this).addClass('chose');
				t = 1;	
				}}
			});
			id = $(this).attr('data-id');
			$(this).addClass('actives');
			$('.video-conainer-tab-cont').removeClass('active');
			$('#'+id+'').addClass('active');*/

	})

	$('div[data-tab=tab-5]').on('click', function () {

		var width = $(window).width();
		if (width <= 768) {
			$('.video-tab').slick();

		}

	})

	$(document).ready(function () {


		$('.video-tab').on('afterChange', function (event, slick, currentSlide) {
			$('.video-conainer-tab-cont').removeClass('active');
			$('#video-tab-' + currentSlide + '').addClass('active');
			$('video').get(currentSlide).load();
			$('#video-' + currentSlide + '').trigger('play');
		});

	})


	$(".slider-dop").on("beforeChange", function () {
		console.log("change slider-dop2")


	});






</script>