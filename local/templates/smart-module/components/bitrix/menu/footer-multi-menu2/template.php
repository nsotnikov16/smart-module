<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>





	<?
	$previousLevel = 0;
	foreach ($arResult as $arItem) : ?>

		<?/*if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></div>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif*/ ?>

		<?/*if($arItem["LINK"] != '/catalog/') :?>
			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
					<ul>
			<?else:?>
				<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent"><?=$arItem["TEXT"]?></a>
					<ul>
			<?endif?>

		<?else:*/ ?>

		<? if ($arItem["PERMISSION"] > "D") : ?>

			<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
				<? if ($previousLevel > 0) { ?></ul>
					</div><? } ?>
				<div class="f-menu" <? if ($previousLevel == 0) { ?>style="display:block;margin-right:10px" <? } ?>>
					<a href="<?= $arItem["LINK"] ?>" class="f-menu__title">
						<?= $arItem["TEXT"] ?>
					</a>
					<? if ($arItem["IS_PARENT"]) { ?>
						<ul class="f-menu__list">
						<? } ?>
					<? else : ?>
						<li class="f-menu__item">
							<img src="/local/templates/smart-module/images/icons/sq-transp-new.png" alt="alt" class="square-icon">
							<a href="<?= $arItem["LINK"] ?>" class="f-menu__link">
								<ion-icon name="expand"></ion-icon>
								<?= $arItem["TEXT"] ?>
							</a>
						</li>
					<? endif ?>

				<? else : ?>

					<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
						<li><a href="" class="<? if ($arItem["SELECTED"]) : ?>root-item-selected<? else : ?>root-item<? endif ?>" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
					<? else : ?>
						<li><a href="" class="denied" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
					<? endif ?>

				<? endif ?>

				<?/*endif*/ ?>

				<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

			<? endforeach ?>

			<? if ($previousLevel > 0) : //close last item tags
			?>
				<?= str_repeat("</ul></div>", ($previousLevel - 1)); ?>
			<? endif ?>

		<? endif ?>