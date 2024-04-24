<?php

namespace Sprint\Migration;
use CModule;
CModule::IncludeModule('iblock');

class Version20240424182906 extends Version
{
    protected $description = "Добавляет разделы в инфоблок Сертификаты";

    protected $moduleVersion = "4.6.1";
    protected $iblock_id = '56';
    protected $sections = [
        'sertifikaty_sootvetstviya' => [
            'NAME' => 'Сертификаты соответствия',
        ],
        'sertifikaty_na_produkciyu' => [
            'NAME' => 'Сертификаты на продукцию',
        ],
        'sertifikaty_povysheniya_kvalifikacii_sotrudnikov' => [
            'NAME' => 'Сертификаты повышения квалификации сотрудников',
        ],
    ];

    public function up()
    {
        $helper = $this->getHelperManager();

        foreach ($this->sections as $code => $fields) {
            $fields['CODE'] = $code;
            $helper->Iblock()->addSectionIfNotExists($this->iblock_id, $fields);
        }
    }

    public function down()
    {
        $helper = $this->getHelperManager();
        foreach ($this->sections as $code => $fields) {
            $helper->Iblock()->deleteSectionIfExists($this->iblock_id, $code);
        }
    }

}
