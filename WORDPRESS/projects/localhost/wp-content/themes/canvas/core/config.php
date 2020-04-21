<?php

define("GT3_THEMENAME", "Canvas");
define("GT3_THEMESHORT", "canvas_");
define("IMGURL", get_template_directory_uri() . "/img");
define("THEMEROOTURL", get_template_directory_uri());

if (!defined("GT3THEME_INSTALLED")) {
    define("GT3THEME_INSTALLED", true);
}

$GLOBALS['available_socials'] = array(
    array(
        "uniqid" => "social_flickr",
        "class" => "socials s_flickr",
        "target" => "_blank",
        "title" => "Flickr"
    ),
    array(
        "uniqid" => "social_pinterest",
        "class" => "socials s_pinterest",
        "target" => "_blank",
        "title" => "Pinterest"
    ),
    array(
        "uniqid" => "social_youtube",
        "class" => "socials s_youtube",
        "target" => "_blank",
        "title" => "YouTube"
    ),
    array(
        "uniqid" => "social_instagram",
        "class" => "socials s_instagram",
        "target" => "_blank",
        "title" => "Instagram"
    ),
    array(
        "uniqid" => "social_dribbble",
        "class" => "socials s_dribbble",
        "target" => "_blank",
        "title" => "Dribbble"
    ),
    array(
        "uniqid" => "social_facebook",
        "class" => "socials s_facebook",
        "target" => "_blank",
        "title" => "Facebook"
    ),
    array(
        "uniqid" => "social_twitter",
        "class" => "socials s_twitter",
        "target" => "_blank",
        "title" => "Twitter"
    ),
    array(
        "uniqid" => "social_linked_in",
        "class" => "socials s_linked_in",
        "target" => "_blank",
        "title" => "LinkedIn"
    ),
    array(
        "uniqid" => "social_delicious",
        "class" => "socials s_delicious",
        "target" => "_blank",
        "title" => "Delicious"
    ),
    array(
        "uniqid" => "social_vimeo",
        "class" => "socials s_vimeo",
        "target" => "_blank",
        "title" => "Vimeo"
    ),
    array(
        "uniqid" => "social_tumblr",
        "class" => "socials s_tumblr",
        "target" => "_blank",
        "title" => "Tumblr"
    ),
    array(
        "uniqid" => "social_gplus",
        "class" => "socials s_gplus",
        "target" => "_blank",
        "title" => "Google plus"
    ),
);

?>