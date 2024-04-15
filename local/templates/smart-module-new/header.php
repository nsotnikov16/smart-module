<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<? IncludeTemplateLangFile(__FILE__); ?>
<!doctype html>
<html lang="lang="<?= LANGUAGE_ID ?>"">
<head>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php $APPLICATION->ShowHead(); ?>
    <title><?php $APPLICATION->ShowTitle() ?></title>
</head>
<body>
<?$APPLICATION->ShowPanel()?>
