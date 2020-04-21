<?php

#Frontend
if (!function_exists('css_js_register')) {
    function css_js_register()
    {
        $wp_upload_dir = wp_upload_dir();

        #CSS
        wp_enqueue_style('gt3_default_style', get_bloginfo('stylesheet_url'));
        wp_enqueue_style("gt3_theme", get_template_directory_uri() . '/css/theme.css');

        #JS
        wp_enqueue_script("jquery");
        wp_enqueue_script('gt3_theme_js', get_template_directory_uri() . '/js/theme.js', array(), false, true);
		wp_enqueue_script('gt3_mousewheel_js', get_template_directory_uri() . '/js/jquery.mousewheel.js', array(), false, true);
		wp_enqueue_script('gt3_jscrollpane_js', get_template_directory_uri() . '/js/jquery.jscrollpane.min.js', array(), false, true);
    }
}
add_action('wp_enqueue_scripts', 'css_js_register');

#Additional files for plugin
if (class_exists('WooCommerce')) {
    if (!function_exists('woo_files')) {
        function woo_files()
        {
            wp_enqueue_style('css_woo', get_template_directory_uri() . '/css/woo.css');
            wp_enqueue_script('js_woo', get_template_directory_uri() . '/js/woo.js', array(), false, true);
        }
    }
    add_action('wp_print_styles', 'woo_files');
}

#Admin
add_action('admin_enqueue_scripts', 'admin_css_js_register');
function admin_css_js_register()
{
    #CSS (MAIN)
    wp_enqueue_style('jquery-ui', get_template_directory_uri() . '/core/admin/css/jquery-ui.css');
    wp_enqueue_style('colorpicker_css', get_template_directory_uri() . '/core/admin/css/colorpicker.css');
    wp_enqueue_style('gallery_css', get_template_directory_uri() . '/core/admin/css/gallery.css');
    wp_enqueue_style('colorbox_css', get_template_directory_uri() . '/core/admin/css/colorbox.css');
    wp_enqueue_style('selectBox_css', get_template_directory_uri() . '/core/admin/css/jquery.selectBox.css');
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/core/admin/css/admin.css');
    #CSS OTHER

    #JS (MAIN)
    wp_enqueue_script('admin_js', get_template_directory_uri() . '/core/admin/js/admin.js');
    wp_enqueue_script('ajaxupload_js', get_template_directory_uri() . '/core/admin/js/ajaxupload.js');
    wp_enqueue_script('colorpicker_js', get_template_directory_uri() . '/core/admin/js/colorpicker.js');
    wp_enqueue_script('selectBox_js', get_template_directory_uri() . '/core/admin/js/jquery.selectBox.js');
    wp_enqueue_script('backgroundPosition_js', get_template_directory_uri() . '/core/admin/js/jquery.backgroundPosition.js');
    wp_enqueue_script(array("jquery-ui-core", "jquery-ui-dialog", "jquery-ui-sortable"));
    wp_enqueue_media();
}

#Data for creating static css/js files.
function gt3_custom_styles() {
	$output = '
	 /* Main Font */
	 ::selection {background:#' . gt3_get_theme_option("color_theme") . ';}
	 ::-moz-selection {background:#' . gt3_get_theme_option("color_theme") . ';}
	 a, h1, h2, h3, h4, h5, h6, body, code, body #mc_signup_submit, input, textarea {font-family:"' . gt3_get_theme_option("main_font") . '";}

	 /* Headers */
	 h1 {font-size:' . gt3_get_theme_option("h1_font_size") . ';line-height:' . gt3_get_theme_option("h1_line_height") . ';}
	 h2 {font-size:' . gt3_get_theme_option("h2_font_size") . ';line-height:' . gt3_get_theme_option("h2_line_height") . ';}
	 h3 {font-size:' . gt3_get_theme_option("h3_font_size") . ';line-height:' . gt3_get_theme_option("h3_line_height") . ';}
	 h4 {font-size:' . gt3_get_theme_option("h4_font_size") . ';line-height:' . gt3_get_theme_option("h4_line_height") . ';}
	 h5 {font-size:' . gt3_get_theme_option("h5_font_size") . ';line-height:' . gt3_get_theme_option("h5_line_height") . ';}
	 h6 {font-size:' . gt3_get_theme_option("h6_font_size") . ';line-height:' . gt3_get_theme_option("h6_line_height") . ';}

	 .bc_area {background-image: url("' . gt3_get_theme_option("header_bg") . '");}

	 /* Main Color */
	 a,
	 .logo_links_cont a:hover,
	 .breadcrumbs a:hover,
	 .sidepanel a:hover,
	 .acc_togg_title:hover span,
	 .item_info h5 a:hover,
	 .teamlink:hover i,
	 .shortcode_tabs .shortcode_tab_item_title:hover,
	 .views_likes:hover .post_likes_add,
	 .acc_togg_title.state-active span,
	 .dropcap.type3,
	 .optionset li.selected a,
	 .most_popular .currperiod,
	 .module_portfolio .optionset a:hover,
	 .most_popular .currprice,
	 .horizontal_menu ul li a:hover,
	 .entry-title a:hover,
	 .preview_meta_data a:hover,
	 .page .bloglisting_post .post_preview .post_otput_container .meta span a:hover,
	 .archive .bloglisting_post .post_preview .post_otput_container .meta span a:hover,
	 .home .bloglisting_post .post_preview .post_otput_container .meta span a:hover,
	 .page .bloglisting_post .post_preview h3.entry-title a:hover,
	 .archive .bloglisting_post .post_preview h3.entry-title a:hover,
	 .home .bloglisting_post .post_preview h3.entry-title a:hover,
	 .horizontal_menu ul li.current-menu-parent a,
	 .horizontal_menu ul li.current-menu-item a,
	 .page-template-page-albums .bc_content h6 a:hover,
	 .page-template-page-albums .bc_likes:hover,
	 .shortcode_iconbox a:hover .ico,
	 .shortcode_iconbox a:hover .iconbox_title,
	 .shortcode_iconbox a:hover .iconbox_body,
	 .fullscreen_block .fw_preview_wrapper .blogpost_title a:hover,
	 .postmeta div a:hover,
	 .single-port .thisprev a:hover,
	 .single .thisprev a:hover,
	 .single-port .thisnext a:hover,
	 .single .thisnext a:hover,
	 .single-port .meta span a:hover,
	 .single .meta span a:hover,
	 .single ol.commentlist li .stand_comment .thiscommentbody .comment_info .author_name a.comment-edit-link:hover,
	 .single ol.commentlist li .stand_comment .thiscommentbody .comment_info .comments a.comment-reply-link:hover,
	 .single form.comment-form .logged-in-as a:hover,
	 .fw_block .is_masonry .fw_preview_wrapper .inner h6.blogpost_title a:hover,
	 .grid_title_ajax_isotope_block .fw_preview_wrapper .inner h6.blogpost_title a:hover,
	 .fw_block .is_masonry .fw_preview_wrapper .inner .inmeta .post_likes:hover,
	 .grid_title_ajax_isotope_block .fw_preview_wrapper .inner .inmeta .post_likes:hover,
	 .page .portfolio_block .post_preview .preview_wrapper .preview_topblock h3 a:hover,
	 .page .portfolio_block .post_preview .preview_wrapper .preview_topblock .meta .post_likes:hover,
	 .page .portfolio_block .post_preview .preview_wrapper .preview_topblock .meta span a:hover,
	 .page .bloglisting_post.type2 .meta span a:hover,
	 .right-sidebar-block .widget_search input,
	 .left-sidebar-block .widget_search input,
	 .mc_merge_var input.mc_input,
	 .block404 .search_form_block input.field_search {
	    color:#' . gt3_get_theme_option("color_theme") . ';
	 }

	 .single-port .thisprev a:hover:before,
	 .single .thisprev a:hover:before,
	 .single-port .thisnext a:hover:after,
	 .single .thisnext a:hover:after,
	 .btn_type1:hover,
	 .btn_type3:hover,
	 .btn_type4:hover,
	 .page form.wpcf7-form p input[type="submit"]:hover {
	 	background-color: #' . gt3_get_theme_option("color_theme") . ';
	 }

	 .module_price_table .shortcode_button:hover .btn_text
	 {
	    color:#' . gt3_get_theme_option("color_theme") . ' !important;
	 }

	 /* Background Color */
	 .most_popular .price_item_title,
	 .most_popular .price_item_btn .shortcode_button,
	 .btn_type5,
	 .most_popular .shortcode_button:after {
	     background-color:#' . gt3_get_theme_option("color_theme") . ';
	 }

	 .most_popular .shortcode_button:after,
	 .module_price_table .most_popular .shortcode_button {
	     background-color:#' . gt3_get_theme_option("color_theme") . ' !important;
	 }

	 /* Border Color */
	 .shortcode_blockquote.type3,
	 .most_popular .price_item_title,
	 .most_popular .shortcode_button
	 {
         border-color:#' . gt3_get_theme_option("color_theme") . ';
     }

	 /* Woocommerce colors */
	.woocommerce select,
	.woo_product_meta a.button,
	.woocommerce .woo_product_meta a.button {
		font-family:"' . gt3_get_theme_option("main_font") . '";
	}
	.woocommerce ul.products li.product  span.onsale,
	.woocommerce-page ul.products li.product  span.onsale,
	.woocommerce .product span.onsale,
	.woocommerce-page .product span.onsale {
		background:#' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.woocommerce_container ul.products li.product h3:hover,
	.woocommerce ul.products li.product h3:hover {
		color: #' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.woo_product_category a:hover,
	.woo_product_meta a.button:hover,
	.woocommerce .woo_product_meta a.button:hover {
		color:#' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.widget_product_tag_cloud a:hover {
		color:#' . gt3_get_theme_option("color_theme") . ';
	}
	.widget_product_categories a:hover,
	.widget_product_categories li.current-cat a,
	.widget_login .pagenav a:hover,
	.woocommerce-page .widget_nav_menu ul li a:hover,
	.widget_layered_nav li:hover, .widget_layered_nav li.chosen,
	.widget_layered_nav li:hover a, .widget_layered_nav li.chosen a,
	.woocommerce .widget_layered_nav ul li.chosen a,
	.woocommerce-page .widget_layered_nav ul li.chosen a {
		color:#' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.woo_wrap .widget_shopping_cart .total span,
	.main_container .widget_shopping_cart .total span {color:#' . gt3_get_theme_option("color_theme") . ';
	}
	.woo_wrap ul.cart_list li a:hover, .woo_wrap ul.product_list_widget li a:hover,
	.woocommerce ul.product_list_widget li a:hover {
		color: #' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.woocommerce a.button,
	.woocommerce button.button,
	.woocommerce input.button,
	.woocommerce #respond input#submit,
	.woocommerce #content input.button,
	.woocommerce a.edit,
	.woocommerce #commentform #submit,
	.woocommerce-page input.button,
	.woocommerce .wrapper input[type="reset"],
	.woocommerce .wrapper input[type="submit"] {
		font-family: "' . gt3_get_theme_option("main_font") . '";
		-moz-osx-font-smoothing:grayscale;
		-webkit-font-smoothing:antialiased;
	}
	.woocommerce a.button:hover,
	.woocommerce button.button:hover,
	.woocommerce input.button:hover,
	.woocommerce #respond input#submit:hover,
	.woocommerce #content input.button:hover,
	.woocommerce a.edit:hover,
	.woocommerce #commentform #submit:hover,
	.woocommerce-page input.button:hover,
	.woocommerce .wrapper input[type="reset"]:hover,
	.woocommerce .wrapper input[type="submit"]:hover,
	.woocommerce .shop_table.cart .actions .button.checkout-button {
		background:#' . gt3_get_theme_option("color_theme") . ' !important;
		border-color:#' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.woo_wrap .price_label span {color:#' . gt3_get_theme_option("color_theme") . ';
	}
	.woo_wrap .price_label span.to:before {
		color:#' . gt3_get_theme_option("color_theme") . ';
		background:#' . gt3_get_theme_option("default_bg_color") . ';
	}
	.woocommerce-review-link:hover {color:#' . gt3_get_theme_option("color_theme") . ';
	}
	.woocommerce div.product .summary span.price,
	.woocommerce div.product .summary p.price,
	.woocommerce #content div.product .summary span.price,
	.woocommerce #content div.product .summary p.price,
	div.product .summary .amount {
		font-family: "' . gt3_get_theme_option("main_font") . '";
		-moz-osx-font-smoothing:grayscale;
		-webkit-font-smoothing:antialiased;
	}
	div.product .summary .amount,
	div.product .summary ins,
	div.product .summary ins .amount {color:#' . gt3_get_theme_option("color_theme") . ';
	}
	.summary .product_meta span a:hover {color:#' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.summary .product_meta span.posted_in:before,
	.summary .product_meta span.product_sku:before,
	.summary .product_meta span.tagged_as a:after,
	.summary .product_meta span.tagged_as a.first_tag:before {
		background:#' . gt3_get_theme_option("default_bg_color") . ';
	}
	.woocommerce div.product .woocommerce-tabs .panel h2,
	.woocommerce #content div.product .woocommerce-tabs .panel h2,
	.woocommerce .woocommerce-tabs #reviews #reply-title {
		font-family: "' . gt3_get_theme_option("main_font") . '";
	}
	.woocommerce div.product .woocommerce-tabs ul.tabs li:hover a,
	.woocommerce #content div.product .woocommerce-tabs ul.tabs li:hover a,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active:hover a,
	.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active:hover a {
		color:#' . gt3_get_theme_option("color_theme") . ';
	}
	mark {background:#' . gt3_get_theme_option("color_theme") . ';
	}
	.shop_table .product-subtotal .amount {
		color:#' . gt3_get_theme_option("color_theme") . ';
	}
	.shipping-calculator-button:hover {
		color:#' . gt3_get_theme_option("color_theme") . ' !important;
	}
	.woocommerce .cart-collaterals .order-total .amount,
	.shop_table .product-name a:hover {
		color:#' . gt3_get_theme_option("color_theme") . ';
	}
	.woocommerce_container ul.products li.product a.add_to_cart_button.loading,
	.woocommerce ul.products li.product a.add_to_cart_button.loading {
		color:#' . gt3_get_theme_option("color_theme") . ' !important;
	}
	';

	$output = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '   ', '    '), '', $output);
	wp_add_inline_style('gt3_theme', $output);
}

add_action('wp_enqueue_scripts', 'gt3_custom_styles', 30);
