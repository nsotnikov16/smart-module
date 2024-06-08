<?php

namespace Sprint\Migration;
\CModule::IncludeModule('iblock');

class Version20240608153816 extends Version
{
    protected $description = "Добавление свойства \"Картинки для контента\" в инфоблок \"Блог\"";

    protected $moduleVersion = "4.6.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $iblock = new \CIBlock;
        $iblock->Update(6, ['CODE' => 'blog']);
        $iblockId = $helper->Iblock()->getIblockIdIfExists('blog', 'content');
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME' => 'Картинки для контента',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'CONTENT_IMAGES',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'F',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'Y',
            'XML_ID' => NULL,
            'FILE_TYPE' => 'jpg, gif, bmp, png, jpeg, webp',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '1',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => 'a:0:{}',
            'HINT' => '',
        ));
    }

    public function down()
    {
        //your code ...
    }
}
