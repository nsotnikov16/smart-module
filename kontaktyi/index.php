<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
$APPLICATION->SetPageProperty('title', 'Контакты "Smart-Module" в #WF_CITY_PRED#');
$APPLICATION->SetPageProperty('description', 'Контакты "Smart Module" в #WF_CITY_PRED# | Ваше будущее и настоящее, звоните #WF_PHONES#');
?>
<section class="page page-contacts">
    <div class="container">
        <div class="row">
            #BREADCRUMB#
            <div class="col-12">
                <h1 class="text-center mb-50">#H1#</h1>
            </div>
            <div class="col-12">
                <div class="contacts-map">
                    #WF_MAP#
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6 col-lg-5 mb-40">
                <div class="contacts-box">
                    <div class="contacts-box__icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="contacts-box__body">
                        <div class="h4 contacts-box__title">Адрес производства</div>
                        <div class="address-box">
                            <p>#WF_CONTACTS#</p>
                        </div>

                        <div class="schedule-box contacts-box-item">
                            <span>ждем вас:</span>
                            <p>пн-пт: с 9:00 - 18:00; сб, вс:
                                выходной</p>
                        </div>

                        <ul class="list-social my-ul">
                            <li>
                                <a href="https://www.youtube.com/channel/UCe0MhLxBpNUuyEXD-G28J6w/">
                                    <img src="#ASSETS_PATH#/img/youtube.png" alt="YouTube" loading="lazy" />
                                </a>
                            </li>
                            <li>
                                <a href="https://vk.com/smart_module">
                                    <img src="#ASSETS_PATH#/img/vk.png" alt="VK" loading="lazy" />
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 mb-40">
                <div class="contacts-box">
                    <div class="contacts-box__icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="contacts-box__body">
                        <div class="h4 contacts-box__title">Телефоны</div>
                        <div class="contacts-box-item">
                            <span>офис продаж:</span>
                            <a href="tel:#WF_PHONES#" class="#WF_PHONE_REPLACE#">#WF_PHONES#</a>
                        </div>
                        <div class="contacts-box-item">
                            <span>клиентский отдел:</span>
                            <a href="tel:#WF_PHONES#" class="#WF_PHONE_REPLACE#">#WF_PHONES#</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4 mb-40">
                <div class="contacts-box">
                    <div class="contacts-box__icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div class="contacts-box__body">
                        <div class="h4 contacts-box__title">E-mail</div>
                        <div class="contacts-box-item">
                            <span>поддержка:</span>
                            <a href="mailto:#WF_EMAIL#" class="contacts-box__link"><span class="#WF_EMAIL_REPLACE#">#WF_EMAIL#</span></a>
                        </div>
                        <div class="contacts-box-item">
                            <span>офис продаж:</span>
                            <a href="mailto:#WF_EMAIL#" class="contacts-box__link"><span class="#WF_EMAIL_REPLACE#">#WF_EMAIL#</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <?
            $APPLICATION->IncludeComponent(
                "custom:form",
                "contacts",
            );
            ?>
        </div>
    </div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>