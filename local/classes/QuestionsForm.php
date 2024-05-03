<?

use Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;

class QuestionsForm
{
    const IBLOCK_ID = 59;
    const TEMPLATE_MESSAGE_ID = 41;
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
            'check' => "Согалсие на обработку персональных данных обязательно"
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

            $el = new CIBlockElement;

            $PROP = ['NAME' => $name];

            $arLoadProductArray = array(
                "IBLOCK_ID"      => self::IBLOCK_ID,
                "PROPERTY_VALUES" => $PROP,
                "NAME"           => $phone,
                "ACTIVE"         => "Y",
            );

            if (!$el->Add($arLoadProductArray)) {
                throw new \Exception("Код ошибки: ERROR_ADD_ELEMENT"); // для дебага: $el->LAST_ERROR
            }

            $arEventFields = array(
                "SM_FORM_PHONE" => $phone,
                "SM_FORM_NAME" => $name
            );

            $resultSend = Event::send(array(
                "EVENT_NAME" => self::EVENT_CODE,
                "LID" => SITE_ID,
                "C_FIELDS" => $arEventFields,
                "MESSAGE_ID" => self::TEMPLATE_MESSAGE_ID
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
