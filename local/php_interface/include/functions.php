<?php
function Redirect404()
{
    define('PATH_TO_404', '/404.php');
    if (
        !defined('ADMIN_SECTION') &&
        defined('KOMBOX_FILTER_ERROR_404') &&
        file_exists($_SERVER['DOCUMENT_ROOT'] . PATH_TO_404)
    ) {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();

        //die($_SERVER['DOCUMENT_ROOT'].SITE_TEMPLATE_PATH.'/header.php');

        include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/header.php');
        include($_SERVER['DOCUMENT_ROOT'] . PATH_TO_404);
        include($_SERVER['DOCUMENT_ROOT'] . SITE_TEMPLATE_PATH . '/footer.php');
    }
}

function changeContent(&$content)
{
    global $BREADCRUMB, $APPLICATION;
    if (!str_contains($_SERVER['REQUEST_URI'], '/bitrix/')) {
        $content = str_replace(
            [
                '#BREADCRUMB#',
                '#H1#',
                '#ASSETS_PATH#',
                '#POLICY_URL#',
                '#DOMAIN_URL#'
            ],
            [
                $BREADCRUMB ?? '',
                $APPLICATION->GetTitle(),
                ASSETS_PATH,
                POLICY_URL,
                DOMAIN_URL
            ],
            $content
        );
    }
}

function OnPrologAdminHandler()
{
    $adminUrl = '/bitrix/admin/';
    if (!str_contains($_SERVER['REQUEST_URI'], $adminUrl)) return;
    if (str_contains($_SERVER['REQUEST_URI'], $adminUrl . 'iblock_element_edit.php')) {
        include __DIR__ . '/admin/iblock_element_edit.php';
    }
}

function changeMetaTags()
{
    global $APPLICATION;
    if (intval($_REQUEST['PAGEN_1']) > 0) {
        $APPLICATION->SetPageProperty("description", $APPLICATION->GetPageProperty("description") . " | страница " . intval($_REQUEST['PAGEN_1']));
        $APPLICATION->SetPageProperty("title", $APPLICATION->GetTitle() . " в #WF_CITY_PRED# | страница " . intval($_REQUEST['PAGEN_1']));
    }

    $APPLICATION->SetPageProperty('keywords', $APPLICATION->GetTitle());
}


function getImageSrcForCertificate(array $arItem, string $type = 'big')
{
    $imgArray = $arItem['DETAIL_PICTURE']['SRC'] ? $arItem['DETAIL_PICTURE'] : $arItem['PREVIEW_PICTURE'];
    if (!$imgArray['SRC']) return '';
    if ($type === 'small') {
        $file = CFile::ResizeImageGet(
            $imgArray,
            array('width' => 250, 'height' => 250),
            BX_RESIZE_IMAGE_PROPORTIONAL,
            true
        );
        return $file['src'] ?: '';
    }
    return $imgArray['SRC'];
}
