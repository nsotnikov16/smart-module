<?
require($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
$data = json_decode(file_get_contents('php://input'), true);
CModule::IncludeModule('iblock');
$db_res = CIblockElement::GetList([], ['IBLOCK_ID' => $data['iblock_id'], 'ID' => $data['id']], false, false, []/* $data['props'] */)->GetNextElement();
if ($db_res) {
    $props = $db_res->GetProperties();
    foreach ($props as $key => $arProp) :
        if (!in_array($key, $data['props']) || !$arProp['VALUE']) continue;
?>

        <p class="info_block__text">
            <span><?= $arProp["NAME"] ?>:</span>
            <? if (!is_array($arProp["VALUE"])) : ?>
                <?= $arProp["VALUE"] ?>
            <? else : ?>
                <? $z = 1;
                foreach ($arProp["VALUE"] as $arVal) : ?>
                    <?= $arVal ?><? if (count($arProp["VALUE"]) > 1 && $z != count($arProp["VALUE"])) : ?>, <? endif; ?>
            <? $z++;
                endforeach; ?>
        <? endif; ?>
        </p>
<? endforeach;
}
