<?

use Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;

class CallbackForm
{
    const IBLOCK_ID = 55;
    const EVENT_CODE = 'SENDING_A_MESSAGE_CALLBACK';

    private $request;

    public function __construct()
    {
        $this->request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        Loader::includeModule('iblock');
    }

    private function getInvalidityMessage(): string
    {
        $errorsMessage = '';
        $errors = [
            'name' => "Имя не заполнено",
            "phone" => "Телефон не заполнен",
            'check' => "Согласие на обработку персональных данных обязательно"
        ];
        foreach ($errors as $key => $value)
            if (!$this->request->get($key)) $errorsMessage .= $value . '<br>';

        return $errorsMessage;
    }

    public function send(): array
    {
        $result = ['success' => false];

        try {
            if ($error = $this->getInvalidityMessage()) {
                throw new \Exception($error);
            }

            $phone = $this->request->get('phone');
            $name = $this->request->get('name');
            $agree = $this->request->get('check');

            $el = new CIBlockElement;

            $PROP = [
                'SM_FORM_NAME' => $name,
                'SM_FORM_PHONE' => $phone,
                'SM_FORM_CHECK' => ['VALUE' => $agree == 'on' ? 327 : ''],
            ];

            $arLoadProductArray = array(
                "IBLOCK_SECTION_ID" => false,
                "IBLOCK_ID"      => self::IBLOCK_ID,
                "PROPERTY_VALUES" => $PROP,
                "NAME"           => "Сообщение от " . date('d-m-Y'),
                "ACTIVE"         => "Y",
                'PREVIEW_TEXT'    => $this->request->get('MESSAGE')
            );

            if (!$el->Add($arLoadProductArray)) {
                throw new \Exception("Код ошибки: ERROR_ADD_ELEMENT"); // для дебага: $el->LAST_ERROR
            }

            $arEventFields = array(
                "SM_FORM_PHONE" => $phone,
                "SM_FORM_NAME" => $name,
                'CHECK' => $agree
            );

            $resultSend = Event::send(array(
                "EVENT_NAME" => self::EVENT_CODE,
                "LID" => SITE_ID,
                "C_FIELDS" => $arEventFields,
            )); 

            if (!$resultSend->isSuccess()) {
                throw new \Exception('Код ошибки: ERROR_SEND_MAIL');
            }

            $result = ['success' => true];
        } catch (\Throwable $th) {
            $result = ['success' => false, 'error' => $th->getMessage()];
        }

        return $result;
    }
}
