<?
require($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
$data = json_decode(file_get_contents('php://input'), true);
CModule::IncludeModule('iblock');
$db_res = CIblockElement::GetList([], ['IBLOCK_ID' => 1, 'ID' => $data['id']], false, false, [])->GetNextElement(); ?>

<? if ($db_res) : 
    $ul = false;
    $props = $db_res->GetProperties(); ?>
    <? foreach ($props as $key => $arProp) :
        if (!in_array($key, $data['props']) || !$arProp['VALUE']) continue; ?>
        <li>
            <p><?= $arProp["NAME"] ?>:</p>
            <span><?= is_array($arProp['VALUE']) ? implode(', ', $arProp['VALUE']) : $arProp['VALUE'] ?></span>
        </li>
    <? endforeach; ?>
<? endif; ?>