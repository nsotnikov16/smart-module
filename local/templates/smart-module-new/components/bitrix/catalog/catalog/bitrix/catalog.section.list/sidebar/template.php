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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM')); ?>

<? if (!empty($arResult['SECTIONS'])) : ?>
	<div class="sidebar-head">
		<div class="sidebar-title">
			<div class="h3">Каталог</div>
			<div class="sidebar-close"></div>
		</div>

	</div>
	<div class="sidebar-body sidebar-menu">
		<ul class="catalog-menu my-ul">
			<? foreach ($arResult['SECTIONS'] as $arSection) : ?>
				<?
				$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
				$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
				$name = $arSection["UF_TITLEMENU"] ?: $arSection["NAME"];
				?>
				<li class="catalog-menu__list" id="<?= $this->GetEditAreaId($arSection['ID']) ?>">
					<? if (!empty($arSection['SUBSECTIONS'])) : ?>
						<div class="catalog-menu__link"><?= $name ?> бытовки</div>
						<div class="catalog-menu__dropdown">
							<ul class="catalog-menu__submenu my-ul">
								<? foreach ($arSection['SUBSECTIONS'] as $arSubSection) : ?>
									<li><a href="<?= $arSubSection["SECTION_PAGE_URL"] ?>"><?= $arSubSection["UF_TITLEMENU"] ?: $arSubSection["NAME"]; ?></a></li>
								<? endforeach; ?>
							</ul>
						</div>
					<? else : ?>
						<a href="<?= $arSection["SECTION_PAGE_URL"] ?>" class="catalog-menu__link catalog-menu__link_empty"><?= $name ?></a>
					<? endif; ?>
				</li>
			<? endforeach; ?>
		</ul>
	</div>
<? endif; ?>