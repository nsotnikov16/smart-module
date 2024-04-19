<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("О компании");
?>
    <section class="page page-about">
        <div class="container">
            <div class="row">
                #BREADCRUMB#
                <div class="col-12">
                    <h1 class="text-center mb-75">#H1#</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="about-image"><img src="<?= ASSETS_PATH ?>/img/about-image.png" alt="" loading="lazy">
                    </div>
                </div>
                <div class="col-12 col-lg-8">
                    <div class="about-box">
                        <div class="about-box__icon"><img src="<?= ASSETS_PATH ?>/img/company-icon-1.png" alt=""
                                                          loading="lazy"></div>
                        <div class="about-box__body">
                            <div class="box-text">
                                <p>Компания смарт-модуль была основана в 2016 году и на
                                    сегодняшний день предлагает своим клиентам разнообразные
                                    интеллектуальные решения под ключ.</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-box">
                        <div class="about-box__icon"><img src="<?= ASSETS_PATH ?>/img/company-icon-2.png" alt=""
                                                          loading="lazy"></div>
                        <div class="about-box__body">
                            <div class="box-text">
                                <p>Мы профессионально занимаемся производством и
                                    продажей модульныхзданий повышенной комфортности.</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-box">
                        <div class="about-box__icon"><img src="<?= ASSETS_PATH ?>/img/company-icon-3.png" alt=""
                                                          loading="lazy"></div>
                        <div class="about-box__body">
                            <div class="box-text">
                                <p>Вы можете заказать у нас как типовые конструкции, так и
                                    нестандартные проекты, учитывающие индивидуальное назначение
                                    помещения и специфику его последующей эксплуатации.</p>
                            </div>
                        </div>
                    </div>
                    <div class="about-box">
                        <div class="about-box__icon"><img src="<?= ASSETS_PATH ?>/img/company-icon-4.png" alt=""
                                                          loading="lazy"></div>
                        <div class="about-box__body">
                            <div class="box-text">
                                <p>Перед тем, как выйти на рынок модульного строительства, мы изучили
                                    и проанализировали существующие предложения в огромном
                                    количестве. Результатом исследования стал вывод о том, что
                                    потребителям предлагают некачественные и зачастую одноразовые
                                    конструкции.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="company-advantages">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="h3 company-advantages__title">Исходя из этого, мы решили дать нашим партнерам продукт
                        премиум-класса!
                    </div>
                </div>
                <div class="col-12">
                    <div class="company-advantages__wrapper">
                        <div class="company-advantages__box">
                            <div class="box-text">
                                <span class="company-border"></span>
                                <p><strong>Мы ценим время</strong> и понимаем, что
                                    каждому важно быть специалистом
                                    именно в своем деле</p>
                            </div>
                        </div>
                        <div class="company-advantages__box">
                            <div class="box-text">
                                <span class="company-border"></span>
                                <p>Поэтому мы предлагаем модульные
                                    <strong>блоки исключительно высокого
                                        качества</strong>, собранные из
                                    сертифицированных, проверенных
                                    материалов.
                                </p>
                            </div>
                        </div>
                        <div class="company-advantages__box">
                            <div class="box-text">
                                <span class="company-border"></span>
                                <p>Поставки продукции на объекты
                                    осуществляются <strong>в
                                        гарантированные сроки</strong>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    #CALLBACK_SECTION#
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>