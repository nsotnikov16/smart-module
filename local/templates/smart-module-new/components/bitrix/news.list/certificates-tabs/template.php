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
<? if (!empty($arResult['ITEMS'])): ?>
    <div class="row">
        <div class="col-12">

            <ul class="nav nav-tabs" role="tablist">
                <? foreach ($arResult['SECTIONS'] as $id => $section): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= array_key_first($arResult['SECTIONS']) == $id ? 'active' : '' ?>"
                                id="<?= $id ?>-tab"
                                data-bs-toggle="tab" data-bs-target="#<?= $id ?>-tab-pane"
                                type="button" role="tab" aria-controls="<?= $id ?>-tab-pane"
                                aria-selected="true"><?= $section['NAME'] ?>
                        </button>
                    </li>
                <? endforeach; ?>
            </ul>

            <div class="tab-content" id="myTabContent">
                <? foreach ($arResult['SECTIONS'] as $id => $section): ?>
                    <div class="tab-pane fade <?= array_key_first($arResult['SECTIONS']) == $id ? 'show active' : '' ?>"
                         id="<?= $id ?>-tab-pane" role="tabpanel" aria-labelledby="<?= $id ?>-tab"
                         tabindex="0">
                        <div class="row">
                            <? foreach ($section['ITEMS'] as $arItem) : ?>
                                <?
                                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                                    CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                                    CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                                    array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                                ?>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-20">
                                    <a href="<?= getImageSrcForCertificate($arItem) ?>"
                                       class="certificate-box"
                                       data-fancybox="certificate"
                                       id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
                                       title="<?= $arItem['NAME'] ?>"
                                    >
                                        <img src="<?= getImageSrcForCertificate($arItem, 'small') ?>" alt="<?= $arItem['NAME'] ?>"
                                             loading="lazy">
                                    </a>
                                </div>
                            <? endforeach; ?>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
<? endif; ?>
