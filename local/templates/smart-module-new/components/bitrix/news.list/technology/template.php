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
?>
<? if (!empty($arResult['ITEMS'])) : ?>
	<div class="tabs">
		<ul class="tabs__caption my-ul">
			<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
				<li <?= $key == 0 ? 'class="active"' : '' ?>><?= $arItem['NAME'] ?></li>
			<? endforeach ?>
		</ul>


		<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			
			?>
			<div class="tabs__content <?= $key == 0 ? 'active' : '' ?>" id="<?= $this->GetEditAreaId($arItem['ID']);?>">
				<div class="video-container-tab video-container-tab<?= $key ?>">
					<? foreach ($arItem['PROPERTIES']['VIDEO']['VALUE'] as $keyVideo => $videoId) :	?>
						<div class="video-conainer-tab-cont">
							<video muted="" id="video-<?= $videoId ?>" poster="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>">
								<source type="video/mp4" src="<?= \CFile::GetPath($videoId) ?>">
							</video>
						</div>
					<? endforeach ?>
				</div>
				<div class="myprogress">
					<div class="myprogress-box">
						<div class="progres-h1">Основу составляют легкие металоконструкции с обшивкой металлопрофилем или
							сендвич-панелями
						</div>
						<div class="video-tab video-tab<?= $key ?>">
							<? foreach ($arItem['PROPERTIES']['STAGES']['~VALUE'] as $stage) : ?>
								<div class="video-tab__item">
									<?= $stage ?>
									<div></div>
									<span></span>
								</div>
							<? endforeach ?>
						</div>
					</div>
				</div>
			</div>
		<? endforeach ?>
	</div>
<? endif; ?>