$(document).ready(function () {
    $(".range-item").slider({
        animate: "slow",
        range: "min",
        max: 12,
        value: 6,
        slide: function (event, ui) {
            $(".range-val").text(ui.value);
            $("input[name=kolvo-blokov]").val(ui.value);
        }
    });
    $(".range-val").text($(".range-item").slider("value"));

    /*$('.btn-modal').on('click', function (e) {
        e.preventDefault();
        console.log(1);
        $('.modal-result-calc').fadeIn();
    });*/

    $('.form-calculate').submit(function(){
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
                    $('#result-calc').html(result.mess);

                    $('input[name=calc-material]').val(material);
                    $('input[name=calc-variant-ispoln]').val(variantispoln);
                    $('input[name=calc-kolvo-blokov]').val(result.kolvoblokov);
                    $('input[name=calc-stoimost]').val(result.stoimost);
                    $('input[name=calc-vmestimost2]').val(result.vmestimost2);
                    $('input[name=calc-vmestimost1]').val(result.vmestimost1);
                    $('input[name=calc-srok]').val(result.srok);
                    $('input[name=calc-ploshad]').val(result.ploshad);

                    $('.modal-result-calc').fadeIn();
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
                    $('.p-popup__input').val('');
                    $('.modal-result-calc').fadeOut();
                }else{
                    $('#calc-messageform').html(result.mess);
                }
            }
        });
        return false;
    });


    
});

function openCalcForm(){
    $.fancybox([
        { href : '#calc-fb' }
    ]);
}
