<div class="search_form_block">
    <form name="search_form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search_form">
        <input type="text" name="s" placeholder="<?php _e('Search', 'canvas'); ?>" value=""
               title="<?php _e('Search', 'canvas'); ?>" class="field_search">
        <input type="submit" name="submit_search" value="Search" class="s_btn_search">
        <i class="icon-search"></i>
        <div class="clear"></div>
    </form>
</div>