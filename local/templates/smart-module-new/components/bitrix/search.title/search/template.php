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
$this->setFrameMode(true); ?>
<?
$INPUT_ID = trim($arParams["~INPUT_ID"]);
if ($INPUT_ID == '')
    $INPUT_ID = "title-search-input";
$INPUT_ID = CUtil::JSEscape($INPUT_ID);

$CONTAINER_ID = trim($arParams["~CONTAINER_ID"]);
if ($CONTAINER_ID == '')
    $CONTAINER_ID = "title-search";
$CONTAINER_ID = CUtil::JSEscape($CONTAINER_ID);

if ($arParams["SHOW_INPUT"] !== "N"): ?>
    <div class="search-wrapper" data-search-copy>
        <div class="search-wrapper-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="<? echo $arResult["FORM_ACTION"] ?>" class="form-search" id="<?echo $CONTAINER_ID?>">

                            <label>
                                <input id="<?echo $INPUT_ID?>" type="text" class="search-field" placeholder=""
                                       value="" name="q"
                                       autocomplete="off" maxlength="50"/>
                            </label>
                            <button class="btn btn-accent search-submit" type="submit">
                                <span>Поиск</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-wrapper-result">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-search-result>

                    </div>
                </div>
            </div>
        </div>
    </div>
<? endif ?>
<script>
    BX.ready(function () {
        window.searchObj = new JCTitleSearch({
            'AJAX_PAGE': '<?echo CUtil::JSEscape(POST_FORM_ACTION_URI)?>',
            'CONTAINER_ID': '<?echo $CONTAINER_ID?>',
            'INPUT_ID': '<?echo $INPUT_ID?>',
            'MIN_QUERY_LEN': 2
        });
    });
</script>
