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
                                        <img src="#ASSETS_PATH#/img/youtube.png" alt="YouTube" loading="lazy"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://vk.com/smart_module">
                                        <img src="#ASSETS_PATH#/img/vk.png" alt="VK" loading="lazy"/>
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
                                <a href="mailto:#WF_EMAIL#"
                                   class="contacts-box__link #WF_EMAIL_REPLACE#">#WF_EMAIL#</a>
                            </div>
                            <div class="contacts-box-item">
                                <span>офис продаж:</span>
                                <a href="mailto:#WF_EMAIL#"
                                   class="contacts-box__link #WF_EMAIL_REPLACE#">#WF_EMAIL#</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="contacts-callback">
                        <div class="contacts-callback__title">Форма обратной связи:</div>
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:form.result.new",
                            "",
                            array(
                                "AJAX_MODE" => "Y",
                                "AJAX_OPTION_HISTORY" => "N",
                                "AJAX_OPTION_JUMP" => "N",
                                "AJAX_OPTION_SHADOW" => "N",
                                "AJAX_OPTION_STYLE" => "N",
                                "CACHE_TIME" => "3600",
                                "CACHE_TYPE" => "A",
                                "CHAIN_ITEM_LINK" => "",
                                "CHAIN_ITEM_TEXT" => "",
                                "EDIT_URL" => "",
                                "IGNORE_CUSTOM_TEMPLATE" => "N",
                                "LIST_URL" => "",
                                "SEF_MODE" => "N",
                                "SUCCESS_URL" => "",
                                "USE_EXTENDED_ERRORS" => "Y",
                                "VARIABLE_ALIASES" => array("WEB_FORM_ID" => "WEB_FORM_ID", "RESULT_ID" => "RESULT_ID",
                                ),
                                "WEB_FORM_ID" => "3"
                            )
                        ); ?>
                        <form method="post" class="form-callback form-callback-contacts">
                            <div class="row">
                                <div class="col-12 col-lg-4 mb-10">
                                    <label>
                                        <input type="text" placeholder="ФИО" name="name">
                                    </label>
                                    <label>
                                        <input type="text" placeholder="Телефон" name="phone" required>
                                    </label>
                                    <label>
                                        <input type="email" placeholder="Электронный адрес *" name="mail" required>
                                    </label>
                                </div>
                                <div class="col-12 col-lg-8 mb-10">
                                    <label>
                                        <textarea name="message" placeholder="Ваше сообщение: *" required></textarea>
                                    </label>
                                </div>
                                <div class="col-12 col-lg-8 order-lg-1">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name="checkbox" checked>
                                        <span class="label-checkbox__custom"></span>
                                        <span class="label-checkbox__text">Я даю свою согласие на обработку персональных данных и
												соглашаюсь с условиями и <br>
												политикой конфиденциальности</span>
                                    </label>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <button type="submit" class="btn btn-accent">Отправить сообщение</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>