<?php
/*
Plugin Name: WWW Kalipso Plugin
Plugin URI: https://github.com/wwwkalipso/www-kalipso-plugin
Description: WWW Kalipso of the plugin.
Version: 1.0
Author: Datsenko Elen
Text Domain: wwwkalipso-development-plugin
Domain Path: /languages/
License: A "Slug" license name e.g. GPL2
    Copyright 2017  Datsenko Elen  (email: 
datsenkolena@gmail.com)
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once plugin_dir_path(__FILE__) . '/config-path.php';
require_once WWWKALIPSO_PlUGIN_DIR.'/includes/common/WWWKalipsoAutoload.php';
require_once WWWKALIPSO_PlUGIN_DIR.'/includes/WWWKalipsoPlugin.php';

//Регистрация виджета
add_action('widgets_init', create_function('', 'return register_widget("includes\widgets\WWWKalipsoGooglePlaceWidget");'));

register_activation_hook( __FILE__, array('includes\WWWKalipsoPlugin' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('includes\WWWKalipsoPlugin' ,  'deactivation' ) );


