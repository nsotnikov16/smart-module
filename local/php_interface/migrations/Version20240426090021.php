<?php

namespace Sprint\Migration;

use CModule;
use CIBlockElement;

CModule::IncludeModule('iblock');

class Version20240426090021 extends Version
{
    protected $description = "Перенос скриптов карт";

    protected $moduleVersion = "4.6.1";
    const IBLOCK_CITIES_ID = 4;
    const PROP_MAP = 'WF_MAP';
    const PROP_SUBDOMAIN = 'WF_SUBDOMAIN';
    const IBLOCK_SEO_ID = 5;
    const PROP_SEO_TEXT = 'WF_SEO_TEXT';

    const PAGE_URL = '/kontaktyi/';

    protected function getElementsSeo(): array
    {
        $result = [];
        $filter = ['IBLOCK_ID' => self::IBLOCK_SEO_ID, '?NAME' => self::PAGE_URL];
        $db = CIBlockElement::GetList([], $filter, false, false, ['ID', 'NAME', 'PROPERTY_' . self::PROP_SEO_TEXT]);

        while ($arr = $db->Fetch()) {
            $arr['SUBDOMAIN'] = $this->getSubDomain($arr['NAME']);
            $result[$arr['SUBDOMAIN']] = $arr;
        }


        return $result;
    }

    protected function getElementsCities(): array
    {
        $result = [];

        $filter = ['IBLOCK_ID' => self::IBLOCK_CITIES_ID];
        $db = CIBlockElement::GetList([], $filter, false, false, ['ID', 'NAME', 'PROPERTY_' . self::PROP_SUBDOMAIN]);

        while ($arr = $db->Fetch())
            $result[$arr['ID']] = $arr;

        return $result;
    }

    protected function getSubDomain(string $url): string
    {
        $result = '';
        try {
            $result = explode('.', $url)[0];
            if ($result === 'smart' || $result === 'test' || $result === 'smart-module') {
                $result = 'spb';
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

        return $result;
    }

    protected function getMapScript(string $html): string
    {
        $result = '';
        // Регулярное выражение для поиска содержимого по шаблону
        $pattern = '/<script[^>]*>\s*(.*?)\s*<\/script>\s*<div id="mymap" class="map">\s*(.*?)\s*<\/div>/s';

        // Поиск совпадений по шаблону в строке
        preg_match($pattern, $html, $matches);

        // Если найдено совпадение
        if (isset($matches[0])) {
            // Вывод содержимого
            $result = $matches[0];
        }

        return $result;
    }

    public function up()
    {
        $arraySeo = $this->getElementsSeo();
        $arrayCities = $this->getElementsCities();
        foreach ($arrayCities as $arrayCity) {
            $subdomain = $arrayCity['PROPERTY_' . self::PROP_SUBDOMAIN . '_VALUE'];
            if (!$subdomain) $subdomain = 'spb';
            $seoElement = $arraySeo[$subdomain];
            $html = $seoElement['PROPERTY_' . self::PROP_SEO_TEXT . '_VALUE'];
            if (!$html) continue;
            $mapScript = $this->getMapScript($html['TEXT']);
            CIBlockElement::SetPropertyValuesEx($arrayCity['ID'], self::IBLOCK_CITIES_ID, [
                self::PROP_MAP => $mapScript
            ]);
        }
    }

    public function down()
    {
        $arrayCities = $this->getElementsCities();
        foreach ($arrayCities as $arrayCity) {
            CIBlockElement::SetPropertyValuesEx($arrayCity['ID'], self::IBLOCK_CITIES_ID, [
                self::PROP_MAP => ''
            ]);
        }
    }
}
