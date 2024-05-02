<?

use Bitrix\Main\Loader;
use CFormResult;

class ContactsForm
{
    const FORM_ID = 3;
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
        // см /bitrix/admin/form_field_list.php?lang=ru&WEB_FORM_ID=3

        $arValues = [
            'form_text_8' => $this->request->get('name'),
            'form_text_9' => $this->request->get('phone'),
            'form_text_10' => $this->request->get('email'),
            'form_textarea_11' => $this->request->get('message'),
            'form_checkbox_AGREE' => $this->request->get('agree') ? [12] : ''
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
