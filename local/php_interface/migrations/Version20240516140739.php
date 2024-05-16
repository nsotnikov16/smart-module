<?php

namespace Sprint\Migration;


class Version20240516140739 extends Version
{
    protected $description = "Изменяет детальные изображения верхних разделов каталога (для страницы /catalog/)";

    protected $moduleVersion = "4.6.1";
    private $iblockId = 1;
    private $sections = [
        'metallicheskie-bytovki' => ASSETS_PATH . '/img/category-img1.jpg',
        'kontejneryi' => ASSETS_PATH . '/img/category-img2.jpg',
        'angary' => ASSETS_PATH . '/img/category-img3.jpg',
        'modulnye-zdaniya' => ASSETS_PATH . '/img/category-img4.jpg',
        'rekonstruktsiya-konteynerov' => ASSETS_PATH . '/img/category-img5.jpg',
        'modulnye-stantsii' => ASSETS_PATH . '/img/category-img6.jpg',
        'torgovye-pavilony' => ASSETS_PATH . '/img/category-img7.jpg',
        'bystrovozvodimye-zdaniya' =>  ASSETS_PATH . '/img/category-img8.jpg'
    ];

    public function up()
    {
        \CModule::IncludeModule('iblock');
        $obj = new \CIBlockSection;
        $filter = ['IBLOCK_ID' => $this->iblockId, 'CODE' => array_keys($this->sections)];
        $db_res = \CIBlockSection::GetList([], $filter, false, ['ID', 'CODE']);
        while ($arr = $db_res->Fetch()) {
            $obj->Update($arr['ID'], ['DETAIL_PICTURE' => \CFile::MakeFileArray($this->sections[$arr['CODE']])]);
        }
    }

    public function down()
    {
    }
}
