<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");
?>
<section class="page page-services">
    <div class="container">
        <div class="row">
            #BREADCRUMB#
            <div class="col-12">
                <h1 class="text-center mb-45">#H1#</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex flex-wrap">
                <a href="/uslugi/dostavka/" class="industry-card services-card">
                    <span class="industry-card__img"><img src="#ASSETS_PATH#/img/service-img1.png" alt="Торговый сектор" loading="lazy" /></span>
                    <span class="industry-card__title">Доставка</span>
                </a>
                <a href="/uslugi/arenda/" class="industry-card services-card">
                    <span class="industry-card__img"><img src="#ASSETS_PATH#/img/service-img2.png" alt="Торговый сектор" loading="lazy" /></span>
                    <span class="industry-card__title">Торговый сектор</span>
                </a>
            </div>
        </div>
    </div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>