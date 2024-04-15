<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(
    !empty($_POST['calc-material'])&&isset($_POST['calc-material'])&&
    !empty($_POST['calc-variant-ispoln'])&&isset($_POST['calc-variant-ispoln'])&&
    !empty($_POST['calc-kolvo-blokov'])&&isset($_POST['calc-kolvo-blokov'])&&
    !empty($_POST['calc-stoimost'])&&isset($_POST['calc-stoimost'])&&
    !empty($_POST['calc-vmestimost2'])&&isset($_POST['calc-vmestimost2'])&&
    !empty($_POST['calc-vmestimost1'])&&isset($_POST['calc-vmestimost1'])&&
    !empty($_POST['calc-srok'])&&isset($_POST['calc-srok'])&&
    !empty($_POST['calc-ploshad'])&&isset($_POST['calc-ploshad'])&&
    !empty($_POST['name'])&&isset($_POST['name'])&&
    !empty($_POST['phone'])&&isset($_POST['phone'])&&
    $_POST['check']=='on'

){

    CModule::IncludeModule('iblock'); 
    $el = new CIBlockElement;

    $PROP = array();

    $html2 = '
Входные данные:
Материал: '.$_POST['calc-material'].'
Вариант исполнения: '.$_POST['calc-variant-ispoln'].'
Количество блоков: '.$_POST['calc-kolvo-blokov'].'

Расчеты:
Общая стоимость: '.$_POST['calc-stoimost'].'
Вместимость (мест): '.$_POST['calc-vmestimost2'].' рабочих или '.$_POST['calc-vmestimost1'].' спальных
Срок поставки: '.$_POST['calc-srok'].'
Площадь: '.$_POST['calc-ploshad'].'

Имя: '.$_POST['name'].'
Телефон: '.$_POST['phone'];

    $arLoadProductArray = Array(
      "IBLOCK_ID"      => 63,            //id нужного инфоблока
      "PROPERTY_VALUES"=> $PROP,        //массив свойств
      "NAME"           => date("d.m.Y H:i:s"), //название элемента
      "ACTIVE"         => "Y",          //активность элемента
      "PREVIEW_TEXT"   => $html2,
      "PREVIEW_TEXT_TYPE"   => 'html',

    );

    $PRODUCT_ID = $el->Add($arLoadProductArray);

    $arEventFields= array(
        "TEXT" => $html2
    );

    CEvent::Send("REQUESTS", SITE_ID, $arEventFields, "N", 45);
    
    echo json_encode(array('type' => 'success', 'mess'=>'Ваша завявка успешно отправлена.'));

}
else{
    echo json_encode(array('type' => 'error', 'mess'=>'Все поля и согласие на обработку персональных данных обязательны для заполнения!'));
}
?>