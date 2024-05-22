<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");


if (
    !empty($_POST['material']) && isset($_POST['material']) &&
    !empty($_POST['variant-ispoln']) && isset($_POST['variant-ispoln']) &&
    !empty($_POST['kolvo-blokov']) && isset($_POST['kolvo-blokov']) &&
    !empty($_POST['PRICE_ZA_KVADRAT']) && isset($_POST['PRICE_ZA_KVADRAT']) &&
    !empty($_POST['KOLVO_KV_V_BLOKE']) && isset($_POST['KOLVO_KV_V_BLOKE']) &&
    !empty($_POST['KOLVO_SP_MEST']) && isset($_POST['KOLVO_SP_MEST']) &&
    !empty($_POST['KOLVO_RABOCH_MEST']) && isset($_POST['KOLVO_RABOCH_MEST'])
) {


    $stoimost = $_POST['KOLVO_KV_V_BLOKE'] * $_POST['kolvo-blokov'] * $_POST['PRICE_ZA_KVADRAT'] * $_POST['material'] * $_POST['variant-ispoln'];
    $vmestimost1 = $_POST['kolvo-blokov'] * $_POST['KOLVO_SP_MEST'];
    $vmestimost2 = $_POST['kolvo-blokov'] * $_POST['KOLVO_RABOCH_MEST'];
    $srok = ceil($_POST['KOLVO_KV_V_BLOKE'] * $_POST['kolvo-blokov'] / 38);
    $ploshad = $_POST['KOLVO_KV_V_BLOKE'] * $_POST['kolvo-blokov'];

    $html = '
    <div class="calculate-total">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-3 mb-30">
                <div class="calculate-total-box">
                    <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/discount.svg" loading="lazy"></div>
                    <div class="calculate-total-box__text">
                        <p>Общая стоимость:
                        </p>
                        <span>' . $stoimost . ' руб.</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-30">
                <div class="calculate-total-box">
                    <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/user.svg" loading="lazy"></div>
                    <div class="calculate-total-box__text">
                        <p>Вместимость (мест):
                        </p>
                        <span>' . $vmestimost2 . ' рабочих
                            или
                            ' . $vmestimost1 . ' спальных</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-30">
                <div class="calculate-total-box">
                    <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/date.svg" loading="lazy"></div>
                    <div class="calculate-total-box__text">
                        <p>Срок поставки:
                        </p>
                        <span>' . $srok . ' дней</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-30">
                <div class="calculate-total-box">
                    <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/size.svg" loading="lazy"></div>
                    <div class="calculate-total-box__text">
                        <p>Площадь:
                        </p>
                        <span>' . $ploshad . ' м<sup>2</sup></span>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box-text text-center">
                    <p><strong>Отправьте расчет менеджерам и получите дополнительную скидку на модульные здания</strong>
                    </p>
                </div>
                <a href="javascript:void(0)" class="btn btn-accent m-auto" data-bs-toggle="modal" data-bs-target="#calcModal">
                    <span>Получить расчет со скидкой</span>
                </a>
            </div>
        </div>

    </div>';

    echo json_encode(array('type' => 'success', 'mess' => $html, 'material' => $_POST['material'], 'variantispoln' => $_POST['variant-ispoln'], 'kolvoblokov' => $_POST['kolvo-blokov'], 'stoimost' => $stoimost, 'vmestimost2' => $vmestimost2, 'vmestimost1' => $vmestimost1, 'srok' => $srok, 'ploshad' => $ploshad));

    unset($_POST["material"]);
    unset($_POST["variant-ispoln"]);
    unset($_POST["kolvo-blokov"]);
    unset($_POST["PRICE_ZA_KVADRAT"]);
    unset($_POST["KOLVO_KV_V_BLOKE"]);
    unset($_POST["KOLVO_SP_MEST"]);
    unset($_POST["KOLVO_RABOCH_MEST"]);
} else {
    echo json_encode(array('type' => 'error', 'mess' => 'Заполнены не все обязательные поля.'));
}
