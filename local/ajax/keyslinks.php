<?

use Bitrix\Main\Loader;
use Bitrix\Highloadblock\HighloadBlockTable;
use Sotbit\Seometa\Orm\SeometaUrlTable;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

Loader::includeModule("highloadblock");
Loader::includeModule("iblock");
Loader::includeModule("sotbit.seometa");

$idBlogIBlock = 6;
$idHLBlock = 6;
$elementId = $_GET['ELEMENT_ID'];

if (!$elementId) die;

$arHLBlock = HighloadBlockTable::getById($idHLBlock)->fetch();
$obEntity = HighloadBlockTable::compileEntity($arHLBlock);
$strEntityDataClass = $obEntity->getDataClass();

$element = \CIBlockElement::GetByID($elementId)->GetNext();
if (!$element) die;
$detailText = strip_tags($element['DETAIL_TEXT']);
$detailText = preg_replace("/[^\p{L}\s]+/u", "", $detailText);
if (!$detailText) die;

$filter = ['UF_ACTIVE' => '1'];
$select = ['UF_ID', 'UF_TYPE', 'UF_KEYS', 'UF_ACTIVE'];

$rsData = $strEntityDataClass::getList(array(
    'select' => $select,
    'filter' => $filter
));

$items = [];

while ($arItem = $rsData->Fetch()) {
    $substrings = [];
    if (is_array($arItem['UF_KEYS']) && !empty($arItem['UF_KEYS'])) {
        foreach ($arItem['UF_KEYS'] as $keyword) {
            if (str_contains($detailText, $keyword)) $substrings[] = $keyword;
        }
    }

    if (empty($substrings)) continue;

    switch ((int) $arItem['UF_TYPE']) {
        case 35:
            $chpu_db = SeometaUrlTable::getList([
                'filter' => ['=ID' => $arItem['UF_ID']],
                'select' => ['NEW_URL']
            ]);
            if ($arr = $chpu_db->fetch()) {
                foreach ($substrings as $str) {
                    $items[] = ['TEXT' => $str, 'LINK' => $arr['NEW_URL']];
                }
            }
            break;

        case 36:
            $section_db = \CIBlockSection::GetList([], ['=ID' => $arItem['UF_ID']], false);
            $section_db->SetUrlTemplates('#SITE_DIR#/catalog/#SECTION_CODE_PATH#/');
            if ($arr = $section_db->GetNext()) {
                foreach ($substrings as $str) {
                    $items[] = ['TEXT' => $str, 'LINK' => $arr['SECTION_PAGE_URL']];
                }
            }
            break;
    }
}
if (!empty($items)) {
foreach ($items as $key => $item) : ?>
    <div style="padding: 10px; border: 2px solid red; margin-bottom: 10px; border-radius: 5px;" class="check-link">
        <?= htmlentities(sprintf('<a href="%s">%s</a>', $item['LINK'], $item['TEXT'])) ?>
    </div>
<? endforeach;
} else {
    echo '<p>Ничего не найдено</p>';
}