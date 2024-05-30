<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Аренда"); ?><section class="page page-rent">
    <div class="container">
        <div class="row">
            #BREADCRUMB#
            <div class="col-12">
                <h1 class="text-center mb-40">#H1#</h1>
            </div>
            <div class="col-12">
                <div class="box-text mb-50">
                    <p>
                        Современные модульные бытовки привлекательны благодаря своей мобильности и универсальности. Такие конструкции можно многократно монтировать и демонтировать, перевозить, менять планировку, конфигурацию, использовать для различных целей. При этом не требуется укладка фундамента, задействование многочисленных строительных бригад и прохождение полноценной процедуры получения разрешения на возведение сооружения. Все это экономит денежные средства и драгоценное время, позволяя начать использование бытовок сразу же после завершения их сборки, длится которая считанные часы.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-5 mb-50">
                <div class="rent-image">
                    <img src="#ASSETS_PATH#/img/rent-image1.png" alt="" loading="lazy">
                </div>
            </div>
            <div class="col-12 col-lg-7 mb-50">
                <div class="rent-content">
                    <? $APPLICATION->IncludeComponent(
                        "custom:form",
                        "questions-arenda",
                        array()
                    ); ?>
                    <div class="rent-advantages">
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon">
                                <img src="#ASSETS_PATH#/img/crane.svg" alt="" loading="lazy">
                            </div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>
                                        Мобильны и универсальны
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon">
                                <img src="#ASSETS_PATH#/img/foundation.svg" alt="" loading="lazy">
                            </div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>
                                        Не требуют фундамента
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon">
                                <img src="#ASSETS_PATH#/img/joint.svg" alt="" loading="lazy">
                            </div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>
                                        Многократный сбор и разбор
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon">
                                <img src="#ASSETS_PATH#/img/time.svg" alt="" loading="lazy">
                            </div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>
                                        Экономят время и деньги
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box-text">
                    <p>
                        Благодаря перечисленным преимуществам быстровозводимые здания на основе блок-контейнеров в последние годы стремительно набирают популярность в России. Чаще всего они используются в следующих целях:
                    </p>
                    <div class="manufacture-list">
                        <ul class="list-cube my-ul color-grey">
                            <li>временное жилье для рабочих;</li>
                            <li>временные и постоянные офисы;</li>
                            <li>торговые киоски, магазины, павильоны;</li>
                            <li>помещения для хранения оборудования, материалов, инвентаря;</li>
                        </ul>
                        <ul class="list-cube my-ul color-grey">
                            <li>мобильные кухни, столовые, кафе;</li>
                            <li>раздевалки, сушилки, душевые;</li>
                            <li>мини-СТО, автомойки, мастерские и так далее.</li>
                        </ul>
                    </div>
                    <p>
                        Это далеко не полный перечень применения модульных бытовок, однако любому использованию предшествует процедура изготовления нужной конструкции. Ускорить процесс возведения мобильного здания позволяет аренда готовых блок- контейнеров.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="recommendation-rent">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Арендовать или купить?</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-5 mb-50 order-lg-1">
                <div class="rent-image rent-image-v2">
                    <img src="#ASSETS_PATH#/img/rent-image2.png" alt="" loading="lazy">
                </div>
            </div>
            <div class="col-12 col-lg-7 mb-50">
                <div class="rent-content">
                    <div class="box-text">
                        <p>
                            Если предполагается строительство постоянного сооружения, целесообразно приобрести индивидуальный или типовой проект и модульные элементы для сборки здания. Однако в том случае, когда конструкция требуется лишь на время, будь то краткосрочный проект или неуверенность в том, что бизнес «пойдет», оптимальным решением будет аренда блок-контейнеров.
                        </p>
                        <p>
                            Несколько преимуществ аренды бытовок:
                        </p>
                    </div>
                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon">
                            <img src="#ASSETS_PATH#/img/clock-rent.svg" alt="" loading="lazy">
                        </div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p>
                                    <strong>экономия времени</strong> наизготовление блок-модулей
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon">
                            <img src="#ASSETS_PATH#/img/payment.svg" alt="" loading="lazy">
                        </div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p>
                                    <strong>оплата только за фактическое</strong> использование конструкций
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon">
                            <img src="#ASSETS_PATH#/img/no-fuss.svg" alt="" loading="lazy">
                        </div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p>
                                    <strong>отсутствие хлопот</strong>, связанных с продажей блок-контейнеров после завершения эксплуатации
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon">
                            <img src="#ASSETS_PATH#/img/watch.svg" alt="" loading="lazy">
                        </div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p>
                                    <strong>отсутствие потерь времени</strong> на капитальное строительство
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="box-text">
                    <p>
                        Аренда модульных бытовок актуальна в любое время года благодаря качественным характеристикам блок-контейнеров. Эти конструкции крепкие, надежные, долговечные и предназначены для эксплуатации в различных климатических условиях.
                    </p>
                    <p>
                        Наша компания предлагает высококачественные бытовки из стандартных блок-модулей в аренду на выгодных условиях в Санкт-Петербурге. При необходимости мы самостоятельно доставим конструкции на место установки и соберем сооружение с учетом предпочтений клиента.
                    </p>
                    <p>

                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="calculate-section">
    <div class="container">

        <? $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "calc-arenda",
            array(
                "ACTIVE_DATE_FORMAT" => "d.m.Y",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "Y",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "N",
                "DISPLAY_NAME" => "N",
                "DISPLAY_PICTURE" => "N",
                "DISPLAY_PREVIEW_TEXT" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => array("", ""),
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "122",
                "IBLOCK_TYPE" => "content",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "50",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Новости",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => array("PRICE", ""),
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "ACTIVE_FROM",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "DESC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N"
            )
        ); ?>
        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array(
                "AREA_FILE_SHOW" => "file",
                "EDIT_TEMPLATE" => "standard.php",
                "PATH" => "/include/content/arenda-block.php"
            )
        ); ?>
    </div>
</section>
<? $APPLICATION->IncludeComponent(
    "custom:form",
    "questions",
    array()
); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>