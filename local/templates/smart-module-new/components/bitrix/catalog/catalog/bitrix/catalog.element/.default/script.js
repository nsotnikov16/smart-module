$(document).ready(function () {
    $('.product-details .nav-link').first().click();
    $('.js-tab-trigger.tab-product-category-item').first().click();
});

// product slider
$(document).ready(function () {
    var ranger = $('.product-detail-page .product-image input[type="range"]');
    var ranger2 = $('.big_range');
    var loop_change = false; //Стоп зацикливанию
    /**
    * 3D модель товара
    */
    $('a.js-fullscreen').click(function (e) {
        e.preventDefault();
        $('.spritespinBig').spritespin('api').requestFullscreen();
    });

    //next slide
    $('#nextSlide').click(function (e) {
        e.preventDefault();
        $('.spritespinBig').spritespin('api').nextFrame();
        setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 50);
        setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 100);
        setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 150);
        setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 200);
        setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 250);
        setTimeout(function () { $('.spritespinBig').spritespin('api').nextFrame(); }, 300);
    });

    //prew slide
    $('#prewSlide').click(function (e) {
        e.preventDefault();
        $('.spritespinBig').spritespin('api').prevFrame();
        setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 50);
        setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 100);
        setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 150);
        setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 200);
        setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 250);
        setTimeout(function () { $('.spritespinBig').spritespin('api').prevFrame(); }, 300);
    });

    if (window.spritespinObj?.min) {
        $('.spritespin').spritespin({
            source: window.spritespinObj.min,
            width: 550,
            height: 400,
            frames: 30,
            framesX: 5,
            sense: -1,
            frameTime: 160,
            animate: false,
            reverse: false,
            loop: false,
            responsive: true,
            onLoad: function () {
                /**
                 * Слайдер положения 3Д картинки на странице товара
                 * Doc: http://rangeslider.js.org/
                 */
                ranger.rangeslider({
                    polyfill: false,
                    onSlide: function (position, value) {
                        var api = $('.spritespin').spritespin('api');
                        api.stopAnimation();
                        api.updateFrame(value);
                        loop_change = false;
                    }
                });
                $('#container_for_button').removeClass('d-none')
            },
            onFrame: function (e, data) {
                ranger.val(data.frame);
                if (!loop_change) {
                    loop_change = true;
                    ranger.change();
                }
            }
        });
    }

    if (window.spritespinObj?.big) {
        $('.spritespinBig').spritespin({
            source: window.spritespinObj.big,
            width: 600,
            height: 400,
            frames: 30,
            framesX: 5,
            sense: -1,
            frameTime: 160,
            animate: false,
            reverse: false,
            loop: false,
            responsive: true,
            onLoad: function () {

                /**
                 * Слайдер положения 3Д картинки на странице товара
                 * Doc: http://rangeslider.js.org/
                 */

                $('.spritespinBig').css('display', 'block');
                $('.spritespinBig').append('<a href="#" class="h-callback neiros__open-lead-catch h-callback_new h-callback_in_sprite btn btn-green" data-bs-toggle="modal" data-bs-target="#callbackModal">Получить консультацию</a>');
                $('.spritespinBig').append('<ion-icon name="close" class="exit_fs"></ion-icon>');
                /*$('.spritespinBig').append('<div id="container_for_button"><div id="prewSlide"></div><input class="big_range" type="range" min="0" max="29" step="1" value="0" data-orientation="horizontal" /><div id="nextSlide"></div></div>');*/
                $('.h-callback_new').click(function (e) {
                    e.preventDefault();
                    document.exitFullscreen();
                });
                $('.exit_fs').click(function () {
                    document.exitFullscreen();
                });

                ranger2.rangeslider({
                    polyfill: false,
                    onSlide: function (position, value) {
                        var api = $('.spritespinBig').spritespin('api');
                        api.stopAnimation();
                        api.updateFrame(value);
                        loop_change = false;
                    }
                });

                $('#container_for_button').removeClass('d-none')
            },
            onFrame: function (e, data) {
                ranger2.val(data.frame);
                if (!loop_change) {
                    loop_change = true;
                    ranger2.change();
                }
            }
        });
    }
});