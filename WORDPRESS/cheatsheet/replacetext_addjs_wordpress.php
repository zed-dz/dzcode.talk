- to edit php files of any wordpress theme go to the cpanel or just go to theme editor and locate
functions.php and add your global function to rule them all !!

// add javascript file to a specific location
function header_scroll_hide() {
// put our script to the queue of the php file
// uri if you have multiple themes (child themes) installed or url if you have only one theme
wp_enqueue_script( 'header_hide', get_template_directory_uri() . '/js/header_hide.js');
}
// add_action('wp_enqueue_scripts','header_scroll_hide');
// call the js script file in the head of the html, or in the footer 'wp_footer'
add_action('wp_head', 'header_scroll_hide');

/* Change Text Site Wide */

function wpfi_change_text( $translated_text ) {

if ( $translated_text == 'Add New Property' ) {
$translated_text = 'Add Property';
}
if ( $translated_text == 'Ajouter une nouvelle propriété' ) {
$translated_text = 'Ajouter propriété';
}
return $translated_text;
}
// gettext() php function to get the text
// add_filter() wordpress function that execute php functions with a specific range
// add_filter(phpfunc(), namefunc(); range)
add_filter( 'gettext', 'wpfi_change_text', 20 );
