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

	<ul class="filter-sections-list mobile-menu_list">
		<?
		foreach ($arResult['SECTIONS'] as &$arSection) {
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>
			<?
		   	$arSelect = Array('ID', 'NAME', 'SECTION_PAGE_URL', 'UF_TITLEMENU');
		   	$arFilter = Array('IBLOCK_ID'=>$arParams['IBLOCK_ID'], 'SECTION_ID'=>$arSection["ID"], 'ACTIVE'=>'Y', 'GLOBAL_ACTIVE'=>'Y');
		   	$res = CIBlockSection::GetList(Array('SORT'=>'ASC'), $arFilter, true, $arSelect);
			$arSubSections = [];
		   	while($ob = $res->GetNext())
		   	{
		   		$arSubSections[]=$ob;
		   	}

			?>
			
			<li class="list <? if(!count($arSubSections)>0){?>list_no_before<? }?>" id="<?=$this->GetEditAreaId($arSection['ID'])?>">
				<a href="<?=$arSection["SECTION_PAGE_URL"]?>" class="link">
				<?= $arSection["UF_TITLEMENU"] ? $arSection["UF_TITLEMENU"] : $arSection["NAME"]?></a>
				<? if(count($arSubSections)>0):?>
					<div class="line">
						<ul class="filter-sections-sublist">
							<?foreach($arSubSections as $subSection):?>
								<li class="sublist_item">
									<a href="<?=$subSection["SECTION_PAGE_URL"]?>"><?= $subSection["UF_TITLEMENU"] ? $subSection["UF_TITLEMENU"] : $subSection["NAME"]?></a>
								</li>		
							<?endforeach;?>
						</ul>
					</div>
				<? endif;?>
			</li>
			<?
			unset($arSubSections);
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
				</li>
			</ul>
		</div>
	</li>
	<li  class="list">
		<a href="javascript:void(0);" class="link">Модульные здания</a>
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
				</li>
			</ul>
		</div>
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
</ul>
*/?>