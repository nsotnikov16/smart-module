<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

class CustomBasketJS extends CBitrixComponent
{
    public function executeComponent()
    {
        if ($GLOBALS['CustomBasketJSInit']) return;
        $this->includeComponentTemplate();
        $GLOBALS['CustomBasketJSInit'] = true;
    }
}
