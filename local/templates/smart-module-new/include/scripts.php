<? use Bitrix\Main\Page\Asset;
Asset::getInstance()->addString('<script>window.app = ' . \CUtil::PhpToJSObject(['ASSETS_PATH' => ASSETS_PATH]) .'</script>');
Asset::getInstance()->addJs('//api-maps.yandex.ru/2.1/?lang=ru_RU');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/datamaps.rus.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/jquery.min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/bootstrap.bundle.min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/slick.min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/fancybox.umd.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/jquery.matchHeight-min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/jquery.maskedinput.min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/jquery-ui.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/jquery.ui.touch-punch.min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/rangeslider.min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/spritespin.min.js');
Asset::getInstance()->addJs(ASSETS_PATH . '/js/common.js');