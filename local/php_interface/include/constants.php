<?php
const ASSETS_PATH = '/local/templates/smart-module-new/assets';
AddEventHandler("main", "OnEndBufferContent", "imgSite");

function imgSite(&$content) {
    $content = str_replace('/upload/', 'https://smart-module.ru/upload/', $content);
}