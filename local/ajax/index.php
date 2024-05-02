<?
use Bitrix\Main\Loader;
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

$dir = '/local/classes/';
$result = ['success' => false];
try {
    $request = \Bitrix\Main\Application::getInstance()->getContext()->getRequest();

    $action = $request->get('action');
    if (!$action) {
        throw new \Exception('"action" is not defined');
    }

    $actionExplode = explode('::', $action);
    $className = $actionExplode[0];
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $dir . $className . '.php')) {
        throw new \Exception('The class file does not exist');
    }
    Loader::registerAutoLoadClasses(null, [$className => $dir . $className . '.php']);
    $obj = new $className;
    $method = $actionExplode[1];

    if (!method_exists($obj, $method)) {
        throw new \Exception("The method does not exist");
    }

    $result = $obj->$method();
} catch (\Throwable $th) {
    $result = ['success' => false, 'error' => $th->getMessage()];
}

header('Content-Type: application/json');
echo json_encode($result);
