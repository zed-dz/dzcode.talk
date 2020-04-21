<?php
#gt3_delete_theme_option("theme_version");

$theme_temp_version = gt3_get_theme_option("theme_version");

if ((int)$theme_temp_version < 3) {
    gt3_update_theme_option('woo_shop_header_cart', 'yes');
    gt3_update_theme_option("theme_version", 3);
}
?>