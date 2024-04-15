<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['phone'])&&!empty($_POST['phone'])&&!empty($_POST['name'])&&isset($_POST['name'])&&$_POST['check']=="on"){

    CModule::IncludeModule('iblock'); 
    $el = new CIBlockElement;

    $PROP = array();
    $PROP['NAME'] = $_POST["name"];

    $arLoadProductArray = Array(
      "IBLOCK_ID"      => 59,            //id нужного инфоблока
      "PROPERTY_VALUES"=> $PROP,        //массив свойств
      "NAME"           => $_POST["phone"], //название элемента
      "ACTIVE"         => "Y",          //активность элемента
    );

    $PRODUCT_ID = $el->Add($arLoadProductArray);

    $arEventFields= array(
        "SM_FORM_PHONE" => $_POST["phone"],
        "SM_FORM_NAME" => $_POST["name"]
    );

    CEvent::Send("SENDING_A_MESSAGE_CALLBACK", SITE_ID, $arEventFields, "N", 41);
    
    echo '<p style="color:green;">Ваша заявка принята.</p>'; 

    unset($_POST["phone"]);
    unset($_POST["name"]);
}
else{
    if(empty($_POST['phone'])||empty($_POST['name'])){
        echo '<p style="color:red;">Все поля обязательны к заполнению.</p>';
    }elseif($_POST['check']!="on"){
        echo '<p style="color:red;">Согалсие на обработку персональных данных обязательно.</p>';
    }
}
?>