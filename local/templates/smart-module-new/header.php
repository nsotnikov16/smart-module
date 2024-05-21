<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? IncludeTemplateLangFile(__FILE__); ?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <title><? $APPLICATION->ShowTitle() ?></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <? include __DIR__ . '/include/styles.php'; ?>
    <? include __DIR__ . '/include/header/scripts.php'; ?>
    <? $APPLICATION->ShowHead(); ?>
</head>
<body>
<? $APPLICATION->ShowPanel() ?>
<header>
    <?
    include __DIR__ . '/include/header/top.php';
    include __DIR__ . '/include/header/bottom.php';
    include __DIR__ . '/include/header/fixed.php';
    ?>
</header>
<div class="content-wrapper">
    <?
    if ($APPLICATION->GetCurDir() !== '/') {
        // Данные хлебные крошки заносятся в переменную. Для вывода используйте макрос #BREADCRUMB#
        $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "breadcrumb",
            array(
                "COMPONENT_TEMPLATE" => "crumb",
                "START_FROM" => "0",
                "PATH" => "",
                "SITE_ID" => "s1",
                "COMPOSITE_FRAME_MODE" => "A",
                "COMPOSITE_FRAME_TYPE" => "AUTO"
            ),
            false
        );
    }
    ?>

