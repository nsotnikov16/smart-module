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
?>
<?php /*?><div class="certificate_block">
	<div class="certificate-image">
        <?$a = 0;?>
	<?foreach($arResult["ITEMS"] as $arItem):?>
        <div class="many-wp-cart">
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
            <?$b = 0;?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="new-class-ser" rel="gallery" id="<?=$this->GetEditAreaId($arItem['ID']);?>"<?if($a != $b) {?> style="display: none !important;"<?}?>>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>" class="certificate">
            </a>
            <?$b++;?>
        <?endforeach;?>
        </div>
        <?$a++;?>
	<?endforeach;?>
	</div>
</div><?php */?>
<style>
    .lg-outer {
        z-index: 9999 !important;
    }
    .lg-sub-html {
        display: none !important;
    }
    #lg-download {
        display: none !important;
    }
    .lg-fullscreen {
        display: none !important;
    }
    #lg-actual-size {
        display: none !important;
    }
    #lg-share {
        display: none !important;
    }
    .lg-backdrop {
        z-index: 9998 !important;
        background-color: rgba(0,0,0,.3);
    }
    .lg-thumb-outer.lg-grab {
        display: none !important;
    }
</style>