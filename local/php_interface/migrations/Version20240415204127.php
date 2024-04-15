<?php

namespace Sprint\Migration;


class Version20240415204127 extends Version
{
    protected $description = "Изменяет шаблон сайта";

    protected $moduleVersion = "4.6.1";

    public function up()
    {
        $obSite = new \CSite();
        $t = $obSite->Update('s1', array(
            'ACTIVE' => "Y",
            'TEMPLATE'=>array(
                array(
                    'CONDITION' => "",
                    'SORT' => 1,
                    'TEMPLATE' => "smart-module-new"
                ),
            )
        ));
    }

    public function down()
    {
        //your code ...
    }
}
