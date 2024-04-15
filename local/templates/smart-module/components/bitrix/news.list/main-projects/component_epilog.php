<script>
    let center = [56.79757896870354, 50.22890452343749]
    let zoom = 5
    <? if ($_SERVER['SERVER_NAME'] === 'smart-module.ru') : ?>
        center = [59.939099, 30.315877]
        zoom = 9
    <? endif; ?>
    <? if ($_SERVER['SERVER_NAME'] === 'moskva.smart-module.ru') : ?>
        center = [55.755819, 37.617644]
        zoom = 9
    <? endif; ?>
    ymaps.ready(() => initYmaps(center, zoom));
</script>