<?
/**
 * Валидатор "Проверка E-mail" для модуля Веб-формы
 * Пример в документации: http://dev.1c-bitrix.ru/api_help/form/validators.php
 * @author Николаев Константин <sector99@bk.ru
 * Зеленый свет для: contact@mail.ru
 */

// подключим модуль
CModule::IncludeModule("form");

class CFormCustomValidatorEmailEx
{
  static function GetDescription()
  {
    return array(
      "NAME"            => "email_ex",                                   // идентификатор
      "DESCRIPTION"     => "Email",                                 // наименование
      "TYPES"           => array("text", "textarea"),                            // типы полей
      "SETTINGS"        => array("CFormCustomValidatorEmailEx", "GetSettings"), // метод, возвращающий массив настроек
      "CONVERT_TO_DB"   => array("CFormCustomValidatorEmailEx", "ToDB"),        // метод, конвертирующий массив настроек в строку
      "CONVERT_FROM_DB" => array("CFormCustomValidatorEmailEx", "FromDB"),      // метод, конвертирующий строку настроек в массив
      "HANDLER"         => array("CFormCustomValidatorEmailEx", "DoValidate")   // валидатор
    );
  }

  function GetSettings() {
    return array();
  }

  function ToDB($arParams) {
    // возвращаем сериализованную строку
    return serialize($arParams);
  }

  function FromDB($strParams) {
    // никаких преобразований не требуется, просто вернем десериализованный массив
    return unserialize($strParams);
  }
	
  static function DoValidate($arParams, $arQuestion, $arAnswers, $arValues) {
    global $APPLICATION;

    foreach ($arValues as $value) {
      // пустые значения пропускаем
      if (strlen($value) <= 0) continue;

		$res = check_email($value);
		// вернем ошибку
	    if (!$res) {
			$APPLICATION->ThrowException("#FIELD_NAME#: в неправильном формате");
			return false;
	    }

    }
    
    // все значения прошли валидацию, вернем true
    return true;
  }
}

// установим метод CFormCustomValidatorNumberEx в качестве обработчика события
AddEventHandler("form", "onFormValidatorBuildList", array("CFormCustomValidatorEmailEx", "GetDescription"));
?>