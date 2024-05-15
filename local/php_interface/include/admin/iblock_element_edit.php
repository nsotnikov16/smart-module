<?

use Bitrix\Main\Page\Asset;

if ($_GET['IBLOCK_ID'] == 6)
    Asset::getInstance()->addJs('/local/php_interface/include/admin/js/classes/Navigation.js');

Asset::getInstance()->addJs('/local/php_interface/include/admin/js/iblock_element_edit.js');
