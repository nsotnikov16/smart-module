<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? if (!empty($arResult)): ?>
    <? $previousLevel = 0; ?>
    <? $ordinalChild = 0; ?>
    <? foreach ($arResult as $arItem): ?>
        <? if ($arItem['DEPTH_LEVEL'] == 1): ?>
            <? $ordinalChild = 0; ?>
            <?= $previousLevel > 1 ? '</ul>' : '' ?>
            <a href="<?= $arItem["LINK"] ?>" class="footer-column__title"><?= $arItem["TEXT"] ?></a>
        <? elseif ($arItem["DEPTH_LEVEL"] > 1): ?>
            <? $ordinalChild++; ?>
            <?= $ordinalChild == 1 ? '<ul class="footer-menu my-ul">' : '' ?>
            <li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>
        <? endif; ?>
        <? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>
    <? endforeach; ?>
    <? if ($previousLevel > 1)://close last item tags?>
        <?= str_repeat("</ul>", ($previousLevel - 1)); ?>
    <? endif ?>
<? endif ?>