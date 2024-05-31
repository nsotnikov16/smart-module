<?php

namespace Sprint\Migration;


class Version20240531134030 extends Version
{
  protected $description = "Создание почтового шаблона для калькулятора аренды";

  protected $moduleVersion = "4.6.1";

  /**
   * @throws Exceptions\HelperException
   * @return bool|void
   */
  public function up()
  {
    $helper = $this->getHelperManager();

    $helper->Event()->saveEventMessage('SENDING_A_MESSAGE_CALLBACK', array(
      'LID' =>
      array(
        0 => 's1',
      ),
      'ACTIVE' => 'Y',
      'EMAIL_FROM' => '#SITE_NAME#',
      'EMAIL_TO' => '#DEFAULT_EMAIL_FROM#',
      'SUBJECT' => 'Заявка с калькулятора аренды',
      'MESSAGE' => 'Имя пользователя - #SM_FORM_NAME#
Телефон пользователя - #SM_FORM_PHONE#
Калькулятор:
#CALC_RESULT#',
      'BODY_TYPE' => 'text',
      'BCC' => '',
      'REPLY_TO' => '',
      'CC' => '',
      'IN_REPLY_TO' => '',
      'PRIORITY' => '',
      'FIELD1_NAME' => NULL,
      'FIELD1_VALUE' => NULL,
      'FIELD2_NAME' => NULL,
      'FIELD2_VALUE' => NULL,
      'SITE_TEMPLATE_ID' => '',
      'ADDITIONAL_FIELD' =>
      array(),
      'LANGUAGE_ID' => 'ru',
      'EVENT_TYPE' => '[ SENDING_A_MESSAGE_CALLBACK ] Отправка сообщения через форму обратной связи',
    ));
  }

  public function down()
  {
    //your code ...
  }
}
