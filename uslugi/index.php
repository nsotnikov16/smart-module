<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$asset = \Bitrix\Main\Page\Asset::getInstance();
$asset->addCss(SITE_TEMPLATE_PATH . "/css/new-css.css");
$APPLICATION->SetTitle("Услуги");
?>
<!--new section-->
<section class="box categories">
    <ul class="categories-list categories-list-my services-list">
        <li class="categories-list-item">
            <a href="/uslugi/dostavka/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img1.jpg" alt="Доставка">
                </span>
                <span class="categories-title">
                    Доставка </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/uslugi/arenda/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img2.jpg" alt="Аренда">
                </span>
                <span class="categories-title">
                    Аренда </span>
            </a>
        </li>
    </ul>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>