<?php

namespace Sprint\Migration;
\CModule::IncludeModule('iblock');

class Version20240521093413 extends Version
{
    protected $description = "Устанавливает значения свойств для элементов инфоблока отрасли";

    protected $moduleVersion = "4.6.1";
    private $iblockCode = 'otrasli';
    private $elements = [
        'torgovyy-sektor' => [6, 515, 514, 513, 512, 511, 510],
        'vystavki-i-meropriyatiya' => [6, 515, 514, 513, 512, 511, 510]
    ];
    private $propCode = 'PRODUCTS';

    public function up()
    {
        foreach($this->elements as $code => $arrProductsId) {
            $id = $this->getElementIdByCode($code);
            \CIBlockElement::SetPropertyValuesEx($id, false, array($this->propCode => $arrProductsId));
        }
    }

    public function down()
    {
        foreach($this->elements as $code => $arrProductsId) {
            $id = $this->getElementIdByCode($code);
            \CIBlockElement::SetPropertyValuesEx($id, false, array($this->propCode => false));
        }
    }

    private function getElementIdByCode($code) {
        $db_res = \CIBlockElement::GetList([], ['IBLOCK_CODE' => $this->iblockCode, '=CODE' => $code], false, false, ['ID'])->Fetch();
        return $db_res['ID'];
    }
}
