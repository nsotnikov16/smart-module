<?php

namespace Sprint\Migration;

\CModule::IncludeModule('iblock');

class Version20240521090111 extends Version
{
    protected $description = "Добавление в инфоблок \"Отрасли\" свойства выбора товаров каталога \"Это может вам понравиться\" ";

    protected $moduleVersion = "4.6.1";
    private $iblockCode = 'otrasli';
    private $propData = [
        'CODE' => 'PRODUCTS',
        'NAME' => 'Товары для секции "Это может вам понравиться"',
        'PROPERTY_TYPE' => 'E',
        "LINK_IBLOCK_ID" => 1,
        'ACTIVE' => 'Y',
        'MULTIPLE' => 'Y'
    ];

    public function up()
    {
        $ibp = new \CIBlockProperty;
        $this->propData['IBLOCK_ID'] = $this->getIblockIdByCode($this->iblockCode);
        $ibp->Add($this->propData);
    }

    public function down()
    {
        $iblock_id = $this->getIblockIdByCode($this->iblockCode);
        $db_prop = \CIBlockProperty::GetList([], ['CODE' => $this->propData['CODE']])->Fetch();
        \CIBlockProperty::Delete($db_prop['ID']);
    }

    private function getIblockIdByCode($code) {
        $db_res = \CIblock::GetList([], ['CODE' => $code], false)->Fetch();
        return $db_res['ID'];
    }
}
