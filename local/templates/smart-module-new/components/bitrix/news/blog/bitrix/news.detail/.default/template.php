<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
if ($_SERVER['SERVER_NAME'] !== 'smart-module.ru') :
	@define("ERROR_404", "Y");
	CHTTP::SetStatus("404 Not Found"); ?>
	<script>
		window.location.replace("<?= 'https://smart-module.ru' . $arResult['DETAIL_PAGE_URL'] ?>");
	</script>
<?
	exit();
endif;
?>
<?
if (CModule::IncludeModule("webfly.seocities") and CModule::IncludeModule("iblock")) {
	$cityID = CSeoCities::getCityId();
}
?>

<?
if (in_array($cityID, $arResult["PROPERTIES"][NOT_SHOW_IN_CITIES][VALUE])) {
	/*	http_response_code(404);
	header("Location: /404.php");*/
}
$arFilterPopular = ['IBLOCK_ID' => $arResult['IBLOCK_ID'], '!ID' => $arResult['ID']];
$arSelectPopular = ['ID', 'NAME', 'CODE', 'ACTIVE_FROM', 'IBLOCK_SECTION_ID', 'DETAIL_PICTURE'];
$db_popular = CIBlockElement::GetList(['date_active_from' => 'desc'], $arFilterPopular, false, ['nTopCount' => 3], $arSelectPopular);
$populars = [];
while ($popular = $db_popular->Fetch()) :
	$populars[] = [
		'IMG_SRC' => CFile::GetPath($popular['DETAIL_PICTURE']),
		'DATE' => date('d.m.Y', MakeTimeStamp($popular["ACTIVE_FROM"])),
		'NAME' => $popular['NAME'],
		'CODE' => $popular['CODE'],
		'SECTION_CODE' => CIBlockSection::GetById($popular['IBLOCK_SECTION_ID'])->Fetch()['CODE'],
	];
endwhile;
echo '<!-- <pre>';
var_dump($populars);
echo '</pre> -->';
?>
<header class="blog__header">
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
	<h1 class="box-title"><? $APPLICATION->ShowTitle(false); ?></h1>
	<div class="blog__info">
		<? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]) : ?>
			<div class="blog__date"><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></div>
		<? endif; ?>
		<? /*  Время чтения */ if ($arResult['PROPERTIES']['READING_TIME']['VALUE']) : ?>
			<div class="read_time"><?= $arResult['PROPERTIES']['READING_TIME']['VALUE'] ?></div>
		<? endif; ?>

		<div class="views_count">156</div>
		<div class="path-link link_to_commment"><a href="#" onclick="(e) => e.preventDefault()"><span>Обсудить</span></a></div><!-- preventDefault просто заглушка -->
	</div>
</header>
<main class="blog__main">
	<article class="text">
		<?= $arResult['PROPERTIES']['SODERZHANIE']['~VALUE']['TEXT'] ?>
		<?= $arResult["DETAIL_TEXT"] ?>	
	</article>
	<aside class="sidebar">
		<div class="block popular-articles">
			<span>Популярные статьи</span>
			<ul>
				<? foreach ($populars as $popular) : ?>
					<li>
						<img src="<?= $popular['IMG_SRC'] ?>" alt="<?= $popular['NAME'] ?>">
						<div class="date_gray"><?= $popular['DATE'] ?></div>
						<a href="<?= SITE_DIR . 'blog/' . $popular['SECTION_CODE'] . '/' . $popular['CODE'] . '/' ?>"><?= $popular['NAME'] ?></a>
					</li>
				<? endforeach; ?>

			</ul>
			<a href="/blog/" class="all_articles">Ко всем статьям</a>
		</div>
		<div class="sidebar__float">
			<div class="block subscribe__outer">
				<? $APPLICATION->IncludeComponent(
					"bitrix:subscribe.edit",
					"subscribe",
					array(
						"AJAX_MODE" => "N",
						"SHOW_HIDDEN" => "N",
						"ALLOW_ANONYMOUS" => "Y",
						"SHOW_AUTH_LINKS" => "N",
						"CACHE_TYPE" => "N",
						"CACHE_TIME" => "3600",
						"SET_TITLE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "N",
						"AJAX_OPTION_HISTORY" => "N",
						"COMPONENT_TEMPLATE" => ".default",
						"AJAX_OPTION_ADDITIONAL" => "",
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO"
					),
					false
				);
				?>
			</div>
			<div class="block banner">
				<a href="#" class="banner__link">
					<img src="/local/templates/smart-module/images/banner_tmp.png" alt="Баннер">
				</a>
			</div>
		</div>
	</aside>
</main>
<div class="neiros-comment"></div>