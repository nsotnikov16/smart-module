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
                <div class="about-image"><img src="#ASSETS_PATH#/img/about-image.png" alt="" loading="lazy">
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="about-box">
                    <div class="about-box__icon"><img src="#ASSETS_PATH#/img/company-icon-1.png" alt="" loading="lazy"></div>
                    <div class="about-box__body">
                        <div class="box-text">
                            <p>Компания смарт-модуль была основана в 2016 году и на
                                сегодняшний день предлагает своим клиентам разнообразные
                                интеллектуальные решения под ключ.</p>
                        </div>
                    </div>
                </div>
                <div class="about-box">
                    <div class="about-box__icon"><img src="#ASSETS_PATH#/img/company-icon-2.png" alt="" loading="lazy"></div>
                    <div class="about-box__body">
                        <div class="box-text">
                            <p>Мы профессионально занимаемся производством и
                                продажей модульныхзданий повышенной комфортности.</p>
                        </div>
                    </div>
                </div>
                <div class="about-box">
                    <div class="about-box__icon"><img src="#ASSETS_PATH#/img/company-icon-3.png" alt="" loading="lazy"></div>
                    <div class="about-box__body">
                        <div class="box-text">
                            <p>Вы можете заказать у нас как типовые конструкции, так и
                                нестандартные проекты, учитывающие индивидуальное назначение
                                помещения и специфику его последующей эксплуатации.</p>
                        </div>
                    </div>
                </div>
                <div class="about-box">
                    <div class="about-box__icon"><img src="#ASSETS_PATH#/img/company-icon-4.png" alt="" loading="lazy"></div>
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