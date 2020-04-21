<?php

$gt3_tabs_admin_theme = new Tabs_admin_theme();

$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'General',
    'desc' => '',
    'icon' => 'general.png',
    'icon_active' => 'general_active.png',
    'icon_hover' => 'general_hover.png'
), array(
    new UploadOption_admin_theme(array(
        'name' => 'Header logo',
        'id' => 'logo',
        'desc' => 'Default 102px x 18px',
        'default' => THEMEROOTURL . '/img/logo.png'
    )),
    new UploadOption_admin_theme(array(
        'name' => 'Logo (Retina)',
        'id' => 'logo_retina',
        'desc' => 'Default: 204px x 36px',
        'default' => THEMEROOTURL . '/img/retina/logo.png'
    )),
    new textOption_admin_theme(array(
        'name' => 'Header logo width',
        'id' => 'header_logo_standart_width',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '102'
    )),
    new textOption_admin_theme(array(
        'name' => 'Header logo height',
        'id' => 'header_logo_standart_height',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '18'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Favicon',
        'id' => 'favicon',
        'desc' => 'Icon must be 16x16px or 32x32px',
        'default' => THEMEROOTURL . '/img/favicon.ico'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (57px)',
        'id' => 'apple_touch_57',
        'desc' => 'Icon must be 57x57px',
        'default' => THEMEROOTURL . '/img/apple_icons_57x57.png'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (72px)',
        'id' => 'apple_touch_72',
        'desc' => 'Icon must be 72x72px',
        'default' => THEMEROOTURL . '/img/apple_icons_72x72.png'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Apple touch icon (114px)',
        'id' => 'apple_touch_114',
        'desc' => 'Icon must be 114x114px',
        'default' => THEMEROOTURL . '/img/apple_icons_114x114.png'
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Google analytics or any other code<br>(before &lt;/head&gt;)',
        'id' => 'code_before_head',
        'default' => ''
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Any code <br>(before &lt;/body&gt;)',
        'id' => 'code_before_body',
        'default' => ''
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Copyright',
        'id' => 'copyright',
        'default' => 'Copyright &copy; 2020 Canvas WordPress Theme. All Rights Reserved.'
    ))
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Sidebars',
    'desc' => '',
    'icon' => 'sidebars.png',
    'icon_active' => 'sidebars_active.png',
    'icon_hover' => 'sidebars_hover.png'
), array(
    new SelectOption_admin_theme(array(
        'name' => 'Default sidebar layout',
        'id' => 'default_sidebar_layout',
        'desc' => '',
        'default' => 'no-sidebar',
        'options' => array(
            'left-sidebar' => 'Left sidebar',
            'right-sidebar' => 'Right sidebar',
            'no-sidebar' => 'Without sidebar'
        )
    )),
    new SidebarManager_admin_theme(array(
        'name' => 'Sidebar manager',
        'id' => 'sidebar_manager',
        'desc' => ''
    ))
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Fonts',
    'desc' => '',
    'icon' => 'fonts.png',
    'icon_active' => 'fonts_active.png',
    'icon_hover' => 'fonts_hover.png'
), array(
    new FontSelector_admin_theme(array(
        'name' => 'Main font',
        'id' => 'main_font',
        'desc' => '',
        'default' => 'Open Sans',
        'options' => get_fonts_array_only_key_name()
    )),
    new textOption_admin_theme(array(
        'name' => 'Main font parameters',
        'id' => 'google_font_parameters_main_font',
        'not_empty' => true,
        'default' => ':300,400,600,700',
        'width' => '100%',
        'textalign' => 'left',
        'desc' => 'Google font. Click <a href="https://developers.google.com/webfonts/docs/getting_started" target="_blank">here</a> for help.'
    )),
    new textOption_admin_theme(array(
        'name' => 'H1 font-size',
        'id' => 'h1_font_size',
        'not_empty' => true,
        'default' => '41px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H1 line-height',
        'id' => 'h1_line_height',
        'not_empty' => true,
        'default' => '45px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H2 font-size',
        'id' => 'h2_font_size',
        'not_empty' => true,
        'default' => '37px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H2 line-height',
        'id' => 'h2_line_height',
        'not_empty' => true,
        'default' => '39px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H3 font-size',
        'id' => 'h3_font_size',
        'not_empty' => true,
        'default' => '32px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H3 line-height',
        'id' => 'h3_line_height',
        'not_empty' => true,
        'default' => '39px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H4 font-size',
        'id' => 'h4_font_size',
        'not_empty' => true,
        'default' => '20px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H4 line-height',
        'id' => 'h4_line_height',
        'not_empty' => true,
        'default' => '25px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H5 font-size',
        'id' => 'h5_font_size',
        'not_empty' => true,
        'default' => '16px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H5 line-height',
        'id' => 'h5_line_height',
        'not_empty' => true,
        'default' => '22px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H6 font-size',
        'id' => 'h6_font_size',
        'not_empty' => true,
        'default' => '14px',
        'width' => '100px',
        'textalign' => 'center'
    )),
    new textOption_admin_theme(array(
        'name' => 'H6 line-height',
        'id' => 'h6_line_height',
        'not_empty' => true,
        'default' => '24px',
        'width' => '100px',
        'textalign' => 'center'
    )),
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Socials',
    'icon' => 'social.png',
    'icon_active' => 'social_active.png',
    'icon_hover' => 'social_hover.png'
), array(
    new TextOption_admin_theme(array(
        'name' => 'Flickr',
        'id' => 'social_flickr',
        'default' => 'https://www.flickr.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Pinterest',
        'id' => 'social_pinterest',
        'default' => 'https://pinterest.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'YouTube',
        'id' => 'social_youtube',
        'default' => 'https://youtube.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Instagram',
        'id' => 'social_instagram',
        'default' => 'https://instagram.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Dribbble',
        'id' => 'social_dribbble',
        'default' => 'https://dribbble.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Facebook',
        'id' => 'social_facebook',
        'default' => 'https://facebook.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Twitter',
        'id' => 'social_twitter',
        'default' => 'https://twitter.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'LinkedIn',
        'id' => 'social_linked_in',
        'default' => 'https://linkedin.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Tumblr',
        'id' => 'social_tumblr',
        'default' => 'https://tumblr.com',
        'desc' => 'Please specify https:// to the URL'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Google Plus',
        'id' => 'social_gplus',
        'default' => 'https://google.com',
        'desc' => 'Please specify https:// to the URL'
    ))
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Contacts',
    'icon' => 'contacts.png',
    'icon_active' => 'contacts_active.png',
    'icon_hover' => 'contacts_hover.png'
), array(
    new TextOption_admin_theme(array(
        'name' => 'Phone number',
        'id' => 'phone',
        'default' => '+1 800 789 50 12'
    )),
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'View Options',
    'icon' => 'layout.png',
    'icon_active' => 'layout_active.png',
    'icon_hover' => 'layout_hover.png'
), array(
    new SelectOption_admin_theme(array(
        'name' => 'Responsive',
        'id' => 'responsive',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Default portfolio posts style',
        'id' => 'default_portfolio_style',
        'desc' => '',
        'default' => 'simple-portfolio-post',
        'options' => array(
            'simple-portfolio-post' => 'Simple Post',
            'fw-portfolio-post' => 'Fullwidth Post',
        )
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Header background',
        'id' => 'header_bg',
        'desc' => '',
        'default' => THEMEROOTURL . '/img/header_bg.jpg'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Default background image',
        'id' => 'bg_img',
        'desc' => '',
        'default' => THEMEROOTURL . '/img/def_bg.jpg'
    )),
    new UploadOption_admin_theme(array(
        'type' => 'upload',
        'name' => 'Default background pattern',
        'id' => 'bg_pattern',
        'desc' => '',
        'default' => THEMEROOTURL . '/img/def_pattern.jpg'
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Menu type',
        'id' => 'menu_type',
        'desc' => '',
        'default' => 'vertical',
        'options' => array(
            'vertical' => 'Side',
            'horizontal' => 'Top'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Title area',
        'id' => 'show_title_area',
        'desc' => '',
        'default' => 'yes',
        'options' => array(
            'yes' => 'Show',
            'no' => 'Hide'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Breadcrumb area',
        'id' => 'show_breadcrumb_area',
        'desc' => '',
        'default' => 'yes',
        'options' => array(
            'yes' => 'Show',
            'no' => 'Hide'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Related Posts',
        'id' => 'related_posts',
        'desc' => '',
        'default' => 'on',
        'options' => array(
            'on' => 'On',
            'off' => 'Off'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Portfolio comments',
        'id' => 'portfolio_comments',
        'desc' => '',
        'default' => 'disabled',
        'options' => array(
            'disabled' => 'Disabled',
            'enabled' => 'Enabled'
        )
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Page comments',
        'id' => 'page_comments',
        'desc' => '',
        'default' => 'disabled',
        'options' => array(
            'disabled' => 'Disabled',
            'enabled' => 'Enabled'
        )
    )),	
    new TextOption_admin_theme(array(
        'name' => 'Fullscreen blog Items per page',
        'id' => 'fw_posts_per_page',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '12'
    )),
    new TextOption_admin_theme(array(
        'name' => 'Fullscreen Portfolio Items per page',
        'id' => 'fw_port_per_page',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '12'
    )),
    new TextareaOption_admin_theme(array(
        'name' => 'Custom CSS',
        'id' => 'custom_css',
        'default' => ''
    )),
)));


$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Color Options',
    'icon' => 'colors.png',
    'icon_active' => 'colors_active.png',
    'icon_hover' => 'colors_hover.png'
), array(
    new ColorOption_admin_theme(array(
        'name' => 'Theme color',
        'id' => 'color_theme',
        'desc' => '',
        'not_empty' => 'true',
        'default' => 'd42d2d'
    )),
)));

$gt3_tabs_admin_theme->add(new Tab_admin_theme(array(
    'name' => 'Woocommerce',
    'icon' => 'shop.png',
    'icon_active' => 'shop_active.png',
    'icon_hover' => 'shop_hover.png'
), array(
    new DescHeading_admin_theme(array(
        'id' => 'main_description',
		'text' => 'This section becomes active once the WooCommerce plugin is installed.'
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Shop layout',
        'id' => 'woo_shop_layout',
        'default' => 'boxed',
        'options' => array(
            'boxed' => 'Boxed',
            'fullscreen' => 'Fullscreen'
        ),
		'desc' => 'Please choose Boxed or Fullscreen layout for your shop.'
    )),
    new SelectOption_admin_theme(array(
        'name' => 'Header shopping cart',
        'id' => 'woo_shop_header_cart',
        'default' => 'yes',
        'options' => array(
            'yes' => 'Show',
            'no' => 'Hide'
        ),
        'desc' => 'Please choose show or hide header shopping cart.'
    )),
	new TextOption_admin_theme(array(
        'name' => 'Shop items per page',
        'id' => 'woo_shop_items_per_page',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '9',
		'desc' => 'Please enter the number of items to display on the page.'
    )),
	new TextOption_admin_theme(array(
        'name' => 'Shop related products',
        'id' => 'woo_related_products',
        'not_empty' => true,
        'width' => '100px',
        'textalign' => 'center',
        'default' => '3',
		'desc' => 'Please enter the number of related products.'
    ))
)));

?>