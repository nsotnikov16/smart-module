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
$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;

	if ($arResult['NavRecordCount'] <= $arResult['NavPageSize']) return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<div class="col-12">
	<nav class="nav nav-pagination nav-pagination-v2">
		<ul class="pagination my-ul">
			<? if ($arResult["NavPageNomer"] <= $arResult["NavPageCount"] && $arResult['NavPageNomer'] != 1) : ?>
				<li class="nav-item"><span class="company-border"></span><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] - 1) ?>" class="nav-link"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
			<? endif; ?>

			<? while ($arResult["nStartPage"] >= $arResult["nEndPage"]) : ?>
				<? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

				<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
					<li class="nav-item active"><span class="company-border"></span><a href="javascript:void(0)" class="nav-link"><?= $NavRecordGroupPrint ?></a></li>
				<? elseif ($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false) : ?>
				<? else : ?>
					<li class="nav-item"><span class="company-border"></span><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>" class="nav-link"><?= $NavRecordGroupPrint ?></a></li>
				<? endif ?>
				<? $arResult["nStartPage"]-- ?>
			<? endwhile ?>

			<? while ($arResult["nStartPage"] <= $arResult["nEndPage"]) : ?>
				<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
					<li class="nav-item active"><span class="company-border"></span><a href="javascript:void(0)" class="nav-link"><?= $arResult["nStartPage"] ?></a></li>
				<? elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false) : ?>
					<li class="nav-item"><span class="company-border"></span><a href="<?= $arResult["sUrlPath"] . $strNavQueryStringFull ?>" class="nav-link"><?= $arResult["nStartPage"] ?></a></li>
				<? else : ?>
					<li class="nav-item"><span class="company-border"></span><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>" class="nav-link"><?= $arResult["nStartPage"] ?></a></li>
				<? endif ?>
				<? $arResult["nStartPage"]++ ?>
			<? endwhile ?>

			<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"] && $arResult['NavPageNomer'] != $arResult['NavPageCount']) : ?>
				<li class="nav-item"><span class="company-border"></span><a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>" class="nav-link"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
			<? endif; ?>
		</ul>
	</nav>
</div>