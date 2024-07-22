<? use Bitrix\Main\Page\Asset;
$asset = Asset::getInstance();
$asset->addString('<script>window.app = ' . \CUtil::PhpToJSObject(['ASSETS_PATH' => ASSETS_PATH, 'AJAX_URL' => AJAX_URL]) .'</script>');
$asset->addJs('//api-maps.yandex.ru/2.1/?lang=ru_RU');
$asset->addJs(ASSETS_PATH . '/js/d3.min.js');
$asset->addJs(ASSETS_PATH . '/js/topojson.min.js');
$asset->addJs(ASSETS_PATH . '/js/datamaps.rus.js');
$asset->addJs(ASSETS_PATH . '/js/jquery.min.js');
$asset->addJs(ASSETS_PATH . '/js/bootstrap.bundle.min.js');
$asset->addJs(ASSETS_PATH . '/js/slick.min.js');
$asset->addJs(ASSETS_PATH . '/js/fancybox.umd.js');
$asset->addJs(ASSETS_PATH . '/js/jquery.matchHeight-min.js');
$asset->addJs(ASSETS_PATH . '/js/jquery.maskedinput.min.js');
$asset->addJs(ASSETS_PATH . '/js/jquery-ui.js');
$asset->addJs(ASSETS_PATH . '/js/jquery.ui.touch-punch.min.js');
$asset->addJs(ASSETS_PATH . '/js/rangeslider.min.js');
$asset->addJs(ASSETS_PATH . '/js/spritespin.min.js');
$asset->addJs(ASSETS_PATH . '/js/common.js');
?>