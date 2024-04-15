<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Отрасли строительства в #WF_CITY_PRED# | \"Smart Module\" - ваше будущее и настоящее, звоните #WF_PHONES#");
$asset = \Bitrix\Main\Page\Asset::getInstance();
$asset->addCss(SITE_TEMPLATE_PATH . "/css/new-css.css");
$APPLICATION->SetTitle("Отрасли строительства в #WF_CITY_PRED# | \"Smart Module\"");

?>
<section class="box">
  <div class="path">
    <div class="breadcrumb">
      <div class="path-link" id="bx_breadcrumb_0" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"
           data-test="">

        <a href="/" title="Главная" itemprop="url">
          <span itemprop="title">Главная</span>
        </a>
      </div>
      <div class="path-link" data-test="Каталог">
        &gt;
        <span>Отрасли</span>
      </div>
    </div>
  </div>
</section>
<section class="box">
  <h1 class="box-title">Отрасли</h1>
</section>
<!--new section-->
<section class="box categories">
    <ul class="categories-list categories-list-my industries-list">
        <li class="categories-list-item">
            <a href="/otrasli/vystavki-i-meropriyatiya/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img3.jpg" alt="Мероприятия и выставки">
                </span>
                <span class="categories-title">
                    Мероприятия <br>
                    и выставки </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/torgovyj-sektor/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img4.jpg" alt="Торговый сектор">
                </span>
                <span class="categories-title">
                    Торговый сектор </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/obrazovaniye-i-nauka/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img5.jpg" alt="Наука и образование">
                </span>
                <span class="categories-title">
                    Наука и <br>
                    образование </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/municipalnoye-upravleniye/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img6.jpg" alt="Муниципальное управление">
                </span>
                <span class="categories-title">
                    Муниципальное
                    управление </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/zdravoohranenie/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img7.jpg" alt="Здравоохранение">
                </span>
                <span class="categories-title">
                    Здравоохранение </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/promyishlennost/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img8.jpg" alt="Промышленность">
                </span>
                <span class="categories-title">
                    Промышленность </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/logistika-i-porty/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img9.jpg" alt="Порты и логистика">
                </span>
                <span class="categories-title">
                    Порты и логистика </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/gastronomiya/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img10.jpg" alt="Гастрономия">
                </span>
                <span class="categories-title">
                    Гастрономия </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/finansovyj-sektor/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img11.jpg" alt="Финансовый сектор">
                </span>
                <span class="categories-title">
                    Финансовый
                    сектор </span>
            </a>
        </li>
        <li class="categories-list-item">
            <a href="/otrasli/stroitelstvo/">
                <span class="categories-image">
                    <img src="<?= SITE_TEMPLATE_PATH ?>/images/new-img/service-img12.jpg" alt="Строительство">
                </span>
                <span class="categories-title">
                    Строительство </span>
            </a>
        </li>
    </ul>
</section>

<!--new section-->
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>