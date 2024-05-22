$(document).ready(function () {
    const calcModal = bootstrap.Modal.getOrCreateInstance('#calcModal');
    document.body.append(calcModal._element);

    $('.form-calculate').submit(function(){
        $('.calculate-total').remove();
        var str = $(this).serialize();
        var material = $("input[name='material']:checked").attr('data-name');
        var variantispoln = $("input[name='variant-ispoln']:checked").attr('data-name');
        $.ajax({
            type: 'POST',
            url: '/include/ajax/calc.php',
            data: str,
            dataType: 'json',
            success: function(result){
                if(result.type=='success'){
                    $(result.mess).insertAfter('.form-calculate');
                    
                    $('input[name=calc-material]').val(material);
                    $('input[name=calc-variant-ispoln]').val(variantispoln);
                    $('input[name=calc-kolvo-blokov]').val(result.kolvoblokov);
                    $('input[name=calc-stoimost]').val(result.stoimost);
                    $('input[name=calc-vmestimost2]').val(result.vmestimost2);
                    $('input[name=calc-vmestimost1]').val(result.vmestimost1);
                    $('input[name=calc-srok]').val(result.srok);
                    $('input[name=calc-ploshad]').val(result.ploshad);

                    $('.calculate-total').fadeIn();
                }else{
                    alert('Ошибка.');
                }
            }
        });
        return false;
    });

    $('#calcFB').submit(function(){
        var str = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/include/ajax/calc2.php',
            data: str,
            dataType: 'json',
            success: function(result){
                if(result.type=='success'){
                    $('#calc-messageform').html(result.mess);
                    $('#calc-messageform').addClass('text-success');
                    $('#calcFB input[type="text"]').val('');
                    $('.calculate-total').fadeOut();
                }else{
                    $('#calc-messageform').html(result.mess);
                    $('#calc-messageform').addClass('text-danger');
                }
            }
        });
        return false;
    });
});
