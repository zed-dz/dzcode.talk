<?php

global $gt3_theme_pagebuilder;

if (isset($gt3_theme_pagebuilder['settings']['layout-sidebars']) && $gt3_theme_pagebuilder['settings']['layout-sidebars'] == "right-sidebar") {
    echo "<div class='right-sidebar-block span3'>";
    dynamic_sidebar((isset($gt3_theme_pagebuilder['settings']['selected-sidebar-name']) ? $gt3_theme_pagebuilder['settings']['selected-sidebar-name'] : "Default"));
    echo "</div>";
}

?>