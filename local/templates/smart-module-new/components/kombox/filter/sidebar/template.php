<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if (method_exists($this, 'setFrameMode'))
    $this->setFrameMode(true); ?>

<div class="sidebar-head">
    <div class="sidebar-title">
        <div class="h3">Фильтр</div>
    </div>
</div>
<div class="sidebar-body" id="kombox-filter">
    <form name="<? echo $arResult["FILTER_NAME"] . "_form" ?>" action="<? echo $arResult["FORM_ACTION"] ?>" method="get" <? if ($arResult['IS_SEF']) : ?> data-sef="yes" <? endif; ?>>
        <? foreach ($arResult["HIDDEN"] as $arItem) : ?>
            <input type="hidden" name="<? echo $arItem["CONTROL_NAME"] ?>" id="<? echo $arItem["CONTROL_ID"] ?>" value="<? echo $arItem["HTML_VALUE"] ?>" />
        <? endforeach; ?>
        <? foreach ($arResult['ITEMS'] as $arItem) : ?>
            <? if (empty($arItem['VALUES'])) continue; ?>
            <? if ($arItem['CLOSED']) continue; ?>
            <? if ($arItem['PROPERTY_TYPE'] == 'L') : ?>
                <div class="sidebar-card lvl1 kombox-column panel_heading">
                    <div class="block_title select-title" data-property-name="<?= $arItem['NAME'] ?>">
                        <?= $arItem['NAME'] ?>
                    </div>
                    <div class="block_hover kombox-combo" <?= $arItem['IS_SHOW'] ? 'style="display:block;"' : '' ?>>
                        <? foreach ($arItem['VALUES'] as $arValue) : ?>
                            <? $disabled = ($arValue["DISABLED"] && !$arValue["CHECKED"]) ?>
                            <label class="label-checkbox lvl2 <?= $disabled ? 'kombox-disabled' : '' ?>">
                                <input type="checkbox" id="<?= $arValue["CONTROL_ID"] ?>" name="<?= $arItem['CODE_ALT'] ?>" value="<?= $arValue['HTML_VALUE_ALT'] ?>" <?= $disabled ? ' disabled="disabled"' : '' ?> <?= $arValue["CHECKED"] ? 'checked="checked"' : '' ?> />
                                <span class="label-checkbox__custom"> </span><span class="label-checkbox__text"><?= $arValue['VALUE'] ?><span class="val kombox-cnt">(<?= $arValue['CNT'] ?>)</span></span>
                            </label>
                        <? endforeach; ?>
                    </div>
                </div>
            <? endif; ?>
        <? endforeach; ?>
        <div class="sidebar-card sidebar-card__footer">
            <div class="btn-group">
                <div id="modef">
                    <a href="<?= $arResult["FILTER_URL"] ?>" class="btn btn-accent"><?= GetMessage("KOMBOX_CMP_FILTER_SET_FILTER") ?></a>
                </div>
                <a href="<?= $arResult["DELETE_URL"] ?>" class="btn btn-border-accent btn-clear"><?= GetMessage("KOMBOX_CMP_FILTER_DEL_FILTER") ?></a>
            </div>
            <span class="d-none" id="modef_num"></span>
        </div>
    </form>
</div>

<script>
    $(function() {
        komboxFilterJsInit();
        $('#kombox-filter').komboxHorizontalSmartFilter({
            ajaxURL: '<? echo CUtil::JSEscape($arResult["FORM_ACTION"]) ?>',
            urlDelete: '<? echo CUtil::JSEscape($arResult["DELETE_URL"]) ?>',
            align: '<? echo $arParams['MESSAGE_ALIGN'] ?>',
            modeftimeout: <? echo $arParams['MESSAGE_TIME'] ?>,
            columns: <? echo intval($arParams['COLUMNS']) > 0 ? intval($arParams['COLUMNS']) : 3; ?>
        });
    });
</script>