<?

use Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;

class StockForm
{
    const IBLOCK_ID = 61;
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
            'akcid' => 'ID акции обязательно!',
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
            $stockId = $this->request->get('akcid');
            $stockName = $this->request->get('akcname');
            $phone = $this->request->get('phone');

            $el = new CIBlockElement;

            $PROP = ['AKCID' => $stockId];

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
                "AKCNAME" => $stockName
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
