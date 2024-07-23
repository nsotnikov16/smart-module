<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/constants.php");

/**
 * Валидатор "Телефонный номер" и "E-mail" для модуля Веб-форм
 */
include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/form/validators/phone.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/form/validators/email.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/functions.php");
include_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/include/events.php");