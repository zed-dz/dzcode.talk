<?php

#main config
require_once("config.php");
require_once("update_parameters.php");

require_once("aq_resizer.php");

#classes
require_once("classes/admin-tabs-controls.php");
require_once("classes/admin-tabs-option-types.php");
require_once("classes/admin-tabs-list.php");
require_once("classes/global-js-message.php");
require_once("classes/menu-walker.php");

#all registration
require_once("registrator/admin-pages.php");
require_once("registrator/css-js.php");
require_once("registrator/ajax-handlers.php");
require_once("registrator/sidebars.php");
require_once("registrator/fonts.php");
require_once("registrator/misc.php");

#license verification
require_once("license_verification/license_verification.php");

#admin
require_once("admin/options.php");
require_once("admin/theme-settings-page.php");

#widgets
if (function_exists('gt3_add_widget_to_theme')) {
    gt3_add_widget_to_theme();
}

#TGM init
require_once("tgm/gt3-tgm.php");

require_once("updates-notifier.php");

?>