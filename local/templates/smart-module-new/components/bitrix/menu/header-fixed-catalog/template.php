<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <div class="dropdown-menu">
    <ul class="dropdown-menu-catalog my-ul">
    <? $previousLevel = 0; ?>
    <? foreach ($arResult as $key => $arItem): ?>

        <? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel): ?>
             <?= str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
        <? endif ?>

        <? if ($arItem['IS_PARENT']): ?>

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

        <? else: ?>
                <li>
                    <a href="<?= $arItem["LINK"] ?>" class="dropdown-item">
                        <? if ($arItem['DEPTH_LEVEL'] == 2 && $arItem['IMG_SRC']) :?>
                            <span class="dropdown-menu-catalog__icon">
                                <img src="<?= $arItem['IMG_SRC']?>" alt="<?= $arItem["TEXT"] ?>" loading="lazy"/>
                            </span>
                            <span class="dropdown-menu-catalog__text"><?= $arItem["TEXT"] ?></span>
                        <?else: ?>
                            <?= $arItem["TEXT"] ?>
                        <?endif;?>
                    </a>
                </li>
        <? endif; ?>

        <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
    <? endforeach; ?>
                </ul>
    </div>

<? endif; ?>