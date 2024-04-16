<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/constants.php");

/**
 * Валидатор "Телефонный номер" и "E-mail" для модуля Веб-форм
 */
include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/form/validators/phone.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/form/validators/email.php");


/**
 * 404 ошибка для фильтра Kombox
 * http://filter.kombox.ru/docs/course/index.php?COURSE_ID=1&LESSON_ID=20
 */
AddEventHandler('main', 'OnEpilog', 'Redirect404');
function Redirect404()
{

	define('PATH_TO_404', '/404.php');
	if (
		!defined('ADMIN_SECTION') &&
		defined('KOMBOX_FILTER_ERROR_404') &&
		file_exists($_SERVER['DOCUMENT_ROOT'] . PATH_TO_404)
	) {
		global $APPLICATION;
		$APPLICATION->RestartBuffer();

		//die($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/header.php');

		include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/header.php');
		include($_SERVER['DOCUMENT_ROOT'] . PATH_TO_404);
		include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/footer.php');
	}
}
