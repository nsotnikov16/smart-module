<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)): ?>
    <ul class="menu my-ul" id="header-menu">
    <? $previousLevel = 0; ?>
    <? foreach ($arResult as $key => $arItem): ?>

        <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
            <? if ($previousLevel == 1) : ?>
                <?= str_repeat("</ul></div></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
            <? else: ?>
                <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
            <? endif ?>

        <? endif ?>

        <? if ($arItem['IS_PARENT']): ?>
            <? if ($arItem['DEPTH_LEVEL'] == 1): ?>
                <li class="dropdown nav-item">
                <a href="<?= $arItem["LINK"] ?>" class="dropdown-toggle nav-link"
                   data-bs-toggle="dropdown"><?= $arItem["TEXT"] ?></a>
                <div class="dropdown-menu">
                <ul class="dropdown-submenu <?= $arItem['LINK'] === '/catalog/' ? ' dropdown-menu-catalog ' :
                    '' ?>my-ul">
            <? else: ?>
                <li>
                <a href="<?= $arItem["LINK"] ?>" class="dropdown-item">
                    <? if ($arItem['IMG_SRC']): ?>
                        <span class="dropdown-menu-catalog__icon">
                            <img src="<?= $arItem['IMG_SRC']?>" alt="<?= $arItem["TEXT"] ?>" loading="lazy"/>
                        </span>
                        <span class="dropdown-menu-catalog__text"><?= $arItem["TEXT"] ?></span>
                    <? else: ?>
                        <?= $arItem["TEXT"] ?>
                    <? endif; ?>
                </a>
                <ul class="dropdown-submenu my-ul">
            <? endif; ?>
        <? else: ?>
            <? if ($arItem['DEPTH_LEVEL'] == 1): ?>
                <li class="nav-item">
                    <a href="<?= $arItem["LINK"] ?>" class="nav-link"><?= $arItem["TEXT"] ?></a>
                </li>
            <? else: ?>
                <li>
                    <a href="<?= $arItem["LINK"] ?>" class="dropdown-item">
                        <? if ($arItem['PARAMS']['FROM_CATALOG'] && $arItem['DEPTH_LEVEL'] < 3 && $arItem['IMG_SRC']): ?>
                            <span class="dropdown-menu-catalog__icon">
                                <img src="<?= $arItem['IMG_SRC']?>" alt="<?= $arItem["TEXT"] ?>" loading="lazy"/></span>
                            <span class="dropdown-menu-catalog__text"> <?= $arItem["TEXT"] ?></span>
                        <? else: ?>
                            <?= $arItem["TEXT"] ?>
                        <? endif; ?>

                    </a>
                </li>
            <? endif; ?>
        <? endif; ?>

        <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
    <? endforeach; ?>
    </ul>
<? endif; ?>