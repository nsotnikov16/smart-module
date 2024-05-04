<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty(
    "description",
    "Реквизиты компании \"Smart Module\" Производим и поставляем модульные здания в #WF_CITY_PRED# по высоким технологиям строительства | ваше будущее и настоящее, звоните #WF_PHONES#"
);
$APPLICATION->SetPageProperty("title", "Реквизиты компании \"Smart Module\" в #WF_CITY_PRED#");
$APPLICATION->SetTitle("Реквизиты");
?>
<section class="page page-requisites">
    <div class="container">
        <div class="row">
            #BREADCRUMB#
            <div class="col-12">
                <h1 class="text-center mb-60">#H1#</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="requisites-box">
                    <h3 class="requisites-box__title">Карта партнера</h3>
                    <div class="table-wrapper">
                        <table class="table-requisites">
                            <tbody>
                                <tr>
                                    <td>Полное и сокращенное наименование в соответствии
                                        с учредительными документами
                                    </td>
                                    <td>
                                        <strong>ОБЩЕСТВО С ОГРАНИЧЕННОЙ ОТВЕТСТВЕННОСТЬЮ
                                            «Смарт Модуль» (ООО «Смарт Модуль»)</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Телефон (офис)</td>
                                    <td>
                                        <strong><span class="#WF_PHONE_REPLACE#">#WF_PHONES#</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td>
                                        <strong><span class="#WF_EMAIL_REPLACE#">#WF_EMAIL#</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ИНН/КПП</td>
                                    <td>
                                        <strong>7811640558/780601001</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ОГРН</td>
                                    <td>
                                        <strong>1177847086053</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>ОКПО</td>
                                    <td>
                                        <strong>06946379</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="requisites-box">
                    <h3 class="requisites-box__title">Платежные реквизиты</h3>
                    <div class="table-wrapper">
                        <table class="table-requisites">
                            <tbody>
                                <tr>
                                    <td>Расчетный счёт</td>
                                    <td>
                                        <strong>40702810510000436788</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Корреспондентский счёт</td>
                                    <td>
                                        <strong>30101810145250000974</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>БИК</td>
                                    <td>
                                        <strong>044525974</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Полное наименование банка</td>
                                    <td>
                                        <strong>АО "ТИНЬКОФФ БАНК"</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<? $APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "",
    array(
        "AREA_FILE_SHOW" => "file",
        "PATH" => '/include/content/advantages-section.php',
        "EDIT_TEMPLATE" => "standard.php"
    )
); ?>

<?
$APPLICATION->IncludeComponent(
    "custom:form",
    "questions",
);
?>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>