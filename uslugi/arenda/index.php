<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Аренда"); ?>

<section class="page page-rent">
    <div class="container">
        <div class="row">
            #BREADCRUMB#
            <div class="col-12">
                <h1 class="text-center mb-40">#H1#</h1>
            </div>
            <div class="col-12">
                <div class="box-text mb-50">
                    <p>Современные модульные бытовки привлекательны благодаря своей мобильности и универсальности. Такие
                        конструкции можно
                        многократно монтировать и демонтировать, перевозить, менять планировку, конфигурацию, использовать для
                        различных целей.
                        При этом не требуется укладка фундамента, задействование многочисленных строительных бригад и
                        прохождение полноценной
                        процедуры получения разрешения на возведение сооружения. Все это экономит денежные средства и
                        драгоценное время,
                        позволяя начать использование бытовок сразу же после завершения их сборки, длится которая считанные
                        часы.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-5 mb-50">
                <div class="rent-image"><img src="#ASSETS_PATH#/img/rent-image1.png" alt="" loading="lazy" /></div>
            </div>
            <div class="col-12 col-lg-7 mb-50">
                <div class="rent-content">
                    <? $APPLICATION->IncludeComponent(
                        "custom:form",
                        "questions-arenda",
                    ) ?>

                    <div class="rent-advantages">
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon"><img src="#ASSETS_PATH#/img/crane.svg" alt="" loading="lazy" /></div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>Мобильны и универсальны</p>
                                </div>
                            </div>
                        </div>
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon"><img src="#ASSETS_PATH#/img/foundation.svg" alt="" loading="lazy" /></div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>Не требуют фундамента</p>
                                </div>
                            </div>
                        </div>
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon"><img src="#ASSETS_PATH#/img/joint.svg" alt="" loading="lazy" /></div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>Многократный сбор и разбор</p>
                                </div>
                            </div>
                        </div>
                        <div class="rent-advantages-box">
                            <div class="rent-advantages-box__icon"><img src="#ASSETS_PATH#/img/time.svg" alt="" loading="lazy" /></div>
                            <div class="rent-advantages-box__text">
                                <div class="box-text">
                                    <p>Экономят время и деньги</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box-text">
                    <p>Благодаря перечисленным преимуществам быстровозводимые здания на основе блок-контейнеров в последние
                        годы
                        стремительно набирают популярность в России. Чаще всего они используются в следующих целях:</p>
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


                    <p>Это далеко не полный перечень применения модульных бытовок, однако любому использованию предшествует
                        процедура
                        изготовления нужной конструкции. Ускорить процесс возведения мобильного здания позволяет аренда готовых
                        блок-
                        контейнеров.</p>
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
                <div class="rent-image rent-image-v2"><img src="#ASSETS_PATH#/img/rent-image2.png" alt="" loading="lazy" /></div>
            </div>
            <div class="col-12 col-lg-7 mb-50">
                <div class="rent-content">
                    <div class="box-text">
                        <p>Если предполагается строительство постоянного сооружения,
                            целесообразно приобрести индивидуальный или типовой проект и
                            модульные элементы для сборки здания. Однако в том случае, когда
                            конструкция требуется лишь на время, будь то краткосрочный проект
                            или неуверенность в том, что бизнес «пойдет», оптимальным
                            решением будет аренда блок-контейнеров.</p>

                        <p>Несколько преимуществ аренды бытовок:</p>
                    </div>

                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon"><img src="#ASSETS_PATH#/img/clock-rent.svg" alt="" loading="lazy" /></div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p><strong>экономия времени</strong> наизготовление блок-модулей</p>
                            </div>
                        </div>
                    </div>
                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon"><img src="#ASSETS_PATH#/img/payment.svg" alt="" loading="lazy" /></div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p><strong>оплата только за фактическое</strong> использование конструкций</p>
                            </div>
                        </div>
                    </div>
                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon"><img src="#ASSETS_PATH#/img/no-fuss.svg" alt="" loading="lazy" /></div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p><strong>отсутствие хлопот</strong>, связанных с продажей блок-контейнеров
                                    после завершения эксплуатации</p>
                            </div>
                        </div>
                    </div>
                    <div class="recommendation-rent-box">
                        <div class="recommendation-rent-box__icon"><img src="#ASSETS_PATH#/img/watch.svg" alt="" loading="lazy" /></div>
                        <div class="recommendation-rent-box__text">
                            <div class="box-text">
                                <p><strong>отсутствие потерь времени</strong> на капитальное строительство</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="box-text">
                    <p>Аренда модульных бытовок актуальна в любое время года благодаря качественным характеристикам
                        блок-контейнеров. Эти
                        конструкции крепкие, надежные, долговечные и предназначены для эксплуатации в различных климатических
                        условиях.</p>
                    <p>Наша компания предлагает высококачественные бытовки из стандартных блок-модулей в аренду на выгодных
                        условиях в
                        Санкт-Петербурге. При необходимости мы самостоятельно доставим конструкции на место установки и соберем
                        сооружение с
                        учетом предпочтений клиента.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="calculate-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="calculate-wrapper mb-65">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-center">Калькулятор стоимости аренды</h2>

                            <form method="post" class="form-calculate">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12 mb-20">
                                                <label><select name="select" class="select-my">
                                                        <option value="Тип бытовки">Тип бытовки</option>
                                                        <option value="Тип бытовки">Тип бытовки</option>
                                                        <option value="Тип бытовки">Тип бытовки</option>
                                                    </select></label>
                                            </div>

                                            <div class="col-12 col-sm-6 mb-20">
                                                <div class="slider-range-box">
                                                    <div class="slider-range-box__head">
                                                        <p>Срок аренды, мес.</p>
                                                        <input type="text" name="dec" class="slider-range-box__input dec1" disabled>
                                                    </div>
                                                    <div class="slider-range-box__body">
                                                        <div class="slider-range slider-range1"></div>
                                                        <div class="slider-range-values">
                                                            <p>1</p>
                                                            <p>12</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mb-20">
                                                <div class="slider-range-box">
                                                    <div class="slider-range-box__head">
                                                        <p>Кол-во бытовок</p>
                                                        <input type="text" name="dec" class="slider-range-box__input dec2" disabled>
                                                    </div>
                                                    <div class="slider-range-box__body">
                                                        <div class="slider-range slider-range2"></div>
                                                        <div class="slider-range-values">
                                                            <p>1</p>
                                                            <p>20</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-12 col-lg-5 mb-20">
                                                <div class="form-calculate__total">
                                                    <p>Итого <strong>36 660 руб.</strong></p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-7 mb-20">
                                                <button type="button" class="btn btn-green btn-calculate-modal">оставить заявку</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="form-calculate__image"><img src="#ASSETS_PATH#/img/calculate-image.png" alt="" loading="lazy" />
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="calculate-total">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-3 mb-30">
                                        <div class="calculate-total-box">
                                            <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/discount.svg" alt="" loading="lazy"></div>
                                            <div class="calculate-total-box__text">
                                                <p>Общая стоимость:
                                                </p>
                                                <span>443.652 руб.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mb-30">
                                        <div class="calculate-total-box">
                                            <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/user.svg" alt="" loading="lazy"></div>
                                            <div class="calculate-total-box__text">
                                                <p>Вместимость (мест):
                                                </p>
                                                <span>18 рабочих
                                                    или
                                                    30 спальных</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mb-30">
                                        <div class="calculate-total-box">
                                            <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/date.svg" alt="" loading="lazy"></div>
                                            <div class="calculate-total-box__text">
                                                <p>Срок поставки:
                                                </p>
                                                <span>3 дня</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-lg-3 mb-30">
                                        <div class="calculate-total-box">
                                            <div class="calculate-total-box__icon"><img src="#ASSETS_PATH#/img/size.svg" alt="" loading="lazy"></div>
                                            <div class="calculate-total-box__text">
                                                <p>Площадь:
                                                </p>
                                                <span>84 м<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="box-text text-center">
                                            <p><strong>Отправьте расчет менеджерам и получите дополнительную скидку на модульные здания</strong>
                                            </p>
                                        </div>
                                        <a href="#" class="btn btn-accent m-auto" data-bs-toggle="modal" data-bs-target="#callbackModal">
                                            <span>Получить расчет со скидкой</span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <? $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            array(
                "AREA_FILE_SHOW" => "file",
                "PATH" => '/include/content/arenda-block.php',
                "EDIT_TEMPLATE" => "standard.php"
            )
        ); ?>
    </div>
</section>
<?
$APPLICATION->IncludeComponent(
    "custom:form",
    "questions",
);
?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>