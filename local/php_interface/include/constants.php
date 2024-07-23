<?php
const ASSETS_PATH = '/local/templates/smart-module-new/assets';
const AJAX_URL = '/local/ajax/';
const POLICY_URL = '/politika-konfidentsialnosti/';
const DOMAIN_URL = 'https://' . SITE_SERVER_NAME;

if (str_contains(DOMAIN_URL, 'smart.local')) {
    AddEventHandler("main", "OnEndBufferContent", "imgSite");

    function imgSite(&$content) {
        if (str_contains($_SERVER['REQUEST_URI'], '/bitrix/')) return true;
        $content = str_replace('/upload/', 'https://smart-module.ru/upload/', $content);
    }
}
