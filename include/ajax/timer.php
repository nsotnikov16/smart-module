<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_POST['phone'])&&!empty($_POST['phone'])&&$_POST['check']=="on"){

    CModule::IncludeModule('iblock'); 
    $el = new CIBlockElement;

    $PROP = array();
    $PROP['AKCID'] = $_POST["akcid"];

    $arLoadProductArray = Array(
      "IBLOCK_ID"      => 61,            //id нужного инфоблока
      "PROPERTY_VALUES"=> $PROP,        //массив свойств
      "NAME"           => $_POST["phone"], //название элемента
      "ACTIVE"         => "Y",          //активность элемента
    );

    $PRODUCT_ID = $el->Add($arLoadProductArray);

    $arEventFields= array(
        "SM_FORM_PHONE" => $_POST["phone"],
        "AKCNAME" => $_POST["akcname"]
    );

    CEvent::Send("SENDING_A_MESSAGE_CALLBACK", SITE_ID, $arEventFields, "N", 42);
    
    echo '<p style="color:green;">Ваша заявка принята.</p>'; 

    unset($_POST["phone"]);
    unset($_POST["name"]);
}
else{
    if(empty($_POST['phone'])){
        echo '<p style="color:red;">Поле "Телефон" обязательно к заполнению.</p>';
    }elseif($_POST['check']!="on"){
        echo '<p style="color:red;">Согалсие на обработку персональных данных обязательно.</p>';
    }
}
?>