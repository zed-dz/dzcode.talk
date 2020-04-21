// Woocommerce Price Filter
if (jQuery('.price_slider_wrapper').size() > 0) {
	setInterval(function woopricefilter() {
		"use strict";
		var price_from = jQuery('.price_slider_amount').find('span.from').text();
		var price_to = jQuery('.price_slider_amount').find('span.to').text();
		
		jQuery('.price_slider').find('.ui-slider-handle').first().attr('data-width', price_from);
		jQuery('.price_slider').find('.ui-slider-handle').last().attr('data-width-r', price_to);
		
	}, 100);
}

// Woocommerce Cart
if (jQuery('.woocommerce-cart').size() > 0) {
	setInterval(function cart_update() {
		"use strict";	
		var window_h = jQuery(window).height(),
			wrapper_h = jQuery('.wrapper').height(),
			header_h = jQuery('header').height(),
			footer_h = jQuery('footer').height(),
			fake_space = window_h - header_h - footer_h - wrapper_h;
		if (fake_space < 113) {
			jQuery('footer').addClass('static_footer');
		} else {
			jQuery('footer').removeClass('static_footer');
		}	
	}, 100);
}

jQuery(document).ready(function(){
	"use strict";	
	if (jQuery('.woocommerce_container').size() > 0) {
		var p_title = jQuery('.woocommerce_container').find('h1.page-title').html();
		if (jQuery('.summary').size() > 0) {		
		} else {
			jQuery('.bc_area h1.entry-title, .bc_area .breadcrumbs span').empty();
			jQuery('.bc_area h1.entry-title, .bc_area .breadcrumbs span').append(p_title);
		}					
	}
	// Products Meta
	jQuery('.woocommerce ul.products li.product').each(function(){
		jQuery(this).find('.button').wrap('<div class="woo_product_meta"></div>');		
		var woo_meta_cat = jQuery(this).find(".product_meta .posted_in").html();		
		var woo_meta_price = jQuery(this).find("span.price").html();
		if(typeof woo_meta_price !== 'undefined') {
			jQuery(this).find('.woo_product_meta').prepend('<div class="woo_product_price">'+woo_meta_price+'</div>');										
		}
		if(typeof woo_meta_cat !== 'undefined') {
			jQuery(this).find('.woo_product_meta').prepend('<div class="woo_product_category">'+woo_meta_cat+'</div>');										
		}		
	});	
	// Thumbs Hover	
	jQuery('.woocommerce ul.products li.product, .woocommerce .images .thumbnails a, .woocommerce .images .woocommerce-main-image').each(function(){								
		jQuery(this).find("img").wrapAll('<div class="woo_hover_img"></div>');								
	});
		 
	// Single Product Meta
	if (jQuery('.summary .product_meta').size() > 0) {
		var product_sku = jQuery('.summary .product_meta').find('.sku_wrapper').html();
		jQuery('.summary .product_meta').find('.posted_in').prepend('<i class="icon-folder-close-alt"></i>');
		jQuery('.summary .product_meta').find('.tagged_as').prepend('<i class="icon-tags"></i>');
		jQuery('.summary .product_meta').find('.tagged_as a').first().addClass('first_tag');
		jQuery('.summary .product_meta').find('.posted_in').after('<span class="product_sku">'+product_sku+'</span>');		
	}
	
	// Woocommerce Fullscreen
	if (jQuery('.woocommerce_fullscreen').size() > 0) {
		if(jQuery('.woocommerce_fullscreen').parents('body').hasClass('single-product')) {			
		} else {
			jQuery('.woocommerce_fullscreen').parents('body').find('.bc_area .container').addClass('fullwith_container');
		}		
		jQuery('.single-product .woocommerce_fullscreen').find('.product').addClass('container pt6');
	}

	gt3_related_owl ();
	
});

jQuery(window).load(function(){
	"use strict";
	// Woocommerce
	jQuery(".woocommerce-page .widget_price_filter .price_slider").wrap("<div class='price_filter_wrap'></div>");	
	jQuery("#tab-additional_information .shop_attributes").wrap("<div class='additional_info'></div>");	
	jQuery(".shop_table.cart").wrap("<div class='woo_shop_cart'></div>");	
});

jQuery(window).resize(function(){
	gt3_related_owl ();
});

// Woo related products carousel
function gt3_related_owl () {
	var wrps_related_products_area_tag = jQuery('.wrps_related_products_area');
	var wrap_slider_width = jQuery(window).width() - 70;
	if (wrps_related_products_area_tag.length) {
		if (jQuery(window).width() < 768) {
			wrps_related_products_area_tag.css('max-width', wrap_slider_width + 'px');
		} else {
			wrps_related_products_area_tag.css('max-width', 'none');
		}
	}
}