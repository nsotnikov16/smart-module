<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true); ?>
<div class="row">
    <div class="col-12">
        <div class="article-title-wrapper">
            #BREADCRUMB#
            <h1>#H1#</h1>
            <div class="materials-card-list article-info-list">
                <? if ($arParams["DISPLAY_DATE"] != "N" && $arResult["DISPLAY_ACTIVE_FROM"]) : ?>
                    <div class="materials-card-list__item">
                        <svg class="svg-icon svg-icon-calendar">
                            <use xlink:href="#ASSETS_PATH#/img/sprite.svg#calendar"></use>
                        </svg>
                        <span><?= $arResult["DISPLAY_ACTIVE_FROM"] ?></span>
                    </div>
                <? endif; ?>
                <? if ($arResult['PROPERTIES']['READING_TIME']['VALUE']) : ?>
                    <div class="materials-card-list__item">
                        <svg class="svg-icon svg-icon-calendar">
                            <use xlink:href="#ASSETS_PATH#/img/sprite.svg#time"></use>
                        </svg>
                        <span><?= $arResult['PROPERTIES']['READING_TIME']['VALUE'] ?></span>
                    </div>
                <? endif; ?>
                <div class="materials-card-list__item">
                    <svg class="svg-icon svg-icon-calendar">
                        <use xlink:href="#ASSETS_PATH#/img/sprite.svg#view"></use>
                    </svg>
                    <span class="neiros_views">156</span>
                </div>
                <div class="materials-card-list__item">
                    <svg class="svg-icon svg-icon-calendar">
                        <use xlink:href="#ASSETS_PATH#/img/sprite.svg#comment"></use>
                    </svg>
                    <a href="#comment-section" class="go_to path-link">Обсудить</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 d-flex flex-wrap align-items-stretch">
        <article class="article-content">
            <? if (($nav = $arResult['PROPERTIES']['SODERZHANIE']['~VALUE']) && $nav['TEXT']) : ?>
                <div class="article-menu open">
                    <div class="article-menu__head">
                        <div class="h4">Содержание</div>
                    </div>
                    <div class="article-menu__body">
                        <?= $nav['TEXT'] ?>
                        <? if (strlen($nav['TEXT']) > 300) : ?>
                            <a href="#" class="article-menu__toggle">Показать полностью</a>
                        <? endif; ?>
                    </div>
                </div>
            <? endif; ?>

            <div class="box-text article-text">
                <?= $arResult["DETAIL_TEXT"] ?>
            </div>

            <div class="comment-section neiros-comment" id="comment-section">
                <h2>Комментарии</h2>
            </div>
        </article>


        <aside class="article-sidebar">
            <? if (!empty($arResult['POPULARS'])) : ?>
                <div class="article-sidebar-popular article-box">
                    <div class="h4 article-box__title">Популярные статьи</div>
                    <? foreach ($arResult['POPULARS'] as $article) : ?>
                        <div class="article-popular-box">
                            <a href="<?= $article['DETAIL_PAGE_URL'] ?>" class="article-popular-box__img"><img src="<?= $article['IMG_SRC'] ?>" alt="<?= $article['NAME'] ?>" loading="lazy" /></a>
                            <div class="article-popular-box__body">
                                <div class="materials-card-list__item date">
                                    <svg class="svg-icon svg-icon-calendar">
                                        <use xlink:href="#ASSETS_PATH#/img/sprite.svg#calendar"></use>
                                    </svg>
                                    <span><?= $article['DATE'] ?></span>
                                </div>
                                <a href="<?= $article['DETAIL_PAGE_URL'] ?>" class="article-popular-box__title"><?= $article['NAME'] ?></a>
                            </div>
                        </div>
                    <? endforeach ?>
                    <a href="/blog/" class="article-popular__link">
                        <span>Ко всем статьям</span>
                        <svg class="svg-icon">
                            <use xlink:href="#ASSETS_PATH#/img/sprite.svg#arrow-link"></use>
                        </svg>
                    </a>
                </div>
            <? endif; ?>
            <div class="article-sidebar-fixed">
                <div class="mb-30">
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:subscribe.edit",
                        "subscribe",
                        array(
                            "AJAX_MODE" => "N",
                            "SHOW_HIDDEN" => "N",
                            "ALLOW_ANONYMOUS" => "Y",
                            "SHOW_AUTH_LINKS" => "N",
                            "CACHE_TYPE" => "N",
                            "CACHE_TIME" => "3600",
                            "SET_TITLE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "N",
                            "AJAX_OPTION_HISTORY" => "N",
                            "COMPONENT_TEMPLATE" => ".default",
                            "AJAX_OPTION_ADDITIONAL" => "",
                            "COMPOSITE_FRAME_MODE" => "A",
                            "COMPOSITE_FRAME_TYPE" => "AUTO"
                        ),
                        false
                    ); ?>
                </div>
                <a href="#" class="banner-link">
                    <img src="#ASSETS_PATH#/img/banner_tmp.png" alt="Баннер" />
                </a>
            </div>
        </aside>
    </div>
</div>