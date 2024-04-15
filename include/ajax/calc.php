<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


if(
    !empty($_POST['material'])&&isset($_POST['material'])&&
    !empty($_POST['variant-ispoln'])&&isset($_POST['variant-ispoln'])&&
    !empty($_POST['kolvo-blokov'])&&isset($_POST['kolvo-blokov'])&&
    !empty($_POST['PRICE_ZA_KVADRAT'])&&isset($_POST['PRICE_ZA_KVADRAT'])&&
    !empty($_POST['KOLVO_KV_V_BLOKE'])&&isset($_POST['KOLVO_KV_V_BLOKE'])&&
    !empty($_POST['KOLVO_SP_MEST'])&&isset($_POST['KOLVO_SP_MEST'])&&
    !empty($_POST['KOLVO_RABOCH_MEST'])&&isset($_POST['KOLVO_RABOCH_MEST'])
){

   
    $stoimost = $_POST['KOLVO_KV_V_BLOKE'] * $_POST['kolvo-blokov'] * $_POST['PRICE_ZA_KVADRAT'] * $_POST['material'] * $_POST['variant-ispoln'];
    $vmestimost1 = $_POST['kolvo-blokov'] * $_POST['KOLVO_SP_MEST'];
    $vmestimost2 = $_POST['kolvo-blokov'] * $_POST['KOLVO_RABOCH_MEST'];
    $srok = ceil($_POST['KOLVO_KV_V_BLOKE'] * $_POST['kolvo-blokov'] / 38);
    $ploshad = $_POST['KOLVO_KV_V_BLOKE'] * $_POST['kolvo-blokov'];

    $html = '';

    $html .= '<div class="modal-result-calc__wrapper">
                <div class="modal-result-calc__item">
                    <div class="modal-result-calc__item-icon"><img src="/catalog/discount.svg" alt=""></div>
                        <div class="modal-result-calc__item-text">
                        <p>Общая стоимость:
                        </p><span>'.$stoimost.' руб.</span>
                    </div>
                </div>
                <div class="modal-result-calc__item">
                    <div class="modal-result-calc__item-icon"><img src="/catalog/user.svg" alt=""></div>
                    <div class="modal-result-calc__item-text">
                        <p>Вместимость (мест):
                        </p><span>'.$vmestimost2.' рабочих
                        или <br>
                        '.$vmestimost1.' спальных</span>
                    </div>
                </div>
                <div class="modal-result-calc__item">
                    <div class="modal-result-calc__item-icon"><img src="/catalog/date.svg" alt=""></div>
                    <div class="modal-result-calc__item-text">
                        <p>Срок поставки:
                        </p><span>'.$srok.' дней</span>
                    </div>
                </div>
                <div class="modal-result-calc__item">
                    <div class="modal-result-calc__item-icon"><img src="/catalog/size.svg" alt=""></div>
                    <div class="modal-result-calc__item-text">
                        <p>Площадь:
                        </p><span>'.$ploshad.' м<sup>2</sup></span>
                    </div>
                </div>
            </div>
            <div class="text">Отправьте расчет менеджерам и получите дополнительную скидку на модульные здания</div>
            <button type="button" class="h-callback header__h-callback_new" onclick="openCalcForm();">Получить расчет со скидкой</button>
        ';

    echo json_encode(array('type' => 'success', 'mess'=>$html, 'material'=>$_POST['material'], 'variantispoln'=>$_POST['variant-ispoln'], 'kolvoblokov'=>$_POST['kolvo-blokov'], 'stoimost'=>$stoimost, 'vmestimost2'=>$vmestimost2, 'vmestimost1'=>$vmestimost1, 'srok'=>$srok, 'ploshad'=>$ploshad));

    unset($_POST["material"]);
    unset($_POST["variant-ispoln"]);
    unset($_POST["kolvo-blokov"]);
    unset($_POST["PRICE_ZA_KVADRAT"]);
    unset($_POST["KOLVO_KV_V_BLOKE"]);
    unset($_POST["KOLVO_SP_MEST"]);
    unset($_POST["KOLVO_RABOCH_MEST"]);

}
else{
    echo json_encode(array('type' => 'error', 'mess'=>'Заполнены не все обязательные поля.'));
}
?>