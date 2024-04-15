$(document).ready(function () {
  // новый блог ->
  // 1. содержание
  $('.blog__content .head').on('click', function () {
    $(this).closest('.blog__content').toggleClass('open');
    $(this)
      .closest('.blog__content')
      .find('.blog__content_list')
      .slideToggle(300);
  });

  $('.blog__content_toggle').on('click', function (e) {
    e.preventDefault();

    let parent = $(this).closest('.blog__content');

    if (parent.hasClass('full')) {
      $(this).text('Показать полностью');
      parent.removeClass('full');
      parent.find('.head').trigger('click');
    } else {
      $(this).text('Скрыть');
      parent.addClass('full');
    }
  });

  $('.blog__content li a').hover(handlerIn, handlerOut);

  function handlerIn(e) {
    e.stopPropagation();
    $(this).closest('li').addClass('hover');
  }

  function handlerOut(e) {
    e.stopPropagation();
    $(this).closest('li').removeClass('hover');
  }

  // плавающий сайдбар ->

  if ($('.sidebar').length !== 0) {
    $(window).on('scroll', function () {
      let offsetTop =
        $('.sidebar').offset().top + $('.popular-articles').height();

      let offsetBottom =
        offsetTop +
        $('.sidebar').height() -
        $('.sidebar__float').height() -
        $('.popular-articles').height() -
        60;

      let curOffset = $(window).scrollTop() + 48;

      if (curOffset >= offsetBottom) {
        $('.sidebar__float').removeClass('fixed');
        $('.sidebar').addClass('stop_floating');
      } else if (curOffset >= offsetTop) {
        $('.sidebar').removeClass('stop_floating');
        $('.sidebar__float').addClass('fixed');
      } else {
        $('.sidebar').removeClass('stop_floating');
        $('.sidebar__float').removeClass('fixed');
      }
    });
  }

  // попап картинки блога

  $('.typography .text figure a').on('click', function (e) {
    e.preventDefault();
  });

  $('.typography .text figure a').fancybox();

  // <- конец нового блога

  $(document).mouseup(function (e) {
    // событие клика по веб-документу
    var div = $('#result-calc'); // тут указываем ID элемента
    if (
      !div.is(e.target) && // если клик был не по нашему блоку
      div.has(e.target).length === 0
    ) {
      // и не по его дочерним элементам
      div.hide(); // скрываем его
    }
  });
  var w = $(window).width();
  var h = $(window).height();

  if ($('section').hasClass('footer-gray-box')) {
    Createparallaxbg('.footer-gray-box');
  }

  $(window).bind('scroll', function () {
    if ($('section').hasClass('footer-gray-box')) {
      parallaxbg('.footer-gray-box', '.footer-gray-box');
    }
  });

  // Parallax Background Image Create
  function Createparallaxbg(parallaxImage) {
    var ParSecImg = $(parallaxImage).attr('data-image');
    $(parallaxImage).attr('style', 'background-image:url(' + ParSecImg + ');');
  }

  // Parallax Background Image ATTR ADD
  function parallaxbg(position, parallaxImage) {
    var currentTop = $(window).scrollTop();
    var ParSecPT = $(position).position().top;
    if (currentTop > ParSecPT - h) {
      $(parallaxImage).css({
        'background-position':
          'center ' + ((currentTop - ParSecPT) / 2 - h / 5) + 'px',
      });
    }
  }
});

$(document).ready(function () {
  $('.slider-dop').on('beforeChange', function () {
    setTimeout(function () {
      $(
        '.slider-dop-item.slick-slide.slick-current.slick-active .services-link'
      ).trigger('click');
    }, 500);
    console.log('owl ok');
  });
});

$(document).ready(function () {
  let navPos;
  let $menu_main = $('.header-wrapper');

  function refreshVar() {
    navPos = $('.products-list-wrapper, .breadcrumb').offset().top;
  }
  refreshVar();
  $(window).resize(refreshVar);

  $(window).scroll(function () {
    if ($(this).scrollTop() > navPos && $menu_main.hasClass('position')) {
      $menu_main.removeClass('position').addClass('active');
    } else if ($(this).scrollTop() <= navPos && $menu_main.hasClass('active')) {
      $menu_main.removeClass('active').addClass('position');
    }
  });
});

$(document).ready(function () {
  $('.mobile-nav-button, .mobile_menu_rotate').click(function () {
    $(this).toggleClass('active');
  });

  $(
    '.certificate-image .slick-arrow.slick-next, .certificate-image .slick-arrow.slick-prev'
  ).mouseover(function () {
    $(this).addClass('active');
  });
  $(
    '.certificate-image .slick-arrow.slick-next, .certificate-image .slick-arrow.slick-prev'
  ).mouseleave(function () {
    $(this).removeClass('active');
  });
});
$(document).ready(function () {
  let navPos;
  let $menu = $('#f_menu');
  let $drop = $('.header-nav-dropdown-inside.num1 .header-nav-dropdown');
  let $burger = $('.f_header-burger');
  let $close = $('.f_header_close');

  function refreshVar() {
    navPos = $('.products-list-wrapper, .breadcrumb').offset().top;
  }
  refreshVar();
  $(window).resize(refreshVar);

  function changeIcon() {
    /*$burger.css('display', 'block');
        $close.css('display', 'none');*/
    $('.menu_rotate').removeClass('active');
  }

  $('.menu_rotate').click(function () {
    /*	$burger.css('display', 'none');
            $close.css('display', 'block');*/
    if ($(this).is('.active')) {
      changeIcon();
      $drop.removeClass('active');
      $('.header-nav > ul > li > .header-nav-dropdown').removeClass('active');
    } else {
      $('.menu_rotate').addClass('active');
      $drop.addClass('active');
      $('.header-nav > ul > li > .header-nav-dropdown').addClass('active');
    }
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() > navPos && $menu.hasClass('default')) {
      $menu.removeClass('default').addClass('fixed');
    } else if ($(this).scrollTop() <= navPos && $menu.hasClass('fixed')) {
      $menu.removeClass('fixed').addClass('default');
      $drop.removeClass('active');
      changeIcon();
    }
  });
});
$(document).ready(function () {
  $('.product-list-box').mouseover(function () {
    let active = $(this);
    let box = active.find('.product-list-box-image');
    box.addClass('active');
  });
  $('.product-list-box').mouseleave(function () {
    let active = $(this);
    let box = active.find('.product-list-box-image');
    box.removeClass('active');
  });

  $('#form-questions').submit(function () {
    var str = $(this).serialize();

    name = $(this).closest('form').find('input[name="name"]').val();
    phone = $(this).closest('form').find('input[name="phone"]').val();
    if (name === '' || phone === '') {
    } else {
      $.ajax({
        type: 'POST',
        url: '/include/ajax/questions.php',
        data: str,
        success: function (html) {
          $('#content_questions').html(html);
          NeirosEventSend('send-event', {
            type: 'form',
            data: { name: name, phone: phone },
          });
          setTimeout(function () {
            window.location.href = 'https://smart-module.ru/thank/';
          }, 1000);
        },
      });
    }
    return false;
  });

  $('#form-questions2').submit(function () {
    var str = $(this).serialize();

    name = $(this).closest('form').find('input[name="name"]').val();
    phone = $(this).closest('form').find('input[name="phone"]').val();

    if (name === '' || phone === '') {
    } else {
      $.ajax({
        type: 'POST',
        url: '/include/ajax/questions.php',
        data: str,
        success: function (html) {
          $('#content_questions').html(html);
          NeirosEventSend('send-event', {
            type: 'form',
            data: { name: name, phone: phone },
          });
          setTimeout(function () {
            window.location.href = 'https://smart-module.ru/thank/';
          }, 1000);
        },
      });
    }
    return false;
  });

  $('#form-timer').submit(function () {
    var str = $(this).serialize();
    phone = $(this).closest('form').find('input[name="phone"]').val();
    if (phone != '') {
      name = '';

      $.ajax({
        type: 'POST',
        url: '/include/ajax/timer.php',
        data: str,
        success: function (html) {
          $('.content_timer').html(html);
          NeirosEventSend('send-event', {
            type: 'form',
            data: { name: name, phone: phone },
          });
          setTimeout(function () {
            window.location.href = 'https://smart-module.ru/thank/';
          }, 1000);
        },
      });
    }
    return false;
  });
  $('.h-callback, .buy_button').fancybox();

  function focus_dunc() {
    $('#callBack input[name=SM_FORM_PHONE]', document).focus();
  }
  $('.h-callback_new').on('click', function () {
    setTimeout(focus_dunc, 500);
  });

  $('.new-js-popup-min-wp').lightGallery();
  $('.new-js-popup-big-wp').lightGallery();
  $('.new-js-popup-big').lightGallery();
  $('.one-wp-cart').lightGallery();
  $('.many-wp-cart').lightGallery();

  $('.js-fancy').fancybox({
    padding: 0,
    beforeShow: function () {
      //Передаем данные заказа в форму
      if ($('#total-product-price-scroll').length > 0) {
        //Страница товара
        var services = $('.mod-basket__list').find('.services-box');
        var input = '';
        var addPrice = 0;
        if (services.length > 0) {
          for (var i = 0; i < services.length; i++) {
            var service = $(services[i]);
            var title = $.trim(service.find('.services-description').text());
            var price = $.trim(
              service.find('.count-price').data('default-price')
            );
            var count = $.trim(service.find('input').val());

            input += title + ' - ' + count + ' шт. (' + price + ' р. за шт.); ';
            addPrice += price * count;
          }
        }

        $('form[name=ORDER] input[name=form_hidden_3]').val(
          window.location.origin + window.location.pathname
        );
        $('form[name=ORDER] input[name=form_hidden_4]').val(
          $('#total-product-price').data('base-price')
        );
        $('form[name=ORDER] input[name=form_hidden_5]').val(addPrice);
        $('form[name=ORDER] input[name=form_hidden_6]').val(
          $('.mod-basket__sum span').text()
        );
        $('form[name=ORDER] input[name=form_hidden_7]').val(input);
      } else {
        //Страница списка товаров
        var item = $(this.element);
        $('form[name=ORDER] input[name=form_hidden_3]').val(
          window.location.origin + item.siblings('a').attr('href')
        );
        $('form[name=ORDER] input[name=form_hidden_4]').val(
          item.data('base-price')
        );
        $('form[name=ORDER] input[name=form_hidden_5]').val('-');
        $('form[name=ORDER] input[name=form_hidden_6]').val(
          item.data('base-price')
        );
        $('form[name=ORDER] input[name=form_hidden_7]').val('-');
      }
    },
  });

  /*		$('.kombox-column', this).click(function(){

            $(this).find('.kombox-combo').toggle();

        });*/

  /*	$('.select-title', this).click(function(){

        $(this).closest('.kombox-column').find('.kombox-combo').toggle();

    });*/

  $('.with_list').click(function () {
    $(this).find('.f-menu__list').toggleClass('active');
    $(this).toggleClass('active');
  });
  $('.catalog_mobile').click(function () {
    $('.mobile-menu_list').toggleClass('active');
    $(this).toggleClass('active');
  });
  $('.filter_mobile').click(function () {
    $('.kombox-filter').toggleClass('active');
    $(this).toggleClass('active');
  });
  $('.header__h-city.mobile').click(function () {
    $('.overlay').toggle();
  });

  /*скрипт скролла*/

  (function () {
    var a = document.querySelector('.promo_block'),
      b = null,
      P = 120; // если ноль заменить на число, то блок будет прилипать до того, как верхний край окна браузера дойдёт до верхнего края элемента. Может быть отрицательным числом

    if (a !== null) {
      window.addEventListener('scroll', Ascroll, false);
      document.body.addEventListener('scroll', Ascroll, false);
    }
    function Ascroll() {
      if (b == null) {
        var Sa = getComputedStyle(a, ''),
          s = '';
        for (var i = 0; i < Sa.length; i++) {
          if (
            Sa[i].indexOf('overflow') == 0 ||
            Sa[i].indexOf('padding') == 0 ||
            Sa[i].indexOf('border') == 0 ||
            Sa[i].indexOf('outline') == 0 ||
            Sa[i].indexOf('box-shadow') == 0 ||
            Sa[i].indexOf('background') == 0
          ) {
            s += Sa[i] + ': ' + Sa.getPropertyValue(Sa[i]) + '; ';
          }
        }
        b = document.createElement('div');
        b.style.cssText =
          s + ' box-sizing: border-box; width: ' + a.offsetWidth + 'px;';
        a.insertBefore(b, a.firstChild);
        var l = a.childNodes.length;
        for (var i = 1; i < l; i++) {
          b.appendChild(a.childNodes[1]);
        }
        a.style.height = b.getBoundingClientRect().height + 'px';
        a.style.padding = '0';
        a.style.border = '0';
      }
      var Ra = a.getBoundingClientRect(),
        R = Math.round(
          Ra.top +
          b.getBoundingClientRect().height -
          document.querySelector('.clear').getBoundingClientRect().top +
          0
        ); // селектор блока, при достижении верхнего края которого нужно открепить прилипающий элемент;  Math.round() только для IE; если ноль заменить на число, то блок будет прилипать до того, как нижний край элемента дойдёт до футера
      if (Ra.top - P <= 0) {
        if (Ra.top - P <= R) {
          b.className = 'stop';
          b.style.top = -R + 'px';
        } else {
          b.className = 'sticky';
          b.style.top = 120 + 'px';
        }
      } else {
        b.className = '';
        b.style.top = '';
      }
      window.addEventListener(
        'resize',
        function () {
          a.children[0].style.width = getComputedStyle(a, '').width;
        },
        false
      );
    }
  })();

  $('#akc-phone').mask('+7 (999) 999-99-99');
  $("input[name='phone']").mask('+7 (999) 999-99-99');

  $("input[name='phone']").on('click', function () {
    $(this).focus();
  });
  /**
   * Маска телефона
   */
  $('input[type=text].phone').mask('+7 (999) 999-99-99', {
    placeholder: '_',
  });

  $('.info_block').fadeOut();
  $('.info').click(function () {
    $(this).siblings('.info_block').fadeToggle();
    $(this).toggleClass('active');
  });
  /*
    function block_show(e){
        e.preventDefault();
    $('.info').click(function(){
        $(this).siblings('.info_block').fadeToggle();
        $(this).toggleClass('active');
    });
    }
    */
  $('#clear_filter').click(function () {
    console.log('clicked');
    $('.typography input[type=checkbox]:checked + label').addClass(
      'active_pseudo'
    );
    console.log('after');
  });

  $(window).on('load resize', function () {
    if ($(window).width() < 768) {
      $('.serv-link-cat').click(function () {
        console.log('test1');
        // $('.header-nav-dropdown').removeClass('opened');
        // $('.header-nav-link').removeClass('active-link');
        $(this).siblings('.header-nav-dropdown').toggleClass('opened');
        $(this).toggleClass('active-link');
      });

      $('.for-us-cat').click(function () {
        console.log('test1');
        // $('.header-nav-dropdown').removeClass('opened');
        // $('.header-nav-link').removeClass('active-link');
        $(this).siblings('.header-nav-dropdown').toggleClass('opened');
        $(this).toggleClass('active-link');
      });

      $('.cat-link').click(function () {
        console.log('test1');
        // $('.header-nav-dropdown').removeClass('opened');
        // $('.header-nav-link').removeClass('active-link');
        $(this).siblings('.header-nav-dropdown').toggleClass('opened');
        $(this).toggleClass('active-link');
      });

      $(document).mouseup(function (e) {
        // событие клика по веб-документу
        var div = $('.header-nav-link'); // тут указываем ID элемента
        if (
          !div.is(e.target) && // если клик был не по нашему блоку
          div.has(e.target).length === 0
        ) {
          // и не по его дочерним элементам
          div.removeClass('active-link'); // скрываем его
          $('.header-nav-dropdown').removeClass('opened');
        }
      });
    }
  });

  /*if ($(window).width() < 769) {
    $('.metallicheskie-bytovki', this).click(function(){
        $(this).find('a').toggleClass('active-link');
        console.log('tryit');
    $('.metallicheskie-bytovki__sublist', this).toggle();
    });
    }*/

  /*$('.m-menu-plus').click(function() {
       $('.m-menu-minus').css('display','block');
       $(this).css('display','none');
    });
    */

  $('.metallicheskie-bytovki .m-menu-plus').on('click', function () {
    $(this)
      .parents('.header-nav-dropdown.box.opened')
      .find('.metallicheskie-bytovki')
      .removeClass('active-menu-sub-parent');
    $(this).parent().addClass('active-menu-sub-parent');
    $('.metallicheskie-bytovki .m-menu-plus')
      .parent()
      .removeClass('active-menu-sub-parent-none');

    return false;
  });

  $('.metallicheskie-bytovki .m-menu-minus').on('click', function () {
    $(this)
      .parents('.header-nav-dropdown.box.opened')
      .find('.metallicheskie-bytovki')
      .removeClass('active-menu-sub-parent-none');
    $(this).parent().addClass('active-menu-sub-parent-none');

    return false;
  });

  $('.adv-new-b').on('click', function () {
    var data_id = $(this).data('id');

    $(this).toggleClass('transform');
    $('.adv-new-width').removeClass('adv-new-width');
    $('.adv-new-detail[data-id=' + data_id + ']').addClass('adv-new-width');
  });

  $('.adv-close').on('click', function () {
    $(this)
      .parents('.advantages-new')
      .find('.adv-new-detail')
      .removeClass('adv-new-width');
  });

  $('#set_filter').hide();
  $('#clear_filter').hide();

  $('input[type=checkbox]').change(function () {
    if ($('input[type=checkbox]').prop('checked') == false) {
      /*$("#set_filter").show();*/
      $('#clear_filter').show();
    } else {
      /*     $("#set_filter").hide();*/
      $('#clear_filter').hide();
    }

    /*
         $("input[type=checkbox]").change(function() {

           if ($('input[type=checkbox]').prop('checked')==false) {

               $("#set_filter").show();

            }

            else

            {

               $("#set_filter").hide();

            }/*/
  });

  $('.slider_popular').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    infinite: false,
    dots: false,
    responsive: [
      {
        breakpoint: 1100,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: false,
          dots: false,
        },
      },
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ],
  });
  $('.js-tab').click(function (e) {
    e.preventDefault();
    $('.js-tab, .js-tab-box').removeClass('current');
    $('[data-tab="' + $(this).data('tab') + '"]').addClass('current');
  });
  $('.js-tab').click(function (e) {
    e.preventDefault();
    $('.js-tab, .js-tab-box').removeClass('current');
    $('[data-tab="' + $(this).data('tab') + '"]').addClass('current');
  });

  $('.js-product-tab').click(function (e) {
    e.preventDefault();
    $('.js-product-tab, .js-product-tab-box').removeClass('current');
    $('[data-tab="' + $(this).data('tab') + '"]').addClass('current');
    $();
  });

  $('.tabs .js-tab:first, .tabs-box .js-product-tab:first').trigger('click');

  $('.count-plus, .count-minus, .btn-add-buy').on(
    'click',
    priceButtonsListener
  );

  $('.mobile-nav-button, .mobile_menu_rotate').on('click', function () {
    $('.header-nav-list').toggle();
  });

  $('.stick-price-dropdown-button').on('click', function () {
    if ($(this).hasClass('on')) {
      $(this).removeClass('on').addClass('off').next().slideToggle('fast');
    } else {
      $(this).removeClass('off').addClass('on').next().slideToggle('fast');
    }
  });

  function priceButtonsListener(e) {
    e.preventDefault();
    var basePriceEl = $('#total-product-price');
    var BasketTotal = $('#mod_basket').find('.mod-basket__sum span');
    var basePriceScrollEl = $('#total-product-price-scroll');
    if (parseInt(basePriceEl.text()) > 0) {
      var basePrice = +basePriceEl.text();
    } else {
      var basePrice = 0;
    }

    var defaultCountPrice = $(this)
      .closest('.services-box')
      .find('.count-price')
      .data('default-price');
    var countPrice = $(this)
      .closest('.services-box')
      .find('.count-price')
      .text();
    var stick = false;
    var sOp = false;

    if (!$(this).closest('.services-box').attr('id')) {
      stick = true;
      console.log(stick);
    }

    if (
      $(this).closest('.services-box').parent().hasClass('mod-basket__list')
    ) {
      sOp = true;
    }

    if ($(this).hasClass('count-minus')) {
      if ($(this).parent().find('input').val() == '0') {
        return false;
      } else {
        if ($(this).parent().find('input').val() !== '1') {
          $(this)
            .closest('.services-box')
            .find('.count-price')
            .text(parseInt(countPrice) - parseInt(defaultCountPrice));
        }
        $(this)
          .parent()
          .find('input')
          .val(parseInt($(this).parent().find('input').val()) - 1 + '');

        var tPrice = +basePriceEl.text();

        if (tPrice - parseInt(defaultCountPrice) > 0) {
          basePriceEl.text(tPrice - parseInt(defaultCountPrice));
        } else {
          basePriceEl.text('По запросу');
        }
        BasketTotal.text(tPrice - parseInt(defaultCountPrice) + ' руб.');
        console.log(tPrice - parseInt(defaultCountPrice) + '- 1');
        basePriceScrollEl.text(tPrice - parseInt(defaultCountPrice));

        var parent = $(this).closest('.services-box');
        var counter = +$(this).parent().find('input').val();
        var price = +$(this)
          .closest('.services-box')
          .find('.count-price')
          .text();

        if (!stick) {
          if ($(this).parent().find('input').val() !== '0') {
            addOption(parent, counter, price);
          } else {
            removeOption(parent);
          }
        }

        if (!stick && sOp) {
          syncOptions(
            $(this).closest('.services-box').attr('id'),
            counter,
            price
          );
        }
      }
    } else {
      if ($(this).parent().find('input').val() == '0') {
        $(this)
          .parent()
          .find('input')
          .val(parseInt($(this).parent().find('input').val()) + 1 + '');
      } else {
        $(this)
          .parent()
          .find('input')
          .val(parseInt($(this).parent().find('input').val()) + 1 + '');
        $(this)
          .closest('.services-box')
          .find('.count-price')
          .text(parseInt(countPrice) + parseInt(defaultCountPrice));
      }
      basePriceEl.text(basePrice + parseInt(defaultCountPrice));
      BasketTotal.text(basePrice + parseInt(defaultCountPrice) + ' руб.');
      console.log(Number(basePrice) + parseInt(defaultCountPrice) + '- 2');

      basePriceScrollEl.text(basePrice + parseInt(defaultCountPrice));

      var counter = +$(this).parent().find('input').val();
      var price = +$(this).closest('.services-box').find('.count-price').text();

      if (!stick) {
        var parent = $(this).closest('.services-box');
        addOption(parent, counter, price);
      }

      if (!stick && sOp) {
        syncOptions(
          $(this).closest('.services-box').attr('id'),
          counter,
          price
        );
      }
    }
  }
  /*
                                  $('.btn-add-buy').click(function(){

                    $(this).find('input').val(parseInt($('input').val()) + 1 + '');
                });
                */
  function syncOptions(id, counter, price, isStick) {
    var parents = $('[id=' + id + ']');
    var parent = null;

    for (var i = 0; i < parents.length; i++) {
      if (isStick) {
        if ($(parents[i]).parent().hasClass('mod-basket__list')) {
          parent = $(parents[i]);
        }
      } else {
        if ($(parents[i]).parent().hasClass('services-body')) {
          parent = $(parents[i]);
        }
      }
    }

    if (parent.length > 0) {
      parent.find('input').val(counter);
      parent.find('.count-price').text(price);
    }
  }

  function issetOption(id) {
    var stickPrice = $('.mod-basket__list');
    if (stickPrice.find('#' + id).length > 0) {
      return true;
    }

    return false;
  }
  function removeOption(option) {
    var stickPrice = $('.mod-basket__list');
    console.log(option);
    var stickOption = stickPrice.find('#' + option.attr('id'));

    if (stickOption.length > 0) {
      stickOption.remove();
    }
    $('#mod_basket')
      .find('a.mod-basket__icon')
      .html($('.mod-basket__list').find('.mod-basket__item').length);
    if ($('.mod-basket__list').find('.mod-basket__item').length == 0) {
      $('#mod_basket')
        .hide()
        .css('right', '-' + $('#mod_basket').width() + 'px')
        .removeClass('active');
    } else {
      $('#mod_basket').show();
    }
  }
  function remakeItem(op) {
    console.log(op);
    $(op).addClass('mod-basket__item');
    $(op).append(
      '<div class="mod-basket__deletewp"><a href="javascript:void(0)"  class="mod-basket__delete"><ion-icon name="close"></ion-icon></a></div>'
    );
    $(op)
      .find('.mod-basket__deletewp a')
      .on('click', function () {
        var basePriceEl = $('#total-product-price');
        var defaultCountPrice = $(op)
          .find('.count-price')
          .data('default-price');
        var BasketTotal = $('#mod_basket').find('.mod-basket__sum span');
        var tPrice = +basePriceEl.text();

        if (
          tPrice - parseInt(defaultCountPrice) * $(op).find('input').val() >
          0
        ) {
          basePriceEl.text(
            tPrice - parseInt(defaultCountPrice) * $(op).find('input').val()
          );
        } else {
          basePriceEl.text('По запросу');
        }
        BasketTotal.text(
          tPrice -
          parseInt(defaultCountPrice) * $(op).find('input').val() +
          ' руб.'
        );
        console.log(
          tPrice -
          parseInt(defaultCountPrice) * $(op).find('input').val() +
          '- 3'
        );
        syncOptions($(op).attr('id'), 0, defaultCountPrice);
        $(this).parents('.mod-basket__item').remove();
        $('#mod_basket')
          .find('a.mod-basket__icon')
          .html($('.mod-basket__list').find('.mod-basket__item').length);
        if ($('.mod-basket__list').find('.mod-basket__item').length == 0) {
          $('#mod_basket')
            .hide()
            .css('right', '-' + $('#mod_basket').width() + 'px')
            .removeClass('active');
        } else {
          $('#mod_basket').show();
        }
      });
    return op;
  }
  function addOption(option, counter, price) {
    if (issetOption(option.attr('id'))) {
      syncOptions(option.attr('id'), counter, price, true);
    } else {
      var op = removeImageDiv(option.clone());
      op.find('.count-plus, .btn-add-buy').on('click', priceButtonsListener);
      op.find('.count-minus').on('click', priceButtonsListener);
      op = remakeItem(op);
      var stickPrice = $('.mod-basket__list');
      stickPrice.append(op);
      $('#mod_basket')
        .find('a.mod-basket__icon')
        .html($('.mod-basket__list').find('.mod-basket__item').length);
      if ($('.mod-basket__list').find('.mod-basket__item').length == 0) {
        $('#mod_basket')
          .hide()
          .css('right', '-' + $('#mod_basket').width() + 'px')
          .removeClass('active');
      } else {
        $('#mod_basket').show();
      }
    }
  }

  function removeImageDiv(option) {
    option.find('.services-image').remove();
    return option;
  }

  /**
   * Доп. услуги блок оформления заказа
   */
  // if ($('.stick-price-wrapper').length > 0) {
  // $(document).on('scroll', function(){
  // if($(document).scrollTop() > $('.product-price').offset().top){
  // $('.stick-price-wrapper').addClass('on');
  // if (!$('.stick-price-dropdown-button').hasClass('off'))
  // $('.stick-price-dropdown-button').addClass('on').next().slideDown('fast')
  // } else {
  // $('.stick-price-wrapper').removeClass('on');
  // }
  // });
  // }

  $('#products .product-box .product-image').slick();
  $('.product-item .product-image').slick();
  $('.certificate-image').slick();

  /**
   * Фотогалерея проекта
   */

  $('.show-more__button').click(function () {
    $('#products .product-box .product-image').slick();
  });

  $('.project-detail-page .slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<div class="slick-prev"</div>',
    nextArrow: '<div class="slick-next"</div>',
    infinite: true,
    asNavFor: '.slider-nav',
  });

  $('.project-detail-page .slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    infinite: true,

    asNavFor: '.slider-for',
    focusOnSelect: true,
    vertical: true,
    arrows: false,
    // prevArrow: '<div class="slick-prev"></div>',
    // nextArrow: '<div class="slick-next"></div>',
    responsive: [
      {
        breakpoint: 1441,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 1025,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 768,
        settings: {
          vertical: false,
        },
      },
    ],
  });

  /*$('.h-city select').selectmenu({
      change: function( event, ui ) {$('#location_'+$(this).val()).trigger('click')}
    });*/
  $('.h-city select').selectmenu({
    change: function (event, ui) {
      location.href = $(this).val();
    },
  });
});
$('ion-icon').click(function () {
  $('.search_block').toggle();
  $('ion-icon').toggleClass('active');
  $('#title-search-input').focus();
});

$(function () {
  $('.list').click(function () {
    $('.line', this).toggleClass('active-line');
    $(this).toggleClass('active-list');
    $('.link').toggleClass('active-link');
  });
  if ($(window).width() < 768) {
    /* Скрипт замены логотипа */
    $('.change-logo').attr(
      'src',
      '/local/templates/smart-module/images/mobile-logo.png'
    );
  }
});

let looks = document.querySelectorAll('.look');

looks.forEach((look) => {
  new Tooltip(look, {
    placement: 'left',
    title: 'Посмотреть в 3D',
  });
});
let tooltip = document.getElementById('tooltip');
if (tooltip !== null) {
  new Tooltip(document.getElementById('tooltip'), {
    placement: 'left', // or bottom, left, right, and variations
    title: 'Посмотреть подробно',
  });
}


function paginationImageMouseEnter(element, notSlickGoTo = false) {
  if (!element || !$) return
  //console.log(element)
  const index = $(element).attr('data-index');
  const parent = $(element).closest('.product-slider')
  if (!notSlickGoTo) parent.find('.product-image').slick('slickGoTo', index, true);
  parent.find('.product-pagination-image a').removeClass('active');
  $(element).addClass('active');
}

/*

        $(document).ready(function() {
        //following code will hide all elements with a class of 'filter'
        //if any elements with a class of 'category' are found
        if(!$('.services-link').hasClass('current')){
            $('.blackimg').hide();
      $('.whiteimg').show();
        }
    });

$(document).ready(function()  {

    if ($('.services-link').hasClass('current')) {
      console.log('suck');

    }
    else {
      console.log('no');
    }
  });

$(document).ready(function() {
  $('.services-link').each( function(){
    if ($(this).hasClass('current')){
      $('.blackimg', this).hide();
      $('.whiteimg', this).show();
    } else {
      $('.blackimg', this).show();
      $('.whiteimg', this).hide();
    }
  })
});
*/
