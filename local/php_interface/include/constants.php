<?php
const ASSETS_PATH = '/local/templates/smart-module-new/assets';
const AJAX_URL = '/local/ajax/';

//AddEventHandler("main", "OnEndBufferContent", "imgSite");

function imgSite(&$content) {
    if (str_contains($_SERVER['REQUEST_URI'], '/bitrix/')) return true;
    $content = str_replace('/upload/', 'https://smart-module.ru/upload/', $content);
}