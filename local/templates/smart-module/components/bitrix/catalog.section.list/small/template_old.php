<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

if (0 < $arResult["SECTIONS_COUNT"]) {?>

	<ul class="filter-sections-list">
		<?
		foreach ($arResult['SECTIONS'] as &$arSection) {
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
			<li id="<?=$this->GetEditAreaId($arSection['ID'])?>">
				<a href="<?=$arSection['SECTION_PAGE_URL']?>">
					<div class="image">
						<?
						$image = (isset($arSection['PICTURE']['SRC'])) ? $arSection['PICTURE']['SRC'] : SITE_TEMPLATE_PATH."/images/noimage_355x220.jpg";
						?>
						<img src="<?=$image?>" alt="<?=$arSection['NAME']?>">
					</div>
					<?=$arSection['NAME']?>
					<?if ($arParams["COUNT_ELEMENTS"]):?>
						(<?=$arSection['ELEMENT_CNT']?>)
					<?endif?>
				</a>
			</li>
			<?
		}
		unset($arSection);
		?>
	</ul>


	<?
}
?>
<?/*
<ul class="filter-sections-list">
	<li class="list">
		<a href="javascript:void(0);" class="link">Металлические бытовки</a>
		<div class="line">
		<ul class="filter-sections-sublist">
		<li class="sublist_item">
			<a href="/catalog/metallicheskie-bytovki/blok-konteynery/">Блок контейнеры</a>
						
			<li class="sublist_item">
				<a href="/catalog/metallicheskie-bytovki/vagonchiki/">Вагончики бытовки</a>
			</li>
			<li class="sublist_item">
				<a href="/catalog/metallicheskie-bytovki/metall-containex/">Металлические бытовки CONTAINEX</a>
			</li>
			<li class="sublist_item">
				<a href="/catalog/metallicheskie-bytovki/modulnye/">Модульные бытовки</a>
			</li>
			<li class="sublist_item">
				<a href="/catalog/metallicheskie-bytovki/kpp/">Модульные КПП</a>
			</li>
			<li class="sublist_item">
				<a href="/catalog/metallicheskie-bytovki/dlya-stroiteley/">Строительные бытовки</a>
			</li>
				</li></ul>
				</div>
	</li>
	<li  class="list">
		<a href="/catalog/modulnye-zdaniya/">Модульные здания</a>
	</li>
	<li  class="list">
		<a href="/catalog/kontejneryi/">Контейнеры</a>
	</li>
	<li  class="list">
		<a href="/catalog/torgovye-pavilony/">Торговые павильоны</a>
	</li>
	<li  class="list">
		<a href="/catalog/rekonstruktsiya-konteynerov/">Реконструкции контейнеров</a>
	</li>
	<li  class="list">
		<a href="/catalog/angary/">Ангары</a>
	</li>
	<li  class="list">
		<a href="/catalog/modulnye-stantsii/">Модульные станции</a>
	</li>
				</ul>*/?>