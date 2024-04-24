<?php

namespace Sprint\Migration;
use CModule;
use CIBlockProperty;

CModule::IncludeModule('iblock');

class Version20240424171321 extends Version
{
    protected $description = "Добавляет свойства в инфоблок Отзывы";

    protected $moduleVersion = "4.6.1";
    private $iblock_id = '67';
    private $props = ['AUTHOR_NAME' => 'Имя автора', 'AUTHOR_POST' => 'Должность автора'];

    public function up()
    {
        foreach ($this->props as $code => $name) {
            $res = CIBlockProperty::GetByID($code, $this->iblock_id)->GetNext();
            if (!$res) {
                $ibp = new CIBlockProperty;
                $ibp->Add([
                    "NAME" => $name,
                    "ACTIVE" => "Y",
                    "CODE" => $code,
                    "PROPERTY_TYPE" => "S",
                    'MULTIPLE' => 'N',
                    "IBLOCK_ID" => $this->iblock_id
                ]);
            }

        }
    }

    public function down()
    {
        foreach ($this->props as $code => $name) {
            $res = CIBlockProperty::GetByID($code, $this->iblock_id)->GetNext();
            if ($res) {
                $ibp = new CIBlockProperty;
                $ibp->delete($res['ID']);
            }
        }
    }
}
