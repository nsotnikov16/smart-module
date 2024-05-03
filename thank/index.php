<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle($_GET['message'] ?: "Спасибо за заявку");
$APPLICATION->SetPageProperty('title', 'Спасибо!');
?>
<section class="page">
    <div class="container">
        <div class="row">
            #BREADCRUMB#
            <div class="col-12">
                <h1 class="text-center mb-60">#H1#</h1>
            </div>
        </div>
    </div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>