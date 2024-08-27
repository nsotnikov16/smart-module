<?php

namespace Sprint\Migration;
\CModule::IncludeModule('iblock');

class Version20240827165241 extends Version
{
    protected $description = "Изменяет DETAIL_PAGE_URL у инфоблока \"Отрасли\"";

    protected $moduleVersion = "4.6.1";

    private $iblockCode = 'otrasli';

    public function up()
    {
        $iblock_id = $this->getIblockIdByCode($this->iblockCode);
        $ib = new \CIBlock;
        $ib->Update($iblock_id, ['DETAIL_PAGE_URL' => '#SITE_DIR#/otrasli/#ELEMENT_CODE#/']);
    }

    public function down()
    {
        //your code ...
    }

    private function getIblockIdByCode($code) {
        $db_res = \CIblock::GetList([], ['CODE' => $code], false)->Fetch();
        return $db_res['ID'];
    }
}
