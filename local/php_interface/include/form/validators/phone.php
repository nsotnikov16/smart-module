<?
/**
 * Валидатор "Проверка телефонного номера" для модуля Веб-формы
 * Пример в документации: http://dev.1c-bitrix.ru/api_help/form/validators.php
 * @author Николаев Константин <sector99@bk.ru
 * Зеленый свет для:
 * +79261234567
 * 89261234567
 * 79261234567
 * +7 926 123 45 67
 * 8(926)123-45-67
 * 123-45-67
 * 9261234567
 * 79261234567
 * (495)1234567
 * (495) 123 45 67
 * 89261234567
 * 8-926-123-45-67
 * 8 927 1234 234
 * 8 927 12 12 888
 * 8 927 12 555 12
 * 8 927 123 8 123
 */

// подключим модуль
CModule::IncludeModule("form");

class CFormCustomValidatorPhoneEx
{
  static function GetDescription()
  {
    return array(
      "NAME"            => "phone_ex",                                   // идентификатор
      "DESCRIPTION"     => "Номер телефона",                                 // наименование
      "TYPES"           => array("text", "textarea"),                            // типы полей
      "SETTINGS"        => array("CFormCustomValidatorPhoneEx", "GetSettings"), // метод, возвращающий массив настроек
      "CONVERT_TO_DB"   => array("CFormCustomValidatorPhoneEx", "ToDB"),        // метод, конвертирующий массив настроек в строку
      "CONVERT_FROM_DB" => array("CFormCustomValidatorPhoneEx", "FromDB"),      // метод, конвертирующий строку настроек в массив
      "HANDLER"         => array("CFormCustomValidatorPhoneEx", "DoValidate")   // валидатор
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

		preg_match('/^((7|8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/', $value, $res);
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
AddEventHandler("form", "onFormValidatorBuildList", array("CFormCustomValidatorPhoneEx", "GetDescription"));
?>