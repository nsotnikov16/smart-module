<? CModule::IncludeModule('webfly.seocities');?>
<script>
    let center = [56.79757896870354, 50.22890452343749]
    let zoom = 5
    <? if (\CWebflyCities::GetSubDomain() === 'default') : ?>
        center = [59.939099, 30.315877]
        zoom = 9
    <? endif; ?>
    <? if (\CWebflyCities::GetSubDomain() === 'moskva') : ?>
        center = [55.755819, 37.617644]
        zoom = 9
    <? endif; ?>
    ymaps.ready(() => initYmaps(center, zoom));
</script>