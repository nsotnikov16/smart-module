<?php

use Bitrix\Main\Application,
	Bitrix\Main\Context,
	Bitrix\Main\Request;

$request = $context->getRequest();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title><? $APPLICATION->ShowTitle() ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
	<?
	$asset = \Bitrix\Main\Page\Asset::getInstance();


	//$asset->addJs("https://unpkg.com/ionicons@4.4.8/dist/ionicons.js");


	$asset->addCss("https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&subset=cyrillic,cyrillic-ext");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/reset.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/foundation.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/js/jquery-ui.custom/jquery-ui.min.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/font-awesome.min.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/jquery.fancybox.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/js/lightGal/css/lightgallery.min.css");
	/*$asset->addCss("https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css");*/

	$asset->addCss(SITE_TEMPLATE_PATH . "/css/slick.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/popper.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/slick-theme.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/rangeslider.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/template_styles.css");
	$asset->addCss(SITE_TEMPLATE_PATH . "/css/main.css");

	$asset->addCss(SITE_TEMPLATE_PATH . "/css/new-style.css");

	if ($request != NULL && $request->get("PAGEN_1") > 1)
		$asset->addString('<link rel="canonical" href="https://' . $request->getHttpHost() . strtok($_SERVER["REDIRECT_URL"], '?') . '" />');

	$APPLICATION->ShowHead();
	$APPLICATION->AddHeadScript('/local/templates/smart-module/js/jquery-3.3.1.min.js');
	?>

	<?/*для теста*/ ?>
	<script type="text/javascript" src="/local/templates/smart-module/js/html5.js"></script>
	<!--script type="text/javascript" src="/local/templates/smart-module/js/jquery-2.0.3.min.js"></script-->

	<script type="text/javascript" src="/local/templates/smart-module/js/lightGal/js/lightgallery-all.min.js"></script>

	<script type="text/javascript" src="/local/templates/smart-module/js/jquery.fancybox.pack.js"></script>
	<?php /*?><script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script><?php */ ?>


	<script type="text/javascript" src="/local/templates/smart-module/js/jquery-ui.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/selectbox.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/slick.min.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/spritespin.min.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/rangeslider.min.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/popper.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/tooltip.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/scripts.js"></script>
	<!--script type="text/javascript" src="/local/templates/smart-module/js/ionicons.js"></script-->
	<script type="text/javascript" src="/bitrix/components/bitrix/search.title/script.min.js"></script>
	<script type="text/javascript" src="/bitrix/components/bitrix/map.yandex.view/templates/.default/script.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/components/bitrix/menu/footer-multi-menu/script.min.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/components/bitrix/menu/footer-multi-menu-new/script.min.js"></script>
	<script type="text/javascript" src="/bitrix/components/webfly/meta.edit/templates/.default/script_t.js"></script>
	<?/*для теста*/ ?>
	<script type="text/javascript" src="/local/templates/smart-module/js/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="/local/templates/smart-module/js/jquery.matchHeight-min.js"></script>





	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">

	<? $url = explode("/", ($APPLICATION->GetCurPage())); ?>
	<? if ($url[1] == "catalog" && !empty($_GET["PAGEN_1"])) : ?>

	<? endif; ?>
</head>

<body>
	<?php /*?><div class="overlay"></div><?php */ ?>
	<? $APPLICATION->ShowPanel(); ?>
	<?/*
<section class="hat-wrapper">
	<div class="box hat">
		<div class="hat-box">
			<a href="https://vk.com/smart_module" target="_blank" rel="nofollow" class="icon vk-icon"></a>
			<a href="https://www.facebook.com/Smart-Module-1428037370634428/" target="_blank" rel="nofollow" class="icon fb-icon"></a>
			<a href="https://www.youtube.com/channel/UCe0MhLxBpNUuyEXD-G28J6w" target="_blank" rel="nofollow" class="icon yt-icon"></a>
			<a href="https://www.instagram.com/smart_module/" target="_blank" rel="nofollow" class="icon inst-icon"></a>
		</div>
		<div class="hat-box">
			<div class="location-box">
				<select onchange="location = this.value;" class="styled">
					<option value="https://smart-module.ru">Санкт-Петербург</option>
					<option value="https://moskva.smart-module.ru">Москва</option>
				</select>
			</div>
		</div>
		<div class="hat-box">
			<div class="phone-box">
				#WF_PHONES#
			</div>
		</div>
	</div>
</section>
*/ ?>

	<header class="header-wrapper position">
		<!--
	<div class="header__top">
		<div class="box">
			<div class="header__line">
				<div class="header__h-social">
					<ul class="h-social">
						<li class="h-social__item">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/header/vk.php"
								)
							); ?>
						</li>
						<li class="h-social__item">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/header/facebook.php"
								)
							); ?>
						</li>
						<li class="h-social__item">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/header/instagram.php"
								)
							); ?>
						</li>
					</ul>
				</div>
				<div class="header__h-city">
					<div class="h-city">
						<? $APPLICATION->IncludeComponent(
							"webfly:cities.popup",
							"template1",
							array(
								"CACHE_TIME" => "3600",
								"CACHE_TYPE" => "A",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"WF_FAVORITE" => "WF_CITY_ROD",
								"WF_JQUERY" => "Y"
							)
						); ?>
						<?/*<select onchange="location.href = this.value;">
							<option value="https://smart-module.ru">Санкт-Петербург</option>
							<option value="https://moskva.smart-module.ru">Москва</option>
						</select>*/ ?>
					</div>
				</div>
				<div class="header__h-email">
					<? $APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/header/email.php"
						)
					); ?>
				</div>
				<div class="header__h-phone">
					<? $APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/include/header/phone.php"
						)
					); ?>
				</div>
				<div class="header__h-callback">
					<a href="#callback-fb" class="h-callback">
						Обратный звонок
					</a>
				</div>
			</div>
		</div>
	</div>-->
		<div class="header__bottom">
			<div class="box">
				<div class="header__line">
					<!--
-->
					<a href="/" class="header-logo">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/header/logo.php"
							)
						); ?>
					</a>
					<div class="header__h-city">
						<div class="h-city">
							<? $APPLICATION->IncludeComponent(
								"webfly:cities.popup",
								"template1",
								array(
									"CACHE_TIME" => "3600",
									"CACHE_TYPE" => "A",
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"WF_FAVORITE" => "WF_CITY_ROD",
									"WF_JQUERY" => "Y"
								)
							); ?>
							<?/*
						<link rel="stylesheet" href="/local/templates/smart-module/components/webfly/cities.popup/template1/styles.min.css">
						<select onchange="$('#location_'+$(this).val()).trigger('click')">
							<option value="vladivostok">Владивосток</option>
							<option value="ekaterinburg">Екатеринбург</option>
							<option value="kazan">Казань</option>
							<option value="krasnoyarsk">Красноярск</option>
							<option value="magadan">Магадан</option>
							<option value="moskva">Москва</option>
							<option value="novosibirsk">Новосибирск</option>
							<option value="novocheboksarsk">Новочебоксарск</option>
							<option value="samara">Самара</option>
							<option value="default" selected="">Санкт-Петербург</option>
							<option value="tyumen">Тюмень</option>
							<option value="habarovsk">Хабаровск</option>
							<option value="chelyabinsk">Челябинск</option>
						</select>
<div id="modalCities" class="wf-modal-cities wf-modal fade">
    <div class="wf-modal-dialog modal-lg">
        <div class="wf-modal-content">
            <div class="wf-modal-header">
                <p class="wf-modal-title">Ваш город</p>
                <a href="#" class="wf-modal-close" title="Закрыть"></a>
            </div>
            <div class="wf-modal-body">
                <div class="wf-row">
                                            <ul class="list-unstyled wf-primary-cities" style="">
                                                            <li class="pick-location-final" id="location_vladivostok" data-locid="1082" data-url="https://vladivostok.smart-module.ru/?bitrix_include_areas=N">Владивосток</li>
                                                            <li class="pick-location-final" id="location_ekaterinburg" data-locid="1066" data-url="https://ekaterinburg.smart-module.ru/?bitrix_include_areas=N">Екатеринбург</li>
                                                            <li class="pick-location-final" id="location_kazan" data-locid="1076" data-url="https://kazan.smart-module.ru/?bitrix_include_areas=N">Казань</li>
                                                            <li class="pick-location-final" id="location_krasnoyarsk" data-locid="1074" data-url="https://krasnoyarsk.smart-module.ru/?bitrix_include_areas=N">Красноярск</li>
                                                            <li class="pick-location-final" id="location_magadan" data-locid="1080" data-url="https://magadan.smart-module.ru/?bitrix_include_areas=N">Магадан</li>
                                                            <li class="pick-location-final" id="location_moskva" data-locid="31" data-url="https://moskva.smart-module.ru/?bitrix_include_areas=N">Москва</li>
                                                            <li class="pick-location-final" id="location_novosibirsk" data-locid="1072" data-url="https://novosibirsk.smart-module.ru/?bitrix_include_areas=N">Новосибирск</li>
                                                            <li class="pick-location-final" id="location_novocheboksarsk" data-locid="1086" data-url="https://novocheboksarsk.smart-module.ru/?bitrix_include_areas=N">Новочебоксарск</li>
                                                            <li class="pick-location-final" id="location_samara" data-locid="1078" data-url="https://samara.smart-module.ru/?bitrix_include_areas=N">Самара</li>
                                                            <li class="pick-location-final" id="location_default" data-locid="30" data-url="https://smart-module.ru/?bitrix_include_areas=N">Санкт-Петербург</li>
                                                            <li class="pick-location-final" id="location_tyumen" data-locid="1068" data-url="https://tyumen.smart-module.ru/?bitrix_include_areas=N">Тюмень</li>
                                                            <li class="pick-location-final" id="location_habarovsk" data-locid="1084" data-url="https://habarovsk.smart-module.ru/?bitrix_include_areas=N">Хабаровск</li>
                                                            <li class="pick-location-final" id="location_chelyabinsk" data-locid="1070" data-url="https://chelyabinsk.smart-module.ru/?bitrix_include_areas=N">Челябинск</li>
                                                    </ul>
                                    </div>
            </div>
                    </div>
    </div>
</div>*/ ?>
						</div>
						<a href="tel:#WF_PHONES#" class="h-phone ">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<span class="#WF_PHONE_REPLACE#">#WF_PHONES#</span>
						</a>
					</div>
					<div class="header__h-email">
						<p class="header_email ">Email поддержка: </p>
						<a href="mailto:#WF_EMAIL#" class="h-email #WF_EMAIL_REPLACE#">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							#WF_EMAIL#
						</a>
					</div>
					<div class="header__h-social">
						<ul class="h-social">
							<li class="h-social__item">
								<a href="https://vk.com/smart_module" target="_blank" class="h-social__link">
									<i class="fa fa-vk" aria-hidden="true"></i>
								</a>
							</li>
							<li class="h-social__item">
								<a href="https://www.youtube.com/channel/UCe0MhLxBpNUuyEXD-G28J6w/" target="_blank" class="h-social__link">
									<i class="fa fa-youtube-play" aria-hidden="true"></i>
								</a>
							</li>
							<!--<li class="h-social__item">
							<a href="https://www.instagram.com/smart_module/" target="_blank" class="h-social__link">
	<i class="fa fa-instagram" aria-hidden="true"></i>
</a>						</li>-->
						</ul>
					</div>
					<!--
				<div class="header__h-phone">
					<a href="tel:#WF_PHONES#" class="h-phone">
	<i class="fa fa-phone" aria-hidden="true"></i>
	8 (812) 907-14-59
</a>				</div>-->
					<div class="header__h-callback header__h-callback_new">
						<a href="#callback-fb" class="h-callback h-callback_new" onclick="nrs('klik_po_knopke_v_sapke', {});">
							Получить консультацию
						</a>
					</div>
				</div>
			</div>

			<div class="box box-fo-new">
				<!--
			<a href="/" class="header-logo">
				<? $APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/header/logo.php"
					)
				); ?>
			</a>-->
				<nav class="header-nav">
					<?php /*?><div class="mobile-nav-button"></div><?php */ ?>
					<svg style="margin-top: -4px;
    margin-left: 4px; float:left" class="ham hamRotate ham8 mobile_menu_rotate" viewBox="0 0 100 100" width="50">
						<path class="line_svg top_svg" d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
						<path class="line_svg middle_svg" d="m 30,50 h 40" />
						<path class="line_svg bottom_svg" d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
					</svg>
					<? $APPLICATION->IncludeComponent(
						"bitrix:menu",
						"top",
						array(
							"COMPONENT_TEMPLATE" => "horizontal_multilevel",
							"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
							"MENU_CACHE_TYPE" => "A",	// Тип кеширования
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MAX_LEVEL" => "2",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "top_inner",	// Тип меню для остальных уровней
							"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
							"COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
							"MENU_THEME" => "site"
						),
						false
					); ?>
				</nav>
				<a href="/" class="header-logo mobile">
					<img class="change-logo" src="/local/templates/smart-module/images/mobile-logo.png" alt=""> </a>
				<a href="javascript:void(0);" class="header-nav-link clicksearch mobile">
					<ion-icon name="search">
						<img src="/local/templates/smart-module/images/search-m-new.png" alt="">
						<!--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill-rule="evenodd" clip-rule="evenodd"><path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5z"/></svg>
-->
					</ion-icon>
				</a>
				<!--<a href="tel:#WF_PHONES#" class="h-callback second">
						<img src="/local/templates/smart-module/images/call-back.png" alt="">
					</a>-->

			</div>

		</div>

		<? $APPLICATION->IncludeComponent(
			"bitrix:search.title",
			"search",
			array(
				"CATEGORY_0" => array("iblock_catalog"),
				"CATEGORY_0_TITLE" => "",
				"CATEGORY_0_iblock_catalog" => array("1"),
				"CHECK_DATES" => "N",
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"CONTAINER_ID" => "title-search",
				"INPUT_ID" => "title-search-input",
				"NUM_CATEGORIES" => "1",
				"ORDER" => "date",
				"PAGE" => "/search/index.php",
				"SHOW_INPUT" => "Y",
				"SHOW_OTHERS" => "N",
				"TOP_COUNT" => "5",
				"USE_LANGUAGE_GUESS" => "Y"
			)
		); ?>

		<?/*
		<div class="search_block ">
			<div class="box">
				<form role="search" method="get" class="search-form open" action="/search/">
					<label for="">
						<input type="search" class="search-field" placeholder="" value="" name="q">
						<input type="submit" class="search-submit desktop" value="Поиск">
						<button class="search-submit mobile" type="submit"><img src="<?=SITE_TEMPLATE_PATH?>/images/right-chevron.png" alt=""></button>
					</label>
				</form>
			</div>
			<div class="box">
				<div class="result_block">
					<div class="search_result">
						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
						<p class="result_name">Модульная школа CONTAINEX</p>
					</div>
						<div class="search_result">
						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
						<p class="result_name">Модульная школа CONTAINEX</p>
					</div>
						<div class="search_result">
						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
						<p class="result_name">Модульная школа CONTAINEX</p>
					</div>
						<div class="search_result">
						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
						<p class="result_name">Модульная школа CONTAINEX</p>
					</div>
				</div>
			</div>
		</div>*/ ?>

	</header>



	<div class="f_header-top default" id="f_menu">
		<div class="f_header_content box">
			<div class="f_header_icons">
				<svg class="ham hamRotate ham8 menu_rotate" viewBox="0 0 100 100" width="50">
					<path class="line_svg top_svg" d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20" />
					<path class="line_svg middle_svg" d="m 30,50 h 40" />
					<path class="line_svg bottom_svg" d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20" />
				</svg>



				<?php /*?>            <div class="f_header-burger active">
                  <i class="fas fa-bars"></i>

            </div>
            <div class="f_header_close">
                <i class="fas fa-times"></i>
            </div><?php */ ?>
			</div>
			<div class="f_header_logo">
				<img src="/local/templates/smart-module/images/icons/logo-sm.png" class="f_header_img">
			</div>
			<div class="header__h-city">
				<div class="h-city">
					<? $APPLICATION->IncludeComponent(
						"webfly:cities.popup",
						"template1",
						array(
							"CACHE_TIME" => "3600",
							"CACHE_TYPE" => "A",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"WF_FAVORITE" => "WF_CITY_ROD",
							"WF_JQUERY" => "Y"
						)
					); ?>
					<?/*<select onchange="location.href = this.value;">
                <option value="https://smart-module.ru">Санкт-Петербург</option>
                <option value="https://moskva.smart-module.ru">Москва</option>
                </select>*/ ?>
				</div>
				<? $APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/header/phone.php"
					)
				); ?>
				<!--
			<a href="tel:#WF_PHONES#" class="h-phone">
                <i class="fa fa-phone" aria-hidden="true"></i>
                8 (812) 907-14-59
            </a>
			-->
			</div>
			<nav class="header-nav">
				<div class="mobile-nav-button"></div>
				<ul class="header-nav-list">
					<?php /*?>     <div class="overlay"></div><?php */ ?>
					<li class="root-item root-item-first"><a href="/proekty/" class="header-nav-link">Проекты</a></li>
					<li class="header-nav-dropdown-inside num2">
						<a class="header-nav-link serv-link serv-link-cat" href="javascript:void(0);">Услуги</a>
						<ul class="header-nav-dropdown box">
							<div class="box">
								<li class="services_menu"><a href="/uslugi/dostavka/">Доставка</a></li>
								<li class="services_menu"><a href="/uslugi/arenda/">Аренда</a></li>
							</div>
						</ul>
					</li>
					<li class="root-item"><a href="/blog/" class="header-nav-link">Блог</a></li>

					<li class="header-nav-dropdown-inside num11">
						<a class="header-nav-link serv-link for-us-cat" href="javascript:void(0);">О нас</a>
						<ul class="header-nav-dropdown box">
							<div class="box">
								<li class="services_menu"><a href="/o-kompanii/">О компании</a></li>
								<li class="services_menu"><a href="/komanda/">Команда</a></li>
								<li class="services_menu"><a href="/proizvodstvo/">Производство</a></li>
								<li class="services_menu"><a href="/rekvizity/">Реквизиты</a></li>
								<li class="services_menu"><a href="/calculator/">Калькулятор</a></li>
							</div>
						</ul>
					</li>


					<li class="root-item"><a href="/kontaktyi/" class="header-nav-link">Контакты</a></li>
				</ul>
			</nav>
			<div class="f_header_button">
				<div class="header__h-callback header__h-callback_new">
					<a href="#callback-fb" class="h-callback h-callback_new" onclick="nrs('klik_po_knopke_v_sapke', {});">
						Получить консультацию
					</a>
				</div>
			</div>
			<div class="f_header_search">
				<a href="javascript:void(0);" class="header-nav-link clicksearch">
					<ion-icon name="search"><i class="fas fa-search"></i></ion-icon>
				</a></li>
			</div>

		</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:search.title",
			"search",
			array(
				"CATEGORY_0" => array("iblock_catalog"),
				"CATEGORY_0_TITLE" => "",
				"CATEGORY_0_iblock_catalog" => array("1"),
				"CHECK_DATES" => "N",
				"COMPOSITE_FRAME_MODE" => "A",
				"COMPOSITE_FRAME_TYPE" => "AUTO",
				"CONTAINER_ID" => "title-search",
				"INPUT_ID" => "title-search-input",
				"NUM_CATEGORIES" => "1",
				"ORDER" => "date",
				"PAGE" => "/search/index.php",
				"SHOW_INPUT" => "Y",
				"SHOW_OTHERS" => "N",
				"TOP_COUNT" => "5",
				"USE_LANGUAGE_GUESS" => "Y"
			)
		); ?>

		<?/*
    		<div class="search_block ">
    			<div class="box">
    				<form role="search" method="get" class="search-form open" action="/search/">
    					<label for="">
    						<input type="search" class="search-field" placeholder="" value="" name="q">
    						<input type="submit" class="search-submit desktop" value="Поиск">
    						<button class="search-submit mobile" type="submit"><img src="<?=SITE_TEMPLATE_PATH?>/images/right-chevron.png" alt=""></button>
    					</label>
    				</form>
    			</div>
    			<div class="box">
    				<div class="result_block">
    					<div class="search_result">
    						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
    						<p class="result_name">Модульная школа CONTAINEX</p>
    					</div>
    						<div class="search_result">
    						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
    						<p class="result_name">Модульная школа CONTAINEX</p>
    					</div>
    						<div class="search_result">
    						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
    						<p class="result_name">Модульная школа CONTAINEX</p>
    					</div>
    						<div class="search_result">
    						<img src="/local/templates/smart-module//images/search_result.png" alt="" class="result_image">
    						<p class="result_name">Модульная школа CONTAINEX</p>
    					</div>
    				</div>
    			</div>
    		</div>*/ ?>
	</div>
	<? //echo '<pre>'; var_dump(empty($request->getRequestedPageDirectory())); echo '</pre>';
	?>
	<? if ($request != NULL && $request->getRequestedPageDirectory() == '/' && $APPLICATION->GetCurPage() != "/404.php") : //Главная страница
	?>
	<div class="content-wrapper">
		<? //echo '<pre>'; var_dump('dsadasd'); echo '</pre>';
		?>
		<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"new-slider",
			array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"AJAX_MODE" => "N",	// Включить режим AJAX
				"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
				"COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
				"COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
				"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
				"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
				"DISPLAY_DATE" => "N",	// Выводить дату элемента
				"DISPLAY_NAME" => "N",	// Выводить название элемента
				"DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
				"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
				"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
				"FIELD_CODE" => array(	// Поля
					0 => "DETAIL_PICTURE",
					1 => "",
				),
				"FILTER_NAME" => "",	// Фильтр
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
				"IBLOCK_ID" => "66",	// Код информационного блока
				"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
				"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
				"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
				"NEWS_COUNT" => "20",	// Количество новостей на странице
				"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
				"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
				"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
				"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
				"PAGER_TITLE" => "Новости",	// Название категорий
				"PARENT_SECTION" => "",	// ID раздела
				"PARENT_SECTION_CODE" => "",	// Код раздела
				"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
				"PROPERTY_CODE" => array(	// Свойства
					0 => "BACKGROUND",
					1 => "POSITION",
					2 => "LINK_BUTTON",
					3 => "TEXT_BUTTON",
					4 => "",
				),
				"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
				"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
				"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
				"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
				"SET_STATUS_404" => "N",	// Устанавливать статус 404
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SHOW_404" => "N",	// Показ специальной страницы
				"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
				"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
				"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
				"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
				"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
			),
			false
		) ?>

		<section class="products-list-wrapper">
			<div class="box">
				<h1 class="box-title">"Смарт-модуль" - надежный поставщик модульных зданий по всей России.</h1>

				<?
				$arSelect = array(/* "ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_WF_SEO_TEXT" */);
				$arFilter = array("IBLOCK_ID" => 5, "ACTIVE" => "Y", "NAME" => $_SERVER['HTTP_HOST'] . $APPLICATION->GetCurPage());
				$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
				while ($ob = $res->GetNextElement()) {
					$arProps = $ob->GetProperties();
					$descr_new1 = $arProps['WF_SEO_TEXT']['~VALUE'][0]['TEXT'];
					$descr_new2 = $arProps['WF_SEO_TEXT']['~VALUE'][1]['TEXT'];
				}
				?>

				<? if ($descr_new1 != "") : ?>
					<?= $descr_new1 ?>
				<? endif; ?>
				#WF_TEXT#
				<div class="quest-box-text"></div>

			</div>
		</section>

		<section class="box">
			<div class="products-list">
				<? $APPLICATION->IncludeComponent(
					"bitrix:catalog.section.list",
					"main-sections",
					array(
						"COMPONENT_TEMPLATE" => "main-sections",
						"IBLOCK_TYPE" => "catalog",
						"IBLOCK_ID" => "1",
						"SECTION_ID" => "",
						"SECTION_CODE" => "",
						"COUNT_ELEMENTS" => "N",
						"TOP_DEPTH" => "1",
						"SECTION_FIELDS" => array(
							0 => "",
							1 => "",
						),
						"SECTION_USER_FIELDS" => array(
							0 => "UF_ICON",
							1 => "UF_SEC_LINK",
							2 => "UF_NAMEONMAIN",
							3 => "UF_HIDE_LINK",
						),
						"VIEW_MODE" => "LINE",
						"SHOW_PARENT_NAME" => "Y",
						"SECTION_URL" => "/catalog/#SECTION_CODE_PATH#/",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y",
						"ADD_SECTIONS_CHAIN" => "N",
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO"
					),
					false
				); ?>
			</div>
		</section>

		<section class="map-wrapper">
			<div class="box">
				<div class="box-title">
					<h2 class="box-title">Реализованные проекты</h2>
				</div>
			</div>
			<div class="projects">
				<? $APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"main-projects",
					array(
						"COMPONENT_TEMPLATE" => "main-projects",
						"IBLOCK_TYPE" => "content",
						"IBLOCK_ID" => "2",
						"NEWS_COUNT" => "100",
						"SORT_BY1" => "ACTIVE_FROM",
						"SORT_ORDER1" => "DESC",
						"SORT_BY2" => "SORT",
						"SORT_ORDER2" => "ASC",
						"FILTER_NAME" => "",
						"FIELD_CODE" => array(
							0 => "NAME",
							1 => "PREVIEW_TEXT",
							2 => "DETAIL_PICTURE",
							3 => "",
						),
						"PROPERTY_CODE" => array(
							0 => "MAP",
							1 => "",
						),
						"CHECK_DATES" => "Y",
						"DETAIL_URL" => "/proekty/#ELEMENT_CODE#/",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "36000000",
						"CACHE_FILTER" => "N",
						"CACHE_GROUPS" => "Y",
						"PREVIEW_TRUNCATE_LEN" => "",
						"ACTIVE_DATE_FORMAT" => "d.m.Y",
						"SET_TITLE" => "N",
						"SET_BROWSER_TITLE" => "N",
						"SET_META_KEYWORDS" => "N",
						"SET_META_DESCRIPTION" => "N",
						"SET_LAST_MODIFIED" => "N",
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",
						"PARENT_SECTION" => "",
						"PARENT_SECTION_CODE" => "",
						"INCLUDE_SUBSECTIONS" => "N",
						"STRICT_SECTION_CHECK" => "N",
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "Y",
						"DISPLAY_PICTURE" => "Y",
						"DISPLAY_PREVIEW_TEXT" => "Y",
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "N",
						"PAGER_TITLE" => "Новости",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"SET_STATUS_404" => "N",
						"SHOW_404" => "N",
						"MESSAGE_404" => ""
					),
					false
				); ?>
			</div>
		</section>

		<section class="advantages-company">
			<div class="box">
				<div class="advantages-company-wrapper">
					<a href="/proizvodstvo/ " class="advantages-company-col">
						<img src="upload/new-image/smart-image1.jpg" alt="">
						<span class="advantages-company-col__link">О производстве модульных зданий</span>
					</a>
					<a href="/komanda/ " class="advantages-company-col">
						<img src="upload/new-image/smart-image2.jpg" alt="">
						<span class="advantages-company-col__link">Команда компании «Смарт-модуль»</span>
					</a>
				</div>

				<div class="advantages-company-row">
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/factory.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>Собственное <br>
								производство</p>
						</div>
					</div>
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/cargo-crane.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>Всегда в <br>
								наличии</p>
						</div>
					</div>
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/documentation.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>Юридическое <br>
								соблюдение сроков</p>
						</div>
					</div>
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/maintenance.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>Сервисное <br>
								обслуживание</p>
						</div>
					</div>
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/logistics.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>Собственная <br>
								доставка</p>
						</div>
					</div>
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/certificate.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>Гарантия <br>
								на 1 год</p>
						</div>
					</div>
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/premium.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>Продукт премиум- <br>
								класса</p>
						</div>
					</div>
					<div class="advantages-company-item">
						<div class="advantages-company-item__icon"><img src="upload/new-image/expert.svg" alt=""></div>
						<div class="advantages-company-item__body">
							<p>В штате обученные <br>
								мастера</p>
						</div>
					</div>
				</div>

				<!-- <h3>Продажа бытовок, контейнеров и модульных зданий</h3> -->
				<div class="box-text">
					<?= $descr_new2 ?>
				</div>
			</div>
		</section>
		<?/*
		<!-- <section class="box">
			<div class="cols">
				<div class="col">
					<div class="info-box">
						<div class="info-box-image">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/info-image-1.jpg" alt="">
						</div>
						<div class="info-box-title">
							Собственное производство
						</div>
					</div>
					<div class="info-box">
						<div class="info-box-image">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/info-image-2.jpg" alt="">
						</div>
						<div class="info-box-title">
							Всегда в наличии
						</div>
					</div>
					<div class="info-box">
						<div class="info-box-image">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/info-image-3.jpg" alt="">
						</div>
						<div class="info-box-title">
							Юридическое соблюдение сроков
						</div>
					</div>
					<div class="info-box">
						<div class="info-box-image">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/info-image-4.jpg" alt="">
						</div>
						<div class="info-box-title">
							Сервисное обслуживание
						</div>
					</div>
					<div class="info-box">
						<div class="info-box-image">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/info-image-5.jpg" alt="">
						</div>
						<div class="info-box-title">
							Собственная доставка
						</div>
					</div>
					<div class="info-box">
						<div class="info-box-image">
							<img src="<?= SITE_TEMPLATE_PATH ?>/images/info-image-6.jpg" alt="">
						</div>
						<div class="info-box-title">
							Гарантия на 1 год
						</div>
					</div>
				</div>
				<div class="col">
					<div class="video-box">
						<iframe src="https://www.youtube.com/embed/P9Hpg_Qt69g?ecver=2" width="584" height="278" frameborder="0"></iframe>
					</div>
					<h2 class="text-title">Посмотрите прямую трансляцию с нашего производства</h2>
					<p>
						<br>
					</p>
					<p>
						Вы можете наблюдать за работой в режиме онлайн, и даже с телефона наблюдать как идет процесс изготовления вашего заказа.
					</p>
					<a href="#" class="button">Посмотреть</a>
				</div>
			</div>
		</section> -->
		<!--   <div class="gray-box">
		<section class="box quest-box">
			<div class="quest-box-title">Остались вопросы?</div>
			<div class="quest-box-text">Оставьте ваши данные и мы сделаем вам персональную скидку!</div>
			<div class="quest-box-button">
				<a href="#discount-popup" class="js-fancy button">Получить скидку</a>
			</div>
		</section>
	</div>-->
*/ ?>

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
		</section>

		<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"reviews",
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
				"DISPLAY_NAME" => "N",
				"DISPLAY_PICTURE" => "N",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(0 => "", 1 => "",),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "67",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "50",
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
				"PROPERTY_CODE" => array(0 => "", 1 => "",),
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


		<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"materials",
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
				"DISPLAY_NAME" => "N",
				"DISPLAY_PICTURE" => "N",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					0 => "DETAIL_PICTURE",
					1 => "",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_ID" => "6",
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "6",
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
				"PROPERTY_CODE" => array(
					0 => "READING_TIME",
					1 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "TIMESTAMP_X",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N",
				"COMPONENT_TEMPLATE" => "materials"
			),
			false
		); ?>


		<section class="clients">
			<div class="box">
				<div class="title-wrapper">
					<h2>Наши клиенты</h2>
				</div>
			</div>

			<div class="clients-slider">
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/the-arc.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/techcom.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/analy.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/the-found.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/oneside.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/judson.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/the-arc.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/techcom.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/analy.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/the-found.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/oneside.png" alt=""></div>
				</div>
				<div class="slide">
					<div class="clients-box"><img src="upload/new-image/judson.png" alt=""></div>
				</div>
			</div>
		</section>





	<? else : //Внутренние страницы 
	?>
		<div class="content-wrapper">
		<?
		$otrasli      = strripos($APPLICATION->GetCurPage(), '/otrasli/');
		$blog = strripos($APPLICATION->GetCurPage(), "/blog/");

		if ($otrasli === false && $blog === false) { ?>
			<section class="box">
				<div class="path">
					<? $APPLICATION->IncludeComponent(
						"bitrix:breadcrumb",
						"crumb",
						array(
							"COMPONENT_TEMPLATE" => "crumb",
							"START_FROM" => "0",
							"PATH" => "",
							"SITE_ID" => "s1",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO"
						),
						false
					); ?>
				</div>
			</section>
		<? } ?>


		<? if ($request != NULL && substr($request->getRequestedPageDirectory(), 0, 8) == "/catalog") : ?>
			<section class="box">

				<h1 class="box-title"><? $APPLICATION->ShowTitle(false); ?></h1>
				<?
				$arSelect = array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_WF_CATALOG_TOP_TEXT");
				$arFilter = array("IBLOCK_ID" => 5, "ACTIVE" => "Y", "NAME" => strtok($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'], '?')/* $_SERVER['HTTP_HOST'] . $APPLICATION->GetCurPage() */);

				$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
				while ($ob = $res->GetNextElement()) {
					$arFields = $ob->GetFields();
					$descr_new = $arFields['~PROPERTY_WF_CATALOG_TOP_TEXT_VALUE']['TEXT'];
				}
				?>

				<? if ($descr_new != "") : ?>
					<p class="under_title_text"><?= $descr_new ?></p>
				<? endif; ?>
				<? //$APPLICATION->ShowViewContent('descr');
				?>
				<!--
		<p class="under_title_text">
			Модульные здания относятся к категории мобильных конструкций контейнерного типа, которые стоят сравнительно
недорого и быстро собираются. По условиям проживания и функциональности они практически не уступают
капитальным постройкам. Отсутствие  ограничений на транспортировку, сборку и разборку – главное преимущество
подобных зданий.
		</p>-->
			</section>
		<? else : ?>
			<? if ($APPLICATION->GetCurPage() == "/tekhnologiya/") { ?>
				<h1 class="box-title"><? $APPLICATION->ShowTitle(false); ?></h1>
				<div class="video-container-tab">

					<div class="video-conainer-tab-cont active" id="video-tab-0">
						<video style="display:none;" muted id="video-0" poster="/local/templates/smart-module/images/video-n/1.jpg">
							<source type="video/mp4" src="/upload/video/1.mp4">
						</video>
						<img src="/local/templates/smart-module/images/video-n/1.jpg">
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
						<div class="progres-h1">Основу составляют легкие металоконструкции с обшивкой металлопрофилем или сендвич-панелями</div>
						<ul class="video-tab">
							<li data-id="video-tab-0" class="actives" style="padding-top: 10px;">Фасад<div></div><span></span></li>
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
			<? }



			$otrasli      = strripos($APPLICATION->GetCurPage(), '/otrasli/');
			$blog = strripos($APPLICATION->GetCurPage(), "/blog/");



			?>
			<? if ($otrasli === false) { ?>
				<section class="box">
					<? if ($APPLICATION->GetCurPage() == "/proizvodstvo/") { ?>
						<h1 class="box-title">О производстве быстровозводимых модульных зданий</h1>
					<? } else { ?>
						<? if ($APPLICATION->GetCurPage() != "/tekhnologiya/" && $blog === false) { ?>
							<h1 class="box-title"><? $APPLICATION->ShowTitle(false); ?></h1>
					<? }
					} ?>
					<div class="cols text-cols">

						<div class="col typography">

						<? } ?>

					<? endif ?>
				<? endif ?>
				<? if ($APPLICATION->GetCurPage() == '/blog/') : ?>
					<style>
						.show-more {
							display: none;
						}
					</style>
				<? endif; ?>


				<script>
					if ($(window).width() > 500) {

						var parFone = document.querySelector("#par-fone");

						var parText = document.querySelector("#par-text");

						function setTranslate(xPos, yPos, el) {
							if (el !== null) {
								el.style.transform = "translate3d(" + xPos + ", " + yPos + "px, 0)";
							}
						}

						window.addEventListener("DOMContentLoaded", scrollLoop, false);

						var xScrollPosition;
						var yScrollPosition;

						function scrollLoop() {
							xScrollPosition = window.scrollX;
							yScrollPosition = window.scrollY;

							setTranslate(0, yScrollPosition * .45, parFone);
							setTranslate(0, yScrollPosition * .24, parText);

							requestAnimationFrame(scrollLoop);
						}


					};
				</script>