<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>

<div class="row">
	<div class="col-12 mb-40">
		<form class="form-search">
			<input type="hidden" name="how" value="<? echo $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>" />
			<label>
				<input type="text" class="search-field" placeholder="" value="<?= $arResult["REQUEST"]["QUERY"] ?>" name="q" autocomplete="off">
			</label>
			<button class="btn btn-accent search-submit" type="submit"><span>Искать</span></button>
		</form>
	</div>
</div>
<? if (!empty($arResult['SEARCH'])) : ?>
	<div class="row align-items-center mb-30">
		<?= $arResult['NAV_STRING'] ?>
	</div>
	<div class="row">
		<div class="col-12">
			<? foreach ($arResult['SEARCH'] as $arItem) : ?>
				<div class="result-card">
					<a href="<?= $arItem["URL"] ?>" class="result-card__photo"><img src="<?= $arItem['ICON']?>" loading="lazy" /></a>
					<div class="result-card__body">
						<a href="<?= $arItem["URL"] ?>" class="result-card__title"><?= $arItem["TITLE_FORMATED"] ?></a>
						<div class="box-text">
							<p><?= strip_tags($arItem["BODY_FORMATED"]) ?></p>
						</div>
						<div class="d-none" data-chain-path><?= $arItem['CHAIN_PATH'] ?></div>
						<nav aria-label="breadcrumb" class="nav-breadcrumb">
							<ol class="breadcrumb" data-nav-item>
							</ol>
						</nav>
					</div>
				</div>
			<? endforeach ?>
		</div>
	</div>
	<div class="row align-items-center mt-30">
		<?= $arResult["NAV_STRING"] ?>
	</div>
<? else : ?>
	<div class="box-text">
		<h3>Ничего не найдено</h3>
	</div>
<? endif; ?>