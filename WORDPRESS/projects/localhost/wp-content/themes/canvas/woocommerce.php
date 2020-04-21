<?php
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());
$gt3_theme_pagebuilder['settings']['selected-sidebar-name'] = "WooCommerce";
if (gt3_get_theme_option('menu_type') == 'horizontal') {
    get_header('hor-menu');
} else {
    get_header();
}
?>

<?php if (gt3_get_theme_option("woo_shop_layout") == "boxed" || is_singular( 'product' )) { ?>
	<div class="container">
        <div class="row <?php echo esc_attr($gt3_theme_pagebuilder['settings']['layout-sidebars']) ?>">
            <div class="main_container woo_wrap">
                <div
                    class="fl-container <?php echo(($gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") ? "span9" : "span12"); ?>">
                    <div class="row">
                        <div
                            class="posts-block <?php echo("left-sidebar" == $gt3_theme_pagebuilder['settings']['layout-sidebars'] ? "span9" : "span12"); ?>">
                            <div class="contentarea woocommerce_container">
                            	<?php
								woocommerce_content();
								wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'canvas') . ': ', 'after' => '</div>'));
								?>  
                            </div>
                        </div>
                        <?php get_sidebar('left'); ?>
                    </div>
                </div>
                <?php get_sidebar('right'); ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>

<?php } else { ?>
	<div class="contentarea woocommerce_container woocommerce_fullscreen">    	
        <div class="fullscreen_shop_sorting">
        	<div class="def_shop_sorting"></div>
        	<?php dynamic_sidebar('WooCommerce Fullscreen Widgets'); ?>            
            <div class="woo_def_sort_info"><i class="icon-sort"></i><?php echo __('Sorting', 'canvas'); ?></div>
            <div class="woo_cat_sort_info"><i class="icon-folder-close-alt"></i><?php echo __('Category', 'canvas'); ?></div>
            <div class="woo_price_sort_info"><i class="icon-dollar"></i><?php echo __('Price', 'canvas'); ?></div>
			<script type="text/javascript">
                jQuery(document).ready(function(){
                    "use strict";	
                    if (jQuery('.woocommerce_fullscreen .woocommerce-ordering').size() > 0) {
                        var def_sort = jQuery('.woocommerce_fullscreen .woocommerce-ordering').html();
                        var sort_def_name = jQuery('.fullscreen_shop_sorting .woo_def_sort_info').html();
                        jQuery('.woocommerce_fullscreen').find('.def_shop_sorting').append('<div class="sort_field_name">'+sort_def_name+'</div><form method="get" class="woocommerce-ordering">'+def_sort+'</form>');
                    }
                    if (jQuery('.fullscreen_shop_sorting .widget_product_categories').size() > 0) {
                        var sort_cat_name = jQuery('.fullscreen_shop_sorting .woo_cat_sort_info').html();
                        jQuery('.fullscreen_shop_sorting').find('.widget_product_categories').prepend('<div class="sort_field_name">'+sort_cat_name+'</div>');
                    }
                    if (jQuery('.fullscreen_shop_sorting .widget_price_filter').size() > 0) {
                        var sort_price_name = jQuery('.fullscreen_shop_sorting .woo_price_sort_info').html();
                        jQuery('.fullscreen_shop_sorting').find('.widget_price_filter').prepend('<div class="sort_field_name">'+sort_price_name+'</div>');
                    }
					jQuery('.product_added_cart').css({'margin-left': - jQuery('.product_added_cart').width()/2 + 'px'});
					jQuery('.add_to_cart_button').click(function(){
						if (jQuery(this).hasClass("product_type_simple")) {
							jQuery('.product_added_cart').addClass('show_info');
						}
						setTimeout(function() {
							jQuery('.product_added_cart').removeClass('show_info');
						}, 1000);											
					});
                });
            </script>
        </div>                
		<?php		
			woocommerce_content();
            wp_link_pages(array('before' => '<div class="page-link">' . __('Pages', 'canvas') . ': ', 'after' => '</div>'));
        ?>
        <div class="product_added_cart"><span><?php echo __('Product Added!', 'canvas'); ?></span></div>
    </div>

<?php } ?>

<?php get_footer(); ?>