<?php

namespace Sprint\Migration;


class Version20240508112204 extends Version
{
  protected $description = "Добавляет пользовательское свойство для раздела в инфоблоке Выполненные проекты";

  protected $moduleVersion = "4.6.1";

  /**
   * @throws Exceptions\HelperException
   * @return bool|void
   */
  public function up()
  {
    $helper = $this->getHelperManager();
    $helper->UserTypeEntity()->saveUserTypeEntity(array(
      'ENTITY_ID' => 'IBLOCK_content:projects_SECTION',
      'FIELD_NAME' => 'UF_PREVIEW_IMG',
      'USER_TYPE_ID' => 'file',
      'XML_ID' => '',
      'SORT' => '100',
      'MULTIPLE' => 'N',
      'MANDATORY' => 'Y',
      'SHOW_FILTER' => 'N',
      'SHOW_IN_LIST' => 'Y',
      'EDIT_IN_LIST' => 'Y',
      'IS_SEARCHABLE' => 'N',
      'SETTINGS' =>
      array(
        'SIZE' => 20,
        'LIST_WIDTH' => 0,
        'LIST_HEIGHT' => 0,
        'MAX_SHOW_SIZE' => 0,
        'MAX_ALLOWED_SIZE' => 0,
        'EXTENSIONS' =>
        array(),
        'TARGET_BLANK' => 'Y',
      ),
      'EDIT_FORM_LABEL' =>
      array(
        'en' => '',
        'ru' => 'Превью',
      ),
      'LIST_COLUMN_LABEL' =>
      array(
        'en' => '',
        'ru' => 'Превью',
      ),
      'LIST_FILTER_LABEL' =>
      array(
        'en' => '',
        'ru' => '',
      ),
      'ERROR_MESSAGE' =>
      array(
        'en' => '',
        'ru' => '',
      ),
      'HELP_MESSAGE' =>
      array(
        'en' => '',
        'ru' => 'Свойство сделано для вставки svg иконок, так как стандартные свойства картинки Анонса и Детальной не поддерживают такой формат',
      ),
    ));
  }

  public function down()
  {
    //your code ...
  }
}
