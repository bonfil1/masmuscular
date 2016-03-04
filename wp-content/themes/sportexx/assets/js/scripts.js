(function($) {
    "use strict";

    /*===================================================================================*/
    /*  OWL CAROUSEL
    /*===================================================================================*/

	$(".slider-next").click(function () {
	    var owl = $($(this).data('target'));
	    owl.trigger('next.owl.carousel');
	    return false;
	});

	$(".slider-prev").click(function () {
	    var owl = $($(this).data('target'));
	    owl.trigger('prev.owl.carousel');
	    return false;
	});

	/*===================================================================================*/
    /*  YITH Compare
    /*===================================================================================*/

	$( document ).ajaxComplete( function( event, xhr, settings ) {
		var $button = $( event.target.activeElement );
		if( $button.hasClass( 'compare' ) ) {
			$button.closest( '.cart-buttons' ).find( '.view-compare-button' ).toggleClass( 'hidden' );
		}
	});

	 if ( typeof yith_woocompare !== 'undefined' ) {

        $( document ).off( 'click', '.product a.compare.added' );

        $( '.yith-woocompare-open a, a.yith-woocompare-open' ).off( 'click' );
        $( '.yith-woocompare-widget' ).off( 'click' );

        // Remove auto open trigger
        if ( yith_woocompare.auto_open == 'yes') {
            yith_woocompare.auto_open = 'no';
        }
    }

	/*===================================================================================*/
    /*  QUANTITY INPUT
    /*===================================================================================*/

    $( 'div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' );

	$( document ).on( 'click', '.plus, .minus', function() {

		// Get values
		var $qty		= $( this ).closest( '.quantity' ).find( '.qty' ),
			currentVal	= parseFloat( $qty.val() ),
			max			= parseFloat( $qty.attr( 'max' ) ),
			min			= parseFloat( $qty.attr( 'min' ) ),
			step		= $qty.attr( 'step' );

		// Format values
		if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
		if ( max === '' || max === 'NaN' ) max = '';
		if ( min === '' || min === 'NaN' ) min = 0;
		if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

		// Change the value
		if ( $( this ).is( '.plus' ) ) {

			if ( max && ( max == currentVal || currentVal > max ) ) {
				$qty.val( max );
			} else {
				$qty.val( currentVal + parseFloat( step ) );
			}

		} else {

			if ( min && ( min == currentVal || currentVal < min ) ) {
				$qty.val( min );
			} else if ( currentVal > 0 ) {
				$qty.val( currentVal - parseFloat( step ) );
			}

		}

		// Trigger change event
		$qty.trigger( 'change' );

		return false;

	});

	/*===================================================================================*/
    /*  UPDATE MINI CART ON ADDED TO CART
    /*===================================================================================*/

	$('body').on('added_to_cart', function( event, fragments, cart_hash, $thisbutton ){
		if ( fragments ) {
			$.each( fragments, function( key, value ) {
				if( key == 'div.widget_shopping_cart_content' ) {
					$('#mini-cart').html($(value).find('#mini-cart').html());
				}
			});
		}
	});

	$( document ).ready( function() {

		/*===================================================================================*/
		/*  WOW 
	    /*===================================================================================*/

    	new WOW().init();
    

    	/*===================================================================================*/
		/*  LAZY LOAD
	    /*===================================================================================*/

	    if( typeof echo != "undefined" ) {
	    	echo.init({
	    		offset: 100,
	    		throttle: 250,
	    		unload: false,
	    		callback: function (element, op) {	    			
	    			$(element).closest( '.product-image' ).css('background-image', 'none');
			    }
	    	});
	    } else {
	    	setImageSize();
	    }

	    /*===================================================================================*/
		/*  SET IMAGE SIZE
	    /*===================================================================================*/

	    function setImageSize() {
	    	$('.product-image > img').each( function(){
		    	var height = $(this).height();
		    	$(this).closest( '.product-image-actions' ).height( height );
		    });
	    }

    	/*===================================================================================*/
	    /*  REMEMBER USER SHOP VIEW
	    /*===================================================================================*/

	    $('.view-switcher > .nav-tabs > li > a').on( 'click', function(){
	    	var href = $(this).attr('href');
            eraseCookie( 'user_shop_view' );
            if( href == '#grid-view' ) {
                createCookie( 'user_shop_view', 'grid', 300 );
            } else {
                createCookie( 'user_shop_view', 'list', 300 );
            }
	    });
    	
	});

	/*===================================================================================*/
	/*  ECHO RENDER ON TAB SWITCH
    /*===================================================================================*/

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		if( typeof echo != "undefined" ) { 
			echo.render();
		}
	});

	/*===================================================================================*/
	/*  COOKIE FUNCTIONS
    /*===================================================================================*/

	function createCookie(name, value, days) {
	    var expires;

	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
	        expires = "; expires=" + date.toGMTString();
	    } else {
	        expires = "";
	    }
	    document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
	}

	function readCookie(name) {
	    var nameEQ = escape(name) + "=";
	    var ca = document.cookie.split(';');
	    for (var i = 0; i < ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
	        if (c.indexOf(nameEQ) === 0) return unescape(c.substring(nameEQ.length, c.length));
	    }
	    return null;
	}

	function eraseCookie(name) {
	    createCookie(name, "", -1);
	}

	/*===================================================================================*/
	/*  Quick View
    /*===================================================================================*/

	$( document ).on( 'click', '.product_quick_view', function(e) {
		var product_id = $(this).data('product_id');

		$.blockUI({message: null, overlayCSS: {background: '#fff url(' + sportexx.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6}});
		
		$.ajax({
			url : sportexx.ajax_url,
			type : 'post',
			data : {
				action : 'product_quick_view',
				product_id : product_id
			},
			success : function( response ) {				
				$('#modal-quick-view-ajax-content').html( response );
				$('#quick-view').modal('show');
				$.unblockUI();
			}
		});

		return false;
	});

	$( '#quick-view' ).on( 'shown.bs.modal', function() {
		if( typeof echo != "undefined" ) { 
			echo.render();
		}

		if ( typeof wc_add_to_cart_variation_params === 'undefined' )
			return false;
		
		$( '.variations_form' ).wc_variation_form();
		$( '.variations_form .variations select' ).change();
	});

	/*===================================================================================*/
	/*  ADD TO CART ANIMATION
	/*===================================================================================*/

	$('body').on('added_to_cart', function(){
		$('.product-item').unblock(); // Unblock the product item
		return false;
	});

	$('body').on('adding_to_cart', function( e, $btn, data){
		$btn.parents('.product-item').block({message: null, overlayCSS: {background: '#fff url(' + sportexx.ajax_loader_url + ') no-repeat center', backgroundSize: '16px 16px', opacity: 0.6}});
	});

	/*===================================================================================*/
	/*  Visual Composer Row Behavior
    /*===================================================================================*/

	window.vc_rowBehaviour = function () {
		var $ = window.jQuery;
		var local_function = function () {
			var $elements = $( '[data-vc-full-width="true"]' );
			var is_rtl = $('body,html').hasClass('rtl');
			$.each( $elements, function ( key, item ) {
				var $el = $( this );
				var $el_full = $el.next( '.vc_row-full-width' );
				var $el_wrapper = $( '#page.wrapper' );
				var el_margin_left = parseInt( $el.css( 'margin-left' ), 10 );
				var el_margin_right = parseInt( $el.css( 'margin-right' ), 10 );
				var offset = 0 - $el_full.offset().left - el_margin_left + $el_wrapper.offset().left;
				var width = $el_wrapper.width();
				if( is_rtl ){
					$el.css( {
						'position': 'relative',
						'right': offset,
						'box-sizing': 'border-box',
						'width': $el_wrapper.width()
					} );
				} else {
					$el.css( {
						'position': 'relative',
						'left': offset,
						'box-sizing': 'border-box',
						'width': $el_wrapper.width()
					} );
				}
				
				if ( ! $el.data( 'vcStretchContent' ) ) {
					var padding = (- 1 * offset);
					if ( padding < 0 ) {
						padding = 0;
					}
					var paddingRight = width - padding - $el_full.width() + el_margin_left + el_margin_right;
					if ( paddingRight < 0 ) {
						paddingRight = 0;
					}
					$el.css( { 'padding-left': padding + 'px', 'padding-right': paddingRight + 'px' } );
				}
				$el.attr( "data-vc-full-width-init", "true" );
			} );
		};
		/**
		 * @todo refactor as plugin.
		 * @returns {*}
		 */
		var parallaxRow = function () {
			var vcSkrollrOptions,
				callSkrollInit = false;
			if ( vcParallaxSkroll ) {
				vcParallaxSkroll.destroy();
			}
			$( '.vc_parallax-inner' ).remove();
			$( '[data-5p-top-bottom]' ).removeAttr( 'data-5p-top-bottom data-30p-top-bottom' );
			$( '[data-vc-parallax]' ).each( function () {
				var skrollrSpeed,
					skrollrSize,
					skrollrStart,
					skrollrEnd,
					$parallaxElement,
					parallaxImage;
				callSkrollInit = true; // Enable skrollinit;
				if ( $( this ).data( 'vcParallaxOFade' ) == 'on' ) {
					$( this ).children().attr( 'data-5p-top-bottom', 'opacity:0;' ).attr( 'data-30p-top-bottom',
						'opacity:1;' );
				}

				skrollrSize = $( this ).data( 'vcParallax' ) * 100;
				$parallaxElement = $( '<div />' ).addClass( 'vc_parallax-inner' ).appendTo( $( this ) );
				$parallaxElement.height( skrollrSize + '%' );

				parallaxImage = $( this ).data( 'vcParallaxImage' );

				if ( parallaxImage !== undefined ) {
					$parallaxElement.css( 'background-image', 'url(' + parallaxImage + ')' );
				}

				skrollrSpeed = skrollrSize - 100;
				skrollrStart = - skrollrSpeed;
				skrollrEnd = 0;

				$parallaxElement.attr( 'data-bottom-top', 'top: ' + skrollrStart + '%;' ).attr( 'data-top-bottom',
					'top: ' + skrollrEnd + '%;' );
			} );

			if ( callSkrollInit && window.skrollr ) {
				vcSkrollrOptions = {
					forceHeight: false,
					smoothScrolling: false,
					mobileCheck: function () {
						return false;
					}
				};
				vcParallaxSkroll = skrollr.init( vcSkrollrOptions );
				return vcParallaxSkroll;
			}
			return false;
		};
		$( window ).unbind( 'resize.vcRowBehaviour' ).bind( 'resize.vcRowBehaviour', local_function );
		local_function();
		parallaxRow();
	}

})(jQuery);