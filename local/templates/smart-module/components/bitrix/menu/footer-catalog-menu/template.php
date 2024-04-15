<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<?/*<?echo "<pre>"; print_r($arResult); echo "</pre>"?>*/?>

<ul class="f-menu__list">

<?
foreach($arResult as $arItem):
	if($arItem['PARAMS']['FROM_IBLOCK'] == 1) {
		if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
			continue;
		?>
		<?if($arItem["SELECTED"]):?>
			<li class="f-menu__item"><a href="<?=$arItem["LINK"]?>" class="f-menu__link"><ion-icon name="expand"></ion-icon><?=$arItem["TEXT"]?></a></li>
		<?else:?>
			<li class="f-menu__item"><a href="<?=$arItem["LINK"]?>" class="f-menu__link"><ion-icon name="expand"></ion-icon><?=$arItem["TEXT"]?></a></li>
		<?endif?>
	<?}?>
<?endforeach?>

</ul>
<?endif?>