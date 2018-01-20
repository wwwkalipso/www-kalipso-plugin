<?php

define("WWWKALIPSO_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("WWWKALIPSO_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("WWWKALIPSO_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(WWWKALIPSO_PlUGIN_DIR)));
define("WWWKALIPSO_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', WWWKALIPSO_PlUGIN_SLUG ));
define("WWWKALIPSO_PlUGIN_OPTION_VERSION", WWWKALIPSO_PlUGIN_SLUG.'_version');
define("WWWKALIPSO_PlUGIN_OPTION_NAME", WWWKALIPSO_PlUGIN_SLUG.'_options');
define("WWWKALIPSO_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));

if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(WWWKALIPSO_PlUGIN_DIR.'/'.basename(WWWKALIPSO_PlUGIN_DIR).'.php', false, false);

define("WWWKALIPSO_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("WWWKALIPSO_PlUGIN_NAME", $TPOPlUGINs['Name']);

define("WWWKALIPSO_PlUGIN_DIR_LOCALIZATION", plugin_basename(WWWKALIPSO_PlUGIN_DIR.'/languages/'));