$(document).ready(function(){

	$('.js-fancy').fancybox({
		padding: 0,
		beforeShow: function() {
			//Передаем данные заказа в форму
			if ($('#total-product-price-scroll').length > 0) { //Страница товара
				var services = $('.stick-price-body').find('.services-box');
				var input = '';
				var addPrice = 0;
				if(services.length > 0){
					for(var i=0; i<services.length; i++){
						var service = $(services[i]);
						var title = $.trim(service.find('.services-description').text());
						var price = $.trim(service.find('.count-price').data('default-price'));
						var count = $.trim(service.find('input').val());

						input += title+' - '+count+' шт. ('+price+' р. за шт.); ';
						addPrice += price * count;
					}
				}

				$('form[name=ORDER] input[name=form_hidden_3]').val(window.location.origin + window.location.pathname);
				$('form[name=ORDER] input[name=form_hidden_4]').val($('#total-product-price').data('base-price'));
				$('form[name=ORDER] input[name=form_hidden_5]').val(addPrice);
				$('form[name=ORDER] input[name=form_hidden_6]').val($('#total-product-price-scroll').text());
				$('form[name=ORDER] input[name=form_hidden_7]').val(input);
			} else { //Страница списка товаров
				var item = $(this.element);
				$('form[name=ORDER] input[name=form_hidden_3]').val(window.location.origin + item.siblings('a').attr('href'));
				$('form[name=ORDER] input[name=form_hidden_4]').val(item.data('base-price'));
				$('form[name=ORDER] input[name=form_hidden_5]').val('-');
				$('form[name=ORDER] input[name=form_hidden_6]').val(item.data('base-price'));
				$('form[name=ORDER] input[name=form_hidden_7]').val('-');
			}
		}
	});

	$('.js-tab').click(function(e) {
		e.preventDefault();
		$('.js-tab, .js-tab-box').removeClass('current');
		$('[data-tab="' + $(this).data('tab') + '"]').addClass('current');
	});
	$('.js-tab').click(function(e) {
		e.preventDefault();
		$('.js-tab, .js-tab-box').removeClass('current');
		$('[data-tab="' + $(this).data('tab') + '"]').addClass('current');
	});

	$('.js-product-tab').click(function(e) {
		e.preventDefault();
		$('.js-product-tab, .js-product-tab-box').removeClass('current');
		$('[data-tab="' + $(this).data('tab') + '"]').addClass('current');
	});

	$('.tabs .js-tab:first, .tabs-box .js-product-tab:first').trigger('click');

	$('.count-plus, .count-minus').on('click', priceButtonsListener);

  	$('.mobile-nav-button').on('click',function(){
		$('.header-nav-list').toggle()
	});

	$('.stick-price-dropdown-button').on('click', function(){
		if($(this).hasClass('on')) {
			$(this).removeClass('on').addClass('off').next().slideToggle('fast');
		} else {
			$(this).removeClass('off').addClass('on').next().slideToggle('fast');
		}
	});

    function priceButtonsListener(e){
        e.preventDefault();
		var basePriceEl = $('#total-product-price');
        var basePriceScrollEl = $('#total-product-price-scroll');
		var basePrice = +basePriceEl.text();

		var defaultCountPrice = $(this).closest('.services-box').find('.count-price').data('default-price');
		var countPrice = $(this).closest('.services-box').find('.count-price').text();
		var stick = false;
		var sOp = false;

        if(!$(this).closest('.services-box').attr('id')){
            stick = true;
        }

        if($(this).closest('.services-box').parent().hasClass('stick-price-body')){
            sOp = true;
        }

  		if($(this).hasClass('count-minus')){
  			if($(this).parent().find('input').val() == '0'){
  				return false;
  			}else{
  			    if($(this).parent().find('input').val() !== '1'){
  			        $(this).closest('.services-box').find('.count-price').text(parseInt(countPrice) - parseInt(defaultCountPrice));
  			    }
  				$(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) - 1 + '');

  				var tPrice = +basePriceEl.text();

  				basePriceEl.text(tPrice - parseInt(defaultCountPrice));
			    basePriceScrollEl.text(tPrice - parseInt(defaultCountPrice));

			    var parent = $(this).closest('.services-box');
			    var counter = +$(this).parent().find('input').val();
    		    var price = +$(this).closest('.services-box').find('.count-price').text();

			    if(!stick){
    			    if($(this).parent().find('input').val() !== '0'){
      		            addOption(parent, counter, price);
    			    } else {
    			        removeOption(parent);
    			    }
			    }

			    if(!stick && sOp){
    		        syncOptions($(this).closest('.services-box').attr('id'), counter, price);
    		    }
  			}
  		}else{

  		    if($(this).parent().find('input').val() == '0'){
  				$(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) + 1 + '');
  			}else{
    			$(this).parent().find('input').val(parseInt($(this).parent().find('input').val()) + 1 + '');
    			$(this).closest('.services-box').find('.count-price').text(parseInt(countPrice) + parseInt(defaultCountPrice));
  			}
  			basePriceEl.text(basePrice  + parseInt(defaultCountPrice));
    		basePriceScrollEl.text(basePrice + parseInt(defaultCountPrice));

    		var counter = +$(this).parent().find('input').val();
    		var price = +$(this).closest('.services-box').find('.count-price').text();

    		if(!stick){
        		var parent = $(this).closest('.services-box');
      		    addOption(parent, counter, price);
    		}

    		if(!stick && sOp){
    		    syncOptions($(this).closest('.services-box').attr('id'), counter, price);
    		}
  		}
    }

    function syncOptions(id, counter, price, isStick){
        var parents = $("[id="+id+"][class = services-box]");
        var parent = null;
        for(var i=0;i<parents.length;i++){
            if(isStick){
                if($(parents[i]).parent().hasClass('stick-price-body')){
                    parent = $(parents[i]);
                }
            } else {
                if($(parents[i]).parent().hasClass('services-body')){
                    parent = $(parents[i]);
                }
            }

        }

        if(parent.length > 0){
            parent.find('input').val(counter);
            parent.find('.count-price').text(price);
        }
    }

    function issetOption(id){
        var stickPrice = $('.stick-price-body');
        if(stickPrice.find('#'+id).length > 0){
            return true;
        }

        return false;
    }

    function addOption(option, counter, price){
        if(issetOption(option.attr('id'))){
            syncOptions(option.attr('id'), counter, price, true);
        } else {
            var op = removeImageDiv(option.clone());
            op.find('.count-plus').on('click', priceButtonsListener);
            op.find('.count-minus').on('click', priceButtonsListener);

            var stickPrice = $('.stick-price-body');
            stickPrice.append(op);
        }
    }

    function removeOption(option){
        var stickPrice = $('.stick-price-body');
        var stickOption = stickPrice.find('#'+option.attr('id'));
        if(stickOption.length > 0){
            stickOption.remove();
        }
    }

    function removeImageDiv(option){
        option.find('.services-image').remove();
        return option;
    }

	/**
	 * Доп. услуги блок оформления заказа
	 */
	if ($('.stick-price-wrapper').length > 0) {
		$(document).on('scroll', function(){
			if($(document).scrollTop() > $('.product-price').offset().top){
				$('.stick-price-wrapper').addClass('on');
				if (!$('.stick-price-dropdown-button').hasClass('off'))
					$('.stick-price-dropdown-button').addClass('on').next().slideDown('fast')
			} else {
				$('.stick-price-wrapper').removeClass('on');
			}
		});
	}

	/**
	 * Маска телефона
	 */
	$('input[type=text].phone').mask('+7 (999) 999-99-99', {
		placeholder: '_'
	});

	$('#products .product-box .product-image').slick();

	/**
	 * Фотогалерея проекта
	 */
	$('.project-detail-page .slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});

	$('.project-detail-page .slider-nav').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		focusOnSelect: true,
		prevArrow: '<div class="slick-prev"></div>',
		nextArrow: '<div class="slick-next"></div>',
		responsive: [
			{
				breakpoint: 1441,
				settings: {
					slidesToShow: 4,
				}
			},
			{
				breakpoint: 1025,
				settings: {
					slidesToShow: 3
				}
			}
		]
	});

	$('.h-city select').selectmenu({
	  change: function( event, ui ) {$('#location_'+$(this).val()).trigger('click')}
	});

});

