<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)) : ?>
	<ul class="header-nav-list">


		<?php /*?>		<div class="overlay"></div><?php */ ?>
		<div class="header__h-city mobile">
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
				<?php /*?>				<link rel="stylesheet" href="/local/templates/smart-module/components/webfly/cities.popup/template1/styles.min.css">
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
				</div><?php */ ?>
			</div>
		</div>


		<li class="header-nav-dropdown-inside num1">
			<a class="header-nav-link cat-link" href="javascript:void(0);">Каталог <i class="fa fa-angle-down" aria-hidden="true"></i></a>

			<div class="header-nav-dropdown box">
				<?
				if (CModule::IncludeModule('iblock')) {

					//Работа с пользовательским полем раздела UF_CURRENT_TOP_MENU
					$path = array_filter(explode('/', $APPLICATION->GetCurDir()), function ($value) {
						return $value != '';
					});
					$reqCode = $path[array_key_last($path)];
					if ($reqCode) :
						$resCurrentSection = CIBlockSection::GetList(array('SORT' => 'ASC'), array('IBLOCK_ID' => 1, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y', 'DEPTH_LEVEL' => 1, '=CODE' => $reqCode), true, ['ID', 'UF_CURRENT_TOP_MENU'])->Fetch();
						$arrNewNames = [];
						if ($resCurrentSection) :
							foreach ($resCurrentSection['UF_CURRENT_TOP_MENU'] as $k => $v) :
								$arr = explode(', ', $v);
								$id = $arr[0];
								$newName = $arr[1];
								$arrNewNames[$id] = $newName;
							endforeach;
						endif;
					endif;
					// end


					$arSelect = array('ID', 'NAME', 'SECTION_PAGE_URL', 'UF_ICONMENU', 'UF_NAME_TOP_MENU', 'UF_CURRENT_TOP_MENU', 'UF_HIDE_LINK');
					$arFilter = array('IBLOCK_ID' => 1, 'ACTIVE' => 'Y', 'GLOBAL_ACTIVE' => 'Y', 'DEPTH_LEVEL' => 1);
					$res = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter, true, $arSelect);
					while ($ob = $res->GetNext()) { ?>
						<? if (!empty($arParams['INCLUDED'][$ob['ID']])) continue; ?>

						<? if ($ob['UF_HIDE_LINK'] == 1) continue; ?>

						<? $arPhotoSmall = CFile::ResizeImageGet(
							$ob['UF_ICONMENU'],
							array(
								'width' => 26,
								'height' => 37
							),
							BX_RESIZE_IMAGE_PROPORTIONAL,
							array(
								"name" => "sharpen",
								"precision" => 0
							)
						);
						if ($arrNewNames[$ob['ID']]) $ob['NAME'] = $arrNewNames[$ob['ID']]; ?>
						<div <? if ($ob['ID'] == '297') : ?>style="margin-top: 0px;" <? endif ?> class="metallicheskie-bytovki"><a class="metallicheskie-bytovki-link" href="<?= $ob['SECTION_PAGE_URL']; ?>" style="background: url('<?= $arPhotoSmall["src"] ?>') 0 0 no-repeat !important; background-position: left!important;"><?= $ob['UF_NAME_TOP_MENU'] ?? $ob['NAME']; ?></a>
							<span class="m-menu-plus">+</span>
							<span class="m-menu-minus">-</span>
							<? $APPLICATION->IncludeComponent(
								"bitrix:catalog.section.list",
								"top_menu_subsections",
								array(
									"ADD_SECTIONS_CHAIN" => "N",
									"CACHE_GROUPS" => "Y",
									"CACHE_TIME" => "36000000",
									"CACHE_TYPE" => "N",
									"COMPOSITE_FRAME_MODE" => "A",
									"COMPOSITE_FRAME_TYPE" => "AUTO",
									"COUNT_ELEMENTS" => "N",
									"IBLOCK_ID" => "1",
									"IBLOCK_TYPE" => "catalog",
									"SECTION_CODE" => "",
									"SECTION_FIELDS" => array("", ""),
									"SECTION_ID" => $ob['ID'],
									"SECTION_URL" => "",
									"SECTION_USER_FIELDS" => array("UF_NAME_TOP_MENU", "UF_CURRENT_TOP_MENU", 'UF_HIDE_LINK'),
									"SHOW_PARENT_NAME" => "Y",
									"TOP_DEPTH" => "1",
									"VIEW_MODE" => "LINE",
									'arr_new_names' => $arrNewNames,
								)
							); ?>
						</div>
				<? }
				}
				?>
			</div>
		</li>
		<?/*global $USER;
if($USER->IsAdmin()):?>
<li class="header-nav-dropdown-inside">
	<a class="header-nav-link" href="/catalog/">Каталог <i class="fa fa-angle-down" aria-hidden="true"></i></a>
	<ul class="header-nav-dropdown box">
		<li class="metallicheskie-bytovki"><a href="/catalog/metallicheskie-bytovki/">Металлические бытовки </a>
		<ul class="metallicheskie-bytovki__sublist">
			<li class="metallicheskie-bytovki__subitem">
				<a href="#" class="metallicheskie-bytovki__sublink">Блок контейнеры</a>
			</li>
			<li class="metallicheskie-bytovki__subitem">
				<a href="#" class="metallicheskie-bytovki__sublink">Вагончики бытовики</a>
			</li>
			<li class="metallicheskie-bytovki__subitem">
				<a href="#" class="metallicheskie-bytovki__sublink">Металлические бытовки CONTAINEX</a>
			</li>
			<li class="metallicheskie-bytovki__subitem">
				<a href="#" class="metallicheskie-bytovki__sublink">Модульные бытовки</a>
			</li>
			<li class="metallicheskie-bytovki__subitem">
				<a href="#" class="metallicheskie-bytovki__sublink">Модульные КПП</a>
			</li>
			<li class="metallicheskie-bytovki__subitem">
				<a href="#" class="metallicheskie-bytovki__sublink">Строительные бытовки</a>
			</li>
		</ul>
	</li>
	<li class="modulnye-zdaniya"><a href="/catalog/modulnye-zdaniya/">Модульные здания</a>
	<ul class="metallicheskie-bytovki__sublist">
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Администритивные модульные здания</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Бытовые модульные здания</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Вахтовые поселки</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Жилые модульные здания</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Модульные здания ONTAINEX</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Модульные здания для бизнеса</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Модульные здания под оборудование</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Модульные пункты питания</a>
		</li>
		<li class="metallicheskie-bytovki__subitem">
			<a href="#" class="metallicheskie-bytovki__sublink">Модульные строительные здания</a>
		</li>
	</ul>
</li>
<li class="kontejneryi"><a href="/catalog/kontejneryi/">Контейнеры</a>
<ul class="metallicheskie-bytovki__sublist">
	<li class="metallicheskie-bytovki__subitem">
		<a href="#" class="metallicheskie-bytovki__sublink">Железнодорожные контейнеры</a>
	</li>
	<li class="metallicheskie-bytovki__subitem">
		<a href="#" class="metallicheskie-bytovki__sublink">Изотермические контейнеры</a>
	</li>
	<li class="metallicheskie-bytovki__subitem">
		<a href="#" class="metallicheskie-bytovki__sublink">Контейнеры CONTAINEX</a>
	</li>
	<li class="metallicheskie-bytovki__subitem">
		<a href="#" class="metallicheskie-bytovki__sublink">Морские контейнеры</a>
	</li>
	<li class="metallicheskie-bytovki__subitem">
		<a href="#" class="metallicheskie-bytovki__sublink">Танк-контейнеры</a>
	</li>
	
</ul>
</li>
<li class="torgovye-pavilony"><a href="/catalog/torgovye-pavilony/">Торговые павильоны</a>
<ul class="metallicheskie-bytovki__sublist">
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Торговые павильоны</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Модульные павильоны</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Модульные автосалоны</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Торговые павильоны</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Модульные продуктовые павильоны</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Торговые павильоны для прессы</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Модульные торговые киоски</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Торговые мини-павильоны</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Модульные цветочные павильоны</a>
</li>
<li class="metallicheskie-bytovki__subitem">
	<a href="#" class="metallicheskie-bytovki__sublink">Павильоны быстрого питания</a>
</li>
</ul>
</li>
<li class="rekonstruktsiya-konteynerov"><a href="/catalog/rekonstruktsiya-konteynerov/">Реконструкция контейнеров</a>
<ul class="metallicheskie-bytovki__sublist">
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Баня из контейнера</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Гараж из контейнера</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Жилые контейнеры</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Контейнеры под склад</a>
</li>

</ul>
</li>
<li class="angary"><a href="/catalog/angary/">Ангары</a>
<ul class="metallicheskie-bytovki__sublist">
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Бескаркасные ангары</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Деревянные ангары</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Каркасные ангары</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Надувные ангары</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Тентовые ангары</a>
</li>

</ul>
</li>
<li class="modulnye-stantsii"><a href="/catalog/modulnye-stantsii/">Модульные станции</a>
<ul class="metallicheskie-bytovki__sublist">
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Модульные компрессорные станции</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Модульные котельные</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Модульные насосные станции</a>
</li>
<li class="metallicheskie-bytovki__subitem">
<a href="#" class="metallicheskie-bytovki__sublink">Модульные электростанции</a>
</li>

</ul>
</li>
</ul>
</li>
<?endif;*/ ?>
		<li class="root-item"><a href="/proekty/" class="header-nav-link">Проекты</a></li>
		<li class="header-nav-dropdown-inside num2">
			<a class="header-nav-link serv-link serv-link-cat" href="javascript:void(0);">Услуги <i class="fa fa-angle-down" aria-hidden="true"></i></a>
			<ul class="header-nav-dropdown box">
				<div class="box">
					<li class="services_menu"><a href="/uslugi/dostavka/">Доставка</a></li>
					<li class="services_menu"><a href="/uslugi/arenda/">Аренда</a></li>
				</div>
			</ul>
		</li>
		<li class="root-item"><a href="/tekhnologiya/" class="header-nav-link">Технология</a></li>

		<li class="header-nav-dropdown-inside num4">
			<a class="header-nav-link serv-link for-us-cat" href="javascript:void(0);">Отрасли <i class="fa fa-angle-down" aria-hidden="true"></i></a>
			<ul class="header-nav-dropdown box">
				<div class="box">
					<li class="services_menu"><a href="/otrasli/vystavki-i-meropriyatiya/">Мероприятия и выставки</a></li>
					<li class="services_menu"><a href="/otrasli/torgovyj-sektor/">Торговый сектор</a></li>
					<li class="services_menu"><a href="/otrasli/obrazovaniye-i-nauka/">Наука и образование</a></li>
					<li class="services_menu"><a href="/otrasli/municipalnoye-upravleniye/">Муниципальное управление</a></li>
					<li class="services_menu"><a href="/otrasli/zdravoohranenie/">Здравоохранение</a></li>
					<li class="services_menu"><a href="/otrasli/promyishlennost/">Промышленность</a></li>
					<li class="services_menu"><a href="/otrasli/logistika-i-porty/">Порты и логистика</a></li>
					<li class="services_menu"><a href="/otrasli/gastronomiya/">Гастрономия</a></li>
					<li class="services_menu"><a href="/otrasli/finansovyj-sektor/">Финансовый сектор</a></li>
					<li class="services_menu"><a href="/otrasli/stroitelstvo/">Строительство</a></li>
				</div>
			</ul>
		</li>

		<li class="root-item"><a href="<?= $_SERVER['SERVER_NAME'] !== 'smart-module.ru' ? 'https://smart-module.ru/blog' : '/blog/' ?>" class="header-nav-link">Блог</a></li>



		<li class="header-nav-dropdown-inside num11">
			<a class="header-nav-link serv-link for-us-cat" href="javascript:void(0);">О нас <i class="fa fa-angle-down" aria-hidden="true"></i></a>
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
		<li class="root-item search"><a href="javascript:void(0);" class="header-nav-link clicksearch">
				<ion-icon name="search"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill-rule="evenodd" clip-rule="evenodd">
						<path d="M15.853 16.56c-1.683 1.517-3.911 2.44-6.353 2.44-5.243 0-9.5-4.257-9.5-9.5s4.257-9.5 9.5-9.5 9.5 4.257 9.5 9.5c0 2.442-.923 4.67-2.44 6.353l7.44 7.44-.707.707-7.44-7.44zm-6.353-15.56c4.691 0 8.5 3.809 8.5 8.5s-3.809 8.5-8.5 8.5-8.5-3.809-8.5-8.5 3.809-8.5 8.5-8.5z" />
					</svg></ion-icon>
			</a></li>
		<li class="root-item border-top">
			<div class="header__h-city">
				<a href="tel:#WF_PHONES#" class="h-phone">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<span class="#WF_PHONE_REPLACE#">#WF_PHONES#</span>
				</a>
			</div>
			<div class="box">
				<div class="header__h-callback header__h-callback_new">
					<a href="#callback-fb" class="h-callback h-callback_new">
						Получить консультацию
					</a>
				</div>
			</div>
			<div class="header__h-email2">
				<a href="mailto:#WF_EMAIL#" class="h-email2">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<span class="#WF_EMAIL_REPLACE#">#WF_EMAIL#</span>
				</a>
			</div>

		</li>
		<li class="root-item">
			<div class="header__h-phone2">
				<a href="tel:#WF_PHONES#" class="h-phone2">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<span class="#WF_PHONE_REPLACE#">#WF_PHONES#</span>
				</a>
			</div>
		</li>
	</ul>
<? endif ?>