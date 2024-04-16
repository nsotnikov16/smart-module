<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?define('ASSETS_PATH', SITE_TEMPLATE_PATH . '/assets');?>
<? IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<html lang="lang="<?= LANGUAGE_ID ?>"">
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <? include __DIR__ . '/include/styles.php'; ?>
    <? include __DIR__ . '/include/scripts.php'; ?>
    <? $APPLICATION->ShowHead(); ?>

</head>
<body>
<? $APPLICATION->ShowPanel() ?>
<header>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex">
                    <div class="header-top__wrapper">
                        <a href="#" class="btn-burger-mobile">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                        <a href="<?= SITE_DIR?>" class="logo">
                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/header-logo.png" alt="" loading="lazy" />
                        </a>
                        <div class="header-box header-box-phone">
                            <div class="location-box">
                                <a href="#" class="btn-location" data-bs-toggle="modal"
                                   data-bs-target="#locationModal">Санкт-Петербург</a>
                            </div>
                            <a href="tel:+78129071459" class="phone"><i class="fa fa-phone" aria-hidden="true"></i>8 (812)
                                907-14-59</a>
                        </div>
                        <div class="header-box header-box-mail">
                            <span>Email поддержка:</span>
                            <a href="mailto:spb1@smart-module.ru" class="mail"><i class="fa fa-envelope-o"
                                                                                  aria-hidden="true"></i>spb1@smart-module.ru</a>
                        </div>

                        <ul class="list-social my-ul">
                            <li class="list-social__item">
                                <a href="https://vk.com/smart_module" target="_blank" class="list-social__link">
                                    <i class="fa fa-vk" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-social__item">
                                <a href="https://www.youtube.com/channel/UCe0MhLxBpNUuyEXD-G28J6w/" target="_blank"
                                   class="list-social__link">
                                    <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-accent btn-callback" data-bs-toggle="modal"
                           data-bs-target="#callbackModal">Получить консультацию</a>
                        <div class="btn-search d-flex d-md-none">
                            <svg class="svg-icon svg-icon-search">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/sprite.svg#search"></use>
                            </svg>
                            <svg class="svg-icon svg-icon-close">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/sprite.svg#close-icon"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="search-wrapper">
        <div class="search-wrapper-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form method="post" class="form-search">
                            <label>
                                <input type="search" class="search-field" placeholder="" value="" name="search" autocomplete="off" />
                            </label>
                            <button class="btn btn-accent search-submit" type="submit">
                                <span>Поиск</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-wrapper-result">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <a href="product.html" class="search-wrapper-result-item">
								<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                   loading="lazy" /></span>
                            <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
									школа CONTAINEX</span>
                        </a>
                        <a href="product.html" class="search-wrapper-result-item">
								<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                   loading="lazy" /></span>
                            <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
									школа CONTAINEX</span>
                        </a>
                        <a href="product.html" class="search-wrapper-result-item">
								<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                   loading="lazy" /></span>
                            <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
									школа CONTAINEX</span>
                        </a>
                        <a href="product.html" class="search-wrapper-result-item">
								<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                   loading="lazy" /></span>
                            <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
									школа CONTAINEX</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="nav nav-menu">
                        <div class="location-box d-flex d-md-none">
                            <a href="#" class="btn-location" data-bs-toggle="modal"
                               data-bs-target="#locationModal">Санкт-Петербург</a>
                        </div>
                        <ul class="menu my-ul">
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">каталог</a>
                                <div class="dropdown-menu">
                                    <ul class="dropdown-menu-catalog my-ul">
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category1.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Металлические бытовки</span>
                                            </a>
                                            <ul class="dropdown-submenu my-ul">
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Котельные</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category2.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Блок-контейнеры</span>
                                            </a>
                                            <ul class="dropdown-submenu my-ul">
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Котельные</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category3.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Металлические контейнеры</span>
                                            </a>
                                            <ul class="dropdown-submenu my-ul">
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Котельные</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category4.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Модульные здания</span>
                                            </a>
                                            <ul class="dropdown-submenu my-ul">
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Котельные</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category5.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Переоборудование контейнеров</span>
                                            </a>
                                            <ul class="dropdown-submenu my-ul">
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Котельные</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category6.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Модульные станции</span>
                                            </a>
                                            <ul class="dropdown-submenu my-ul">
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Котельные</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                                </li>
                                                <li>
                                                    <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category7.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Торговые павильоны</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="catalog-category.html" class="dropdown-item">
													<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category8.svg" alt=""
                                                                                                   loading="lazy" /></span>
                                                <span class="dropdown-menu-catalog__text">Быстровозводимые здания</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="projects.html" class="nav-link">проекты</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="services.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">услуги</a>
                                <div class="dropdown-menu">
                                    <ul class="dropdown-submenu my-ul">
                                        <li>
                                            <a href="rent.html" class="dropdown-item">Аренда</a>
                                        </li>
                                        <li>
                                            <a href="delivery.html" class="dropdown-item">Доставка</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="technology.html" class="nav-link">технология</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="industry.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">отрасли</a>
                                <div class="dropdown-menu">
                                    <ul class="dropdown-submenu my-ul">
                                        <li>
                                            <a href="events.html" class="dropdown-item">Мероприятия и выставки</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Торговый сектор</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Наука и образование</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Муниципальное управление</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Здравоохранение</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Промышленность</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Порты и логистика</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Гастрономия</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Финансовый сектор</a>
                                        </li>
                                        <li>
                                            <a href="industry.html" class="dropdown-item">Строительство</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="blog.html" class="nav-link">блог</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="about.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">о нас</a>
                                <div class="dropdown-menu">
                                    <ul class="dropdown-submenu my-ul">
                                        <li>
                                            <a href="about.html" class="dropdown-item">О компании</a>
                                        </li>
                                        <li>
                                            <a href="team.html" class="dropdown-item">Команда</a>
                                        </li>
                                        <li>
                                            <a href="pride.html" class="dropdown-item">Наша гордость</a>
                                        </li>
                                        <li>
                                            <a href="manufacture.html" class="dropdown-item">Производство</a>
                                        </li>
                                        <li>
                                            <a href="requisites.html" class="dropdown-item">Реквизиты</a>
                                        </li>
                                        <li>
                                            <a href="calculate.html" class="dropdown-item">Калькулятор</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="contacts.html" class="nav-link">контакты</a>
                            </li>
                        </ul>
                        <a href="tel:+78129071459" class="phone d-flex d-md-none"><i class="fa fa-phone" aria-hidden="true"></i>8
                            (812)
                            907-14-59</a>
                        <a href="#" class="btn btn-accent btn-callback d-flex d-md-none" data-bs-toggle="modal"
                           data-bs-target="#callbackModal">Получить
                            консультацию</a>
                        <div class="btn-search d-none d-md-flex">
                            <svg class="svg-icon svg-icon-search">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/sprite.svg#search"></use>
                            </svg>
                            <svg class="svg-icon svg-icon-close">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/sprite.svg#close-icon"></use>
                            </svg>
                        </div>
                        <a href="mailto:spb1@smart-module.ru" class="mail d-block d-md-none"><i class="fa fa-envelope-o"
                                                                                                aria-hidden="true"></i>spb1@smart-module.ru</a>
                    </nav>
                </div>
            </div>
        </div>

    </div>

    <div class="header-fixed">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header-top__wrapper">
                        <div class="dropdown dropdown-burger">
                            <a href="#" class="btn-burger dropdown-toggle" data-bs-toggle="dropdown"><svg class="svg-icon">
                                    <use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/sprite.svg#burger"></use>
                                </svg></a>
                            <div class="dropdown-menu">
                                <ul class="dropdown-menu-catalog my-ul">
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category1.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Металлические бытовки</span>
                                        </a>
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Котельные</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category2.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Блок-контейнеры</span>
                                        </a>
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Котельные</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category3.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Металлические контейнеры</span>
                                        </a>
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Котельные</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category4.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Модульные здания</span>
                                        </a>
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Котельные</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category5.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Переоборудование контейнеров</span>
                                        </a>
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Котельные</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category6.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Модульные станции</span>
                                        </a>
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Компрессионные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Котельные</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Насосные станции</a>
                                            </li>
                                            <li>
                                                <a href="catalog.html" class="dropdown-item">Электростанции</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category7.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Торговые павильоны</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="catalog-category.html" class="dropdown-item">
												<span class="dropdown-menu-catalog__icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/category8.svg" alt=""
                                                                                               loading="lazy" /></span>
                                            <span class="dropdown-menu-catalog__text">Быстровозводимые здания</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <a href="index.html" class="logo">
                            <img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo-sm.png" alt="" loading="lazy" />
                        </a>
                        <div class="header-box">
                            <div class="location-box header-box-phone">
                                <a href="#" class="btn-location" data-bs-toggle="modal"
                                   data-bs-target="#locationModal">Санкт-Петербург</a>
                            </div>
                            <a href="tel:+78129071459" class="phone"><i class="fa fa-phone" aria-hidden="true"></i>8 (812)
                                907-14-59</a>
                        </div>

                        <nav class="nav nav-menu">
                            <ul class="menu my-ul">
                                <li class="nav-item">
                                    <a href="projects.html" class="nav-link">проекты</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="services.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">услуги</a>
                                    <div class="dropdown-menu">
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="rent.html" class="dropdown-item">Аренда</a>
                                            </li>
                                            <li>
                                                <a href="delivery.html" class="dropdown-item">Доставка</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a href="blog.html" class="nav-link">блог</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="about.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">о нас</a>
                                    <div class="dropdown-menu">
                                        <ul class="dropdown-submenu my-ul">
                                            <li>
                                                <a href="about.html" class="dropdown-item">О компании</a>
                                            </li>
                                            <li>
                                                <a href="team.html" class="dropdown-item">Команда</a>
                                            </li>
                                            <li>
                                                <a href="pride.html" class="dropdown-item">Наша гордость</a>
                                            </li>
                                            <li>
                                                <a href="manufacture.html" class="dropdown-item">Производство</a>
                                            </li>
                                            <li>
                                                <a href="requisites.html" class="dropdown-item">Реквизиты</a>
                                            </li>
                                            <li>
                                                <a href="certificates.html" class="dropdown-item">Сертификаты</a>
                                            </li>
                                            <li>
                                                <a href="calculate.html" class="dropdown-item">Калькулятор</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="contacts.html" class="nav-link">контакты</a>
                                </li>
                            </ul>
                        </nav>

                        <a href="#" class="btn btn-accent btn-callback" data-bs-toggle="modal"
                           data-bs-target="#callbackModal">Получить консультацию</a>
                        <div class="btn-search">
                            <svg class="svg-icon svg-icon-search">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/sprite.svg#search"></use>
                            </svg>
                            <svg class="svg-icon svg-icon-close">
                                <use xlink:href="<?=SITE_TEMPLATE_PATH?>/assets/img/sprite.svg#close-icon"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-wrapper">
            <div class="search-wrapper-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form method="post" class="form-search">
                                <label>
                                    <input type="search" class="search-field" placeholder="" value="" name="search"
                                           autocomplete="off" />
                                </label>
                                <button class="btn btn-accent search-submit" type="submit">
                                    <span>Поиск</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-wrapper-result">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                       loading="lazy" /></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                       loading="lazy" /></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                       loading="lazy" /></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                            <a href="product.html" class="search-wrapper-result-item">
									<span class="search-wrapper-result-item__img"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/search-result-img-min.jpg" alt=""
                                                                                       loading="lazy" /></span>
                                <span class="search-wrapper-result-item__title"><span class="color-accent font-700">Модул</span>ьная
										школа CONTAINEX</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper">

