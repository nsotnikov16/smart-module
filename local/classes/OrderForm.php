<?

use Bitrix\Main\Loader;
use CFormResult;

class OrderForm
{
    const FORM_ID = 2;
    private $request;

    public function __construct()
    {
        $this->request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();
        Loader::includeModule('form');
    }

    public function send(): array
    {
        global $USER;
        $result = ['success' => false];
        // см https://dev.1c-bitrix.ru/api_help/form/htmlnames.php;
        // см /bitrix/admin/form_field_list.php?lang=ru&WEB_FORM_ID=2

        $arValues = [
            'form_text_2' => $this->request->get('phone'),
            'form_hidden_3' => $this->request->get('url'),
            'form_hidden_4' => $this->request->get('base_price'),
            'form_hidden_5' => $this->request->get('add_price'),
            'form_hidden_6' => $this->request->get('price'),
            'form_hidden_7' => $this->request->get('add_services'),
        ];

        try {
            $res = CFormResult::Add(self::FORM_ID, $arValues, 'Y', $USER->GetID());

            if ($res > 0)
                $result = ['success' => true];
        } catch (\Throwable $th) {
            $result = ['success' => false];
        }

        return $result;
    }
}
