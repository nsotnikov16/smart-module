<? if ($request != NULL && !empty($request->getRequestedPageDirectory())): //Внутренние страницы 
		?>
	<? if ($request != NULL && substr($request->getRequestedPageDirectory(), 0, 8) != "/catalog"): ?>
		</div>
		</div>
		</section>
	<? endif ?>
<? endif ?>
<? if ($APPLICATION->GetCurPage() == "/404.php"): ?>
	</div>
	</div>
	</section>
<? endif; ?>
<? $isNew = true; ?>
</div>
<footer class="footer-wrapper">
	<div class="footer__top">
		<div class="box">
			<div class="footer__topwrapper">
				<div class="footer__f-info">
					<div class="f-info">
						<a href="/" class="f-info__logo">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/footer/logo.php"
								)
							);
							?>
						</a>
						<a href="tel:#WF_PHONES#" class="phone-f #WF_PHONE_REPLACE#">#WF_PHONES#</a>

						<div class="schedule-f">пн-пт: с 9:00 - 18:00</div>
						<p class="f-info__description">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/footer/info.php"
								)
							); ?>
						</p>
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/footer/info-link.php"
							)
						); ?>
					</div>
				</div>
				<? /*<div class="footer__f-menu">
			   <div class="f-menu">
				   <a href="#" class="f-menu__title">
					   Каталог
				   </a>
				   <?$APPLICATION->IncludeComponent(
				   "bitrix:menu",
				   "footer-catalog-menu",
				   Array(
				   "CACHE_TIME" => "36000000",
				   "CACHE_TYPE" => "A",
				   "DEPTH_LEVEL" => "3",
				   "IBLOCK_ID" => "1", // ID вашего инфоблока,по разделам которого хотите построить меню
				   "IBLOCK_TYPE" => "catalog", //тип инфоблока
				   "ID" => '',
				   "IS_SEF" => "N",
				   "SECTION_URL" => ""
				   )
				   );?>
			   </div>
		   </div>*/?>
				<div class="footer__f-menu desktop" style="display:inline-block">
					<? $APPLICATION->IncludeComponent(
						"bitrix:menu",
						"footer-multi-menu",
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "top_inner",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"DELAY" => "N",
							"MAX_LEVEL" => "2",
							"MENU_CACHE_GET_VARS" => array(0 => "",
							),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "bottom",
							"USE_EXT" => "Y"
						)
					); ?>

					<? /*
				  <div class="f-menu">
					  <a href="#" class="f-menu__title">
						  Услуги
					  </a>
					  <ul class="f-menu__list">
						  <li class="f-menu__item">
							  <a href="#" class="f-menu__link">
								  <ion-icon name="expand"></ion-icon>
								  Доставка
							  </a>
						  </li>
						  <li class="f-menu__item">
							  <a href="#" class="f-menu__link">
								  <ion-icon name="expand"></ion-icon>
								  Аренда
							  </a>
						  </li>
					  </ul>
				  </div>
				  <div class="f-menu">
					  <a href="#" class="f-menu__title">
						  Проекты
					  </a>
				  </div>
				  <div class="f-menu">
					  <a href="#" class="f-menu__title">
						  Блог
					  </a>
				  </div>
				  */?>
				</div>
				<div class="footer__f-menu desktop" style="display:inline-block">
					<? $APPLICATION->IncludeComponent(
						"bitrix:menu",
						"footer-multi-menu2",
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "top_inner",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO",
							"DELAY" => "N",
							"MAX_LEVEL" => "2",
							"MENU_CACHE_GET_VARS" => array(0 => "",
							),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "N",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "bottom2",
							"USE_EXT" => "Y"
						)
					); ?>
				</div>

			</div>

			<? $APPLICATION->IncludeComponent(
				"bitrix:menu",
				"footer-multi-menu-new",
				array(
					"ALLOW_MULTI_SELECT" => "N",
					"CHILD_MENU_TYPE" => "top_inner",
					"COMPOSITE_FRAME_MODE" => "A",
					"COMPOSITE_FRAME_TYPE" => "AUTO",
					"DELAY" => "N",
					"MAX_LEVEL" => "2",
					"MENU_CACHE_GET_VARS" => array(""),
					"MENU_CACHE_TIME" => "3600",
					"MENU_CACHE_TYPE" => "N",
					"MENU_CACHE_USE_GROUPS" => "Y",
					"ROOT_MENU_TYPE" => "topmob",
					"USE_EXT" => "Y"
				)
			); ?>
			<? /*
		<div class="footer__f-menu mobile">
			<div class="f-menu with_list" >
				<a href="#" class="f-menu__title">
					Каталог						
				</a>
				<ul class="f-menu__list">
					<li class="f-menu__item">
						<img src="/local/templates/smart-module/images/icons/sq-transp.png" alt="alt" class="square-icon">
						<a href="/catalog/metallicheskie-bytovki/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Металлические бытовки						</a>
					</li>
					<li class="f-menu__item">
						<a href="/catalog/kontejneryi/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Металлические контейнеры						</a>
					</li>
					<li class="f-menu__item">
						<a href="/catalog/angary/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Ангары						</a>
					</li>
					<li class="f-menu__item">
						<a href="/catalog/modulnye-zdaniya/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Модульные здания						</a>
					</li>
					<li class="f-menu__item">
						<a href="/catalog/rekonstruktsiya-konteynerov/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Переоборудование контейнеров						</a>
					</li>
					<li class="f-menu__item">
						<a href="/catalog/modulnye-stantsii/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Модульные станции						</a>
					</li>
					<li class="f-menu__item">
						<a href="/catalog/torgovye-pavilony/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
							Торговые павильоны						
						</a>
					</li>
				</ul>
			</div>					
			<div class="f-menu with_list">
				<a href="javascript:void(0);" class="f-menu__title">
					Услуги						
				</a>
				<ul class="f-menu__list">
					<li class="f-menu__item">
						<a href="/uslugi/dostavka/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Доставка						</a>
					</li>
					<li class="f-menu__item">
						<a href="/uslugi/arenda/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
						Аренда						</a>
					</li>
				</ul>
			</div>					
			<div class="f-menu">
				<a href="/proekty/" class="f-menu__title">
					Проекты						
				</a>
			</div>					
			<div class="f-menu">
				<a href="/blog/" class="f-menu__title">
					Блог						
				</a>
			</div>
			<div class="f-menu  with_list">
				<a href="javascript:void(0);" class="f-menu__title">
				Контакты						</a>
				<ul class="f-menu__list">
					<li class="f-menu__item">
						<a href="/uslugi/dostavka/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
											</a>
					</li>
					<li class="f-menu__item">
						<a href="/uslugi/arenda/" class="f-menu__link">
							<ion-icon name="expand" role="img" class="hydrated" aria-label="expand"></ion-icon>
											</a>
					</li>
				</ul>
			</div>
		</div>
		*/?>
			<div class="footer__f-contacts" style="display:inline-block">
				<div class="f-contacts">
					<b class="f-menu__title">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/footer/contact-title.php"
							)
						); ?>
					</b>
					<p class="f-contacts__description">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/footer/address.php"
							)
						); ?>
					</p>
					<p class="f-contacts__description">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/footer/phone.php"
							)
						); ?>
					</p>
					<p class="f-contacts__description">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/footer/email.php"
							)
						); ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="footer__bottom">
		<div class="box">
			<div class="footer__bottomwrapper">
				<div class="footer__f-copy">
					<!-- class="f-copy" -->
					<p>
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"COMPOSITE_FRAME_MODE" => "A",
								"COMPOSITE_FRAME_TYPE" => "AUTO",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/footer/copy.php"
							)
						); ?>
					</p>


				</div>
				<div class="footer__f-social">
					<ul class="h-social f-social">
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
									"PATH" => "/include/footer/vk.php"
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
									"PATH" => "/include/footer/facebook.php"
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
									"PATH" => "/include/footer/instagram.php"
								)
							); ?>
						</li>
					</ul>
				</div>

				<a href="/politika-konfidentsialnosti/" class="footer-pk">Политика конфиденциальности</a>

			</div>
		</div>
	</div>
	<? /*
  <div class="box">
  <div class="footer-sitemap">
  <?$APPLICATION->IncludeComponent("bitrix:menu", "bottom", Array(
  "COMPONENT_TEMPLATE" => ".default",
  "ROOT_MENU_TYPE" => "bottom",	// Тип меню для первого уровня
  "MENU_CACHE_TYPE" => "A",	// Тип кеширования
  "MENU_CACHE_TIME" => "360000",	// Время кеширования (сек.)
  "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
  "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
  "MAX_LEVEL" => "1",	// Уровень вложенности меню
  "CHILD_MENU_TYPE" => "bottom",	// Тип меню для остальных уровней
  "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
  "DELAY" => "N",	// Откладывать выполнение шаблона меню
  "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
  "COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
  "COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
  ),
  false
  );?>
  </div>
  <div class="footer-contacts">
  <div class="footer-contacts-title">
  Адрес:
  </div>
  <div class="footer-contacts-footer">
  <div class="footer-contacts-footer-box">
  <div class="phone-box">
	  #WF_PHONES#
  </div>
  </div>
  <div class="footer-contacts-footer-box">
  <a href="https://vk.com/smart_module" target="_blank" rel="nofollow" class="icon vk-icon"></a>
  <a href="https://www.facebook.com/Smart-Module-1428037370634428/" target="_blank" rel="nofollow" class="icon fb-icon"></a>
  <a href="https://www.youtube.com/channel/UCe0MhLxBpNUuyEXD-G28J6w" target="_blank" rel="nofollow" class="icon yt-icon"></a>
  <a href="https://www.instagram.com/smart_module/" target="_blank" rel="nofollow" class="icon inst-icon"></a>
  </div>
  </div>
  </div>
  </div>
  */?>
</footer>
<!-- Модалка для корзины -->
<div class="mod-basket active" id="mod_basket" style="display:none">
	<a href="#" class="mod-basket__icon">0</a>
	<div class="mod-basket__wrapper">
		<div class="mod-basket__title">
			Корзина
		</div>
		<div class="mod-basket__list">
			<? /*<div class="mod-basket__item">
		<a href="#" class="mod-basket__name">
		Дополнительная дверь, деревянная ДГ-9, 800x2000 мм
		</a>
		<div class="mod-basket__count">
		<a href="#" class="mod-basket__minus">-</a>
		<input type="text" class="mod-basket__input" value="1">
		<a href="#" class="mod-basket__plus">+</a>
		</div>
		<div class="mod-basket__pricewp">
		<div class="mod-basket__label">
			Стоимость:
		</div>
		<div class="mod-basket__price">
			7000 руб
		</div>
		</div>
		<div class="mod-basket__deletewp">
		<a href="#" class="mod-basket__delete">
			<ion-icon name="close"></ion-icon>
		</a>
		</div>
		</div>
		<div class="mod-basket__item">
		<a href="#" class="mod-basket__name">
		Дополнительная дверь, деревянная ДГ-9, 800x2000 мм
		</a>
		<div class="mod-basket__count">
		<a href="#" class="mod-basket__minus">-</a>
		<input type="text" class="mod-basket__input" value="1">
		<a href="#" class="mod-basket__plus">+</a>
		</div>
		<div class="mod-basket__pricewp">
		<div class="mod-basket__label">
			Стоимость:
		</div>
		<div class="mod-basket__price">
			7000 руб
		</div>
		</div>
		<div class="mod-basket__deletewp">
		<a href="#" class="mod-basket__delete">
			<ion-icon name="close"></ion-icon>
		</a>
		</div>
		</div>*/?>

		</div>
		<div class="mod-basket__bottom">
			<div class="mod-basket__sum">
				Итого: <span>14000 руб</span>
			</div>
			<div class="mod-basket__btnleft">
				<a href="#order-popup" class="mod-basket__oform js-fancy">
					оформить заказ
				</a>
			</div>
			<div class="mod-basket__btnright">
				<a href="#" class="mod-basket__back">
					Продолжить подбор
				</a>
			</div>
		</div>
	</div>
</div>
<!-- Модалка для корзины END -->
<div class="p-popup" id="callback-fb" style="display: none;">
	<div class="p-popup__wrapper" id="ok-form">
		<div class="p-popup__title">
			Обратный звонок
		</div>
		<p class="p-popup__description">
			Оставте заявку и наш оператор свяжется с Вами в течении 2х минут
		</p>
		<form action="" method="POST" id="callBack" novalidate name="fb-callback">
			<p id="messageform"></p>
			<input type="text" class="p-popup__input" name="SM_FORM_NAME" placeholder="Ваше Имя">
			<input type="text" class="p-popup__input" name="SM_FORM_PHONE" placeholder="Ваш телефон">
			<input type="submit" class="p-popup__btn" value="Отправить">
			<div class="p-popup__check">
				<input required type="checkbox" id="checkid1" name="SM_FORM_CHECK" checked="checked">
				<label for="checkid1">
					Согласие на обработку персональных данных
				</label>
			</div>
		</form>
	</div>
</div>




<div id="discount-popup" class="popup discount-popup">
	<div class="discount-form">
		<div class="discount-form-title">Получить персональную скидку</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:form.result.new",
			"",
			array(
				"WEB_FORM_ID" => "1",
				// ID веб-формы
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				// Игнорировать свой шаблон
				"USE_EXTENDED_ERRORS" => "Y",
				// Использовать расширенный вывод сообщений об ошибках
				"SEF_MODE" => "N",
				// Включить поддержку ЧПУ
				"SEF_FOLDER" => "",
				// Каталог ЧПУ (относительно корня сайта)
				"CACHE_TYPE" => "A",
				// Тип кеширования
				"CACHE_TIME" => "3600",
				// Время кеширования (сек.)
				"LIST_URL" => "",
				// Страница со списком результатов
				"EDIT_URL" => "",
				// Страница редактирования результата
				"SUCCESS_URL" => "",
				// Страница с сообщением об успешной отправке
				"CHAIN_ITEM_TEXT" => "",
				// Название дополнительного пункта в навигационной цепочке
				"CHAIN_ITEM_LINK" => "",
				// Ссылка на дополнительном пункте в навигационной цепочке
				"VARIABLE_ALIASES" => array(
					"WEB_FORM_ID" => "WEB_FORM_ID",
					"RESULT_ID" => "RESULT_ID",
				),
				"AJAX_MODE" => "Y",
				"AJAX_OPTION_SHADOW" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N"
			),
			false
		); ?>
	</div>
</div>
<div id="order-popup" class="popup discount-popup">
	<div class="discount-form">
		<div class="discount-form-title">Оформление заказа</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:form.result.new",
			"",
			array(
				"WEB_FORM_ID" => "2",
				// ID веб-формы
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				// Игнорировать свой шаблон
				"USE_EXTENDED_ERRORS" => "Y",
				// Использовать расширенный вывод сообщений об ошибках
				"SEF_MODE" => "N",
				// Включить поддержку ЧПУ
				"SEF_FOLDER" => "",
				// Каталог ЧПУ (относительно корня сайта)
				"CACHE_TYPE" => "A",
				// Тип кеширования
				"CACHE_TIME" => "3600",
				// Время кеширования (сек.)
				"LIST_URL" => "",
				// Страница со списком результатов
				"EDIT_URL" => "",
				// Страница редактирования результата
				"SUCCESS_URL" => "",
				// Страница с сообщением об успешной отправке
				"CHAIN_ITEM_TEXT" => "",
				// Название дополнительного пункта в навигационной цепочке
				"CHAIN_ITEM_LINK" => "",
				// Ссылка на дополнительном пункте в навигационной цепочке
				"VARIABLE_ALIASES" => array(
					"WEB_FORM_ID" => "WEB_FORM_ID",
					"RESULT_ID" => "RESULT_ID",
				),
				"AJAX_MODE" => "Y",
				"AJAX_OPTION_SHADOW" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "N",
				"AJAX_OPTION_HISTORY" => "N"
			),
			false
		); ?>
	</div>
</div>

<div class="p-popup" id="select-city-fo-map" style="display: none;">
	<div class="p-popup__wrapper">
		<div class="p-popup__title">
			<div class="back-to-map" style="display:none;">Назад к карте</div><span>Выберите свой регион на карте</span>
		</div>

		<div class="popup-search">
			<input type="text" placeholder="Быстрый поиск города" name="search" id="map-search">

		</div>
	</div>


	<div id="container" style="position: relative; width: 100%; height: 400px;
	padding-top: 10px;"></div>
	<div class="city-block" style=" display:none;"></div>



</div>

<!-- BEGIN Neiros code-->
<script>
	(function (w, d, h) {
		ni = d.cookie.match(/neiros_id=(.+?)(;|$)/);
		nv = d.cookie.match(/neiros_visit=(.+?)(;|$)/);
		if (ni) {
			ni = ni[1];
		}
		if (nv) {
			nv = nv[1];
		}
		var _mkey = "df65ab260fc492b79b97dc21ec31b44d_36";
		url = "https://neiros.cloud/api/widget_site/getv2/" + _mkey + "?ni=" + ni + "&nv=" + nv + "&referrer=" + encodeURIComponent(document.referrer) + "&URl=" + encodeURIComponent(d.location.href);
		let scr = {
			"scripts": [{
				"src": url,
				"async": false
			}]
		};
		console.log(scr);
		console.log(url);
		! function (t, n, r) {
			"use strict";
			var c = function (t) {
				if ("[object Array]" !== Object.prototype.toString.call(t)) return !1;
				for (var r = 0; r < t.length; r++) {
					var c = n.createElement("script"),
						e = t[r];
					c.src = e.src, c.async = e.async, n.body.appendChild(c)
				}
				return !0
			};
			t.addEventListener ? t.addEventListener("DOMContentLoaded", function () {
				c(r.scripts);
			}, !1) : t.attachEvent ? t.attachEvent("onload", function () {
				c(r.scripts)
			}) : t.onload = function () {
				c(r.scripts)
			}
		}(window, document, scr);
	})(window, document, "neiros.cloud");
</script>
<noscript><img src="https://neiros.cloud/api/noscript/63d173695571256f3cd37660e7dbbde7_12" alt="neiros" /> </noscript>
<!-- END Neiros code -->

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
	(function (m, e, t, r, i, k, a) {
		m[i] = m[i] || function () { (m[i].a = m[i].a || []).push(arguments) };
		m[i].l = 1 * new Date();
		for (var j = 0; j < document.scripts.length; j++) { if (document.scripts[j].src === r) { return; } }
		k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
	})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

	ym(45525420, "init", {
		clickmap: true,
		trackLinks: true,
		accurateTrackBounce: true,
		webvisor: true
	});
</script>
<script>
	$('.certificate-image .slick-arrow.slick-next, .certificate-image .slick-arrow.slick-prev').mouseover(function () {
		$(this).addClass('active');
	});
	$('.certificate-image .slick-arrow.slick-next, .certificate-image .slick-arrow.slick-prev').mouseleave(function () {
		$(this).removeClass('active');
	});
</script>
<script>
	$(document).ready(function () {
		$('.h-callback').fancybox();

		$('.mod-basket__icon').on('click', function () {
			if ($(this).parent().hasClass('active')) {
				var modbaskwidth = $(this).parent().width();
				$(this).parent().animate({
					'right': '-' + modbaskwidth + 'px'
				}, 1000);
				$(this).parent().removeClass('active');
				return false;
			} else {
				$(this).parent().animate({
					'right': '0'
				}, 1000);
				$(this).parent().addClass('active');
				return false;
			}
		});
		$('.mod-basket__back').on('click', function () {
			$('.mod-basket__icon').trigger('click');
			return false;
		});
	});
</script>
<script type="text/javascript">
	jQuery(function ($) {
		$("input[name=SM_FORM_PHONE]").mask("+7 (999)999-99-99");
		$("#akc-phone").mask("+7 (999)999-99-99");
	});
</script>
<noscript>
	<div><img src="https://mc.yandex.ru/watch/45525420" style="position:absolute; left:-9999px;" alt="" /></div>
</noscript>
<!-- /Yandex.Metrika counter -->


<? $APPLICATION->IncludeComponent(
	"webfly:meta.edit",
	"",
	array()
); ?>
<script>
	$(document).ready(function () {


		$('.footer-wrapper').addClass('js-fixed-footer')
		$('.footer-wrapper').before('<div class="block-footer-height"></div>');
		$('.block-footer-height').matchHeight({
			target: $('.footer-wrapper')
		});



		$('#callBack').on('submit', function (e) {
			//alert('submit');
			e.preventDefault();
			var form = $(this);
			//var str = $(this).parent('form').serialize();
			var str = $('#callBack').serialize()
			console.log(str);
			name = $('#callBack input[name="SM_FORM_NAME"]').val();
			phone = $('#callBack input[name="SM_FORM_PHONE"]').val();
			$.ajax({
				type: "POST",
				url: "/include/header/callback.php",
				data: str,
				success: function (html) {
					if (html.type == "error") {
						// console.log('error');
						$('#messageform').html(html.msg);
						//$(form).prepend(html.msg);
					} else {
						// console.log('ok');
						$('#ok-form').html(html.msg);
						$('input').val('');
						if (typeof NeirosEventSend != 'undefined') {
							NeirosEventSend('send-event', {
								"type": 'form',
								"data": {
									"name": name,
									"phone": phone
								}
							});
						}

						setTimeout(function () {
							window.location.href = "https://smart-module.ru/thank/";
						}, 1000);


						//$(form).replaceWith(html.msg);
						// alert("Обратный звонок успешно отправлен");
					}
				}
			});
			return false;
		});
	});
</script>
<script src="//cdnjs.cloudflare.com/ajax/libs/d3/3.5.3/d3.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/topojson/1.6.9/topojson.min.js"></script>
<script src="/local/templates/smart-module/js/data-maps/datamaps.rus.js"></script>

<script>
	$('#map-search').on('keyup', function () {

		$.ajax({
			type: "POST",
			url: "/include/ajax/search.php",
			data: {
				city: $(this).val()
			},
			success: function (html) {
				$('#container').css('display', 'none');
				$('.city-block').css('display', 'block');
				$('.city-block').html(html);
			}
		});
		$('#select-city-fo-map .p-popup__title span').html('Выберите свой город');
		$('#select-city-fo-map .back-to-map').css('display', 'block');

	})



	$(document).on('click', '.all-region-mobile span', function () {

		$.ajax({
			type: "POST",
			url: "/include/ajax/search.php",
			data: {
				region: $(this).html()
			},
			success: function (html) {
				$('#container').css('display', 'none');
				$('.city-block').css('display', 'block');
				$('.city-block').html(html);
				$('#select-city-fo-map .p-popup__title span').html('Выберите свой город');
				$('#select-city-fo-map .back-to-map').css('display', 'block');
			}
		});

	})


	$('.back-to-map').on('click', function () {
		$('.city-block').css('display', 'none');
		$('#select-city-fo-map .p-popup__title span').html('Выберите свой регион на карте');
		$('#container').css('display', 'block');
		$('#select-city-fo-map .back-to-map').css('display', 'none');

	})
	scale = 600;
	if ($(window).width() <= 768) {
		$('#select-city-fo-map .p-popup__title span').html('Выберите свой регион');
		$('.back-to-map').html('К выбору региона');
		$.ajax({
			type: "POST",
			url: "/include/ajax/search.php",
			data: {
				allregion: ''
			},
			success: function (html) {
				$('#container').html(html);
			}
		});
	}

	function start_map() {

		if ($(window).width() >= 1024) {
			console.log($('#container').html());
			if ($('#container').html() === '') {
				var width = $('#container').width(),
					height = $('#container').height();

				//basic map config with custom fills, mercator projection
				var map = new Datamap({
					scope: 'rus',
					element: document.getElementById('container'),
					responsive: true,
					setProjection: function (element) {
						var projection = d3.geo.albers()
							.rotate([-105, 0])
							.center([-10, 65])
							.parallels([52, 64])
							.scale(scale)
							.translate([width / 2, height / 2]);
						var path = d3.geo.path()
							.projection(projection);

						return {
							path: path,
							projection: projection
						};
					},
					fills: {
						defaultFill: '#E0E0E0',
						lt50: 'rgba(0,244,244,0.9)',
						gt50: 'red'
					},

					data: {
						'071': {
							fillKey: 'lt50'
						},
						'001': {
							fillKey: 'gt50'
						}
					},
					geographyConfig: {
						highlightFillColor: '#638FC1',
						highlightBorderColor: 'rgba(245, 245, 245, 0.2)'
					},
					done: function (datamap) {
						datamap.svg.selectAll('.datamaps-subunit').on('click', function (geography) {
							//geography.properties.name

							$.ajax({
								type: "POST",
								url: "/include/ajax/search.php",
								data: {
									region: geography.properties.name
								},
								success: function (html) {
									$('#container').css('display', 'none');
									$('.city-block').css('display', 'block');
									$('.city-block').html(html);
									$('#select-city-fo-map .p-popup__title span').html('Выберите свой город');
									$('#select-city-fo-map .back-to-map').css('display', 'block');
								}
							});
						});
					}
				});

				window.addEventListener('resize', function (event) {
					map.resize();
				});
			}
		}
	}

	$(".h-callback-map").fancybox({
		afterClose: function () {
			/*           $('#container').html()*/

		}
	});
</script>
<? global $APPLICATION;

if (intval($_REQUEST['PAGEN_1']) > 0) {
	$APPLICATION->SetPageProperty("title", $APPLICATION->GetTitle() . " в #WF_CITY_PRED# | страница " . intval($_REQUEST['PAGEN_1']));
}


?>

<script>
	$('.kombox-filter-submit').hide()
	$('#kombox-filter input[type=checkbox]').on('click', function () {
		$check = 0;
		$('#kombox-filter input[type=checkbox]').each(function (index, element) {
			if ($(this).is(':checked')) {
				$check = 1;

			}
		});
		if ($check === 1) {
			$('.kombox-filter-submit-cont input').show();
			$('.kombox-filter-submit').show();


		} else {
			$('.kombox-filter-submit-cont input').hide();
			$('.kombox-filter-submit').hide()

		}


	})



	BX.ready(function () {
		BX.showWait = function (node, msg) {

		};
		BX.closeWait = function (node, obMsg) {
			name = '';
			name = $('input[name="form_text_8"]').val()
			phone = $('input[name="form_text_9"]').val()
			email = $('input[name="form_text_10"]').val()
			phone2 = $('input[name="form_text_2"]').val()

			if (typeof phone === 'undefined') {
				phone = phone2;
			}

			if (typeof name === 'undefined' || name === 'undefined') {
				name = '';
			}

			if (typeof NeirosEventSend != 'undefined') {
				NeirosEventSend('send-event', {
					"type": 'form',
					"data": {
						"name": name,
						"phone": phone,
						"email": email
					}
				});
			}

			/*setTimeout(function() {
window.location.href = "https://smart-module.ru/thank/";
}, 1000);	*/
		};
	});


	<? if ($APPLICATION->GetCurDir() == '/'): ?>
		$(document).ready(function () {
			$(".fancybox").fancybox();
		});
		$('.reviews-slider').slick({
			slidesToShow: 5,
			appendArrows: '.reviews-slider-nav',
			prevArrow: '<button type="button" class="slick-prev slick-arrow-my"></button>',
			nextArrow: '<button type="button" class="slick-next slick-arrow-my"></button>',
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 2,
				}
			}
			]
		});

		$('.materials-slider').slick({
			slidesToShow: 3,
			appendArrows: '.materials-slider-nav',
			prevArrow: '<button type="button" class="slick-prev slick-arrow-my"></button>',
			nextArrow: '<button type="button" class="slick-next slick-arrow-my"></button>',
			responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			}
			]
		});

		$('.clients-slider').slick({
			slidesToShow: 1,
			// centerMode: true,
			variableWidth: true,
			arrows: false,
			infinite: true,
			autoplay: true,
			autoplaySpeed: 2000,
		});

	<? endif; ?>

	if ($('.materials-slider').length !== 0) {
		$('.materials-slider').not('.slick-initialized').slick({
			slidesToShow: 3,
			appendArrows: '.materials-slider-nav',
			prevArrow: '<button type="button" class="slick-prev slick-arrow-my"></button>',
			nextArrow: '<button type="button" class="slick-next slick-arrow-my"></button>',
			responsive: [{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
				}
			}
			]
		});
	}
</script>
</body>

</html>