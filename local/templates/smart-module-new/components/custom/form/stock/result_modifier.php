<?
$filter =  ['IBLOCK_ID' => 60, '=ID' => 1290];
$select = ['ID', 'NAME', 'PROPERTY_TEXTBUTTON', 'PROPERTY_TITLE'];
$element = \CIBlockElement::GetList([], $filter, false, false, $select)->Fetch();

if ($element['ID']) {
    $arResult = $element;
    if (isset($_COOKIE['SaleCookie'])) {
        $GLOBALS['today'] = $today =  $_COOKIE['SaleCookie'];
    } else {
        $Date = date('d.m.Y H:i:s');
        $GLOBALS['today'] = $today = date('d.m.Y H:i:s', strtotime($Date . ' + 3 days'));
        setcookie("SaleCookie", $today, strtotime("+30 day"), "/", $_SERVER['SERVER_NAME'], 1);
    }

    $diff = abs(strtotime(date('d.m.Y H:i:s')) - strtotime($today));
    $GLOBALS['days'] = $days =  floor($diff / (60 * 60 * 24));
    $GLOBALS['hours'] = $hours = floor(($diff - $days * 60 * 60 * 24) / (60 * 60));
    $GLOBALS['minutes'] = $minutes = floor(($diff - $days * 60 * 60 * 24 - $hours * 60 * 60) / (60));
    $GLOBALS['seconds'] = floor($diff - $days * 60 * 60 * 24 - $hours * 60 * 60 - $minutes * 60);
}
