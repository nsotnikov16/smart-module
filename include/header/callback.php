<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule('iblock');
header('Content-type: application/json');
if(empty($_REQUEST['SM_FORM_NAME'])||empty($_REQUEST['SM_FORM_PHONE'])||($_REQUEST['SM_FORM_CHECK']!="on")){
    echo json_encode(array('type' => 'error', 'msg' => 'Все поля и согласие на обработку персональных данных обязательны для заполнения!'));
} else {

    $el = new CIBlockElement;
    $PROP = array();

    foreach($_REQUEST as $k => $v)
        $PROP[$k] = $v;

    $arLoadProductArray = Array(
        "MODIFIED_BY"    => $USER->GetID(),
        "IBLOCK_SECTION_ID" => false,
        "IBLOCK_ID"      => 55,
        "PROPERTY_VALUES"=> $PROP,
        "NAME"           => "Сообщение от " . date('d-m-Y'),
        "ACTIVE"         => "Y",
        'PREVIEW_TEXT'    => $_REQUEST['message']
    );

    if($PRODUCT_ID = $el->Add($arLoadProductArray)){
        $adminEmail = COption::GetOptionString('main', 'email_from', 'direct@smart-module.ru');
        $arFields = array(
            "SM_FORM_NAME"  => $_REQUEST["SM_FORM_NAME"],
            "SM_FORM_PHONE"  => $_REQUEST["SM_FORM_PHONE"],
            "CHECK" => $_REQUEST["SM_FORM_CHECK"]
        );
        CEvent::Send("SENDING_A_MESSAGE_CALLBACK", SITE_ID, $arFields);

        echo json_encode(array('type' => 'ok', 'msg' => 'Ваше сообщение успешно отправлено!'));


    }
}
