<?php

namespace includes\controllers\admin\menu;

use includes\models\admin\menu\WWWKalipsoMainAdminMenuModel;
use includes\common\WWWKalipsoRequestApi;
use includes\common\WWWKalipsoGoogleRequestApi;

 class WWWKalipsoMainAdminMenuController extends WWWKalipsoBaseAdminMenuController
 {
     public $model;
     public function __construct(){
         parent::__construct();
         $this->model = WWWKalipsoMainAdminMenuModel::newInstance();
     }

     public function action()
     {
               // TODO: Implement action() method.
                /**
                 * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
                 *
                 */
         $pluginPage = add_menu_page(
             _x(
                 'WWWKalipso',
                 'admin menu page' ,
                 WWWKALIPSO_PlUGIN_TEXTDOMAIN
             ),
             _x(
                 'WWWKalipso',
                 'admin menu page' ,
                 WWWKALIPSO_PlUGIN_TEXTDOMAIN
             ),
             'manage_options',
             WWWKALIPSO_PlUGIN_TEXTDOMAIN,
             array(&$this,'render'),
             WWWKALIPSO_PlUGIN_URL .'assets/images/main-menu.png'
         );
     }

     /**
      * Метод отвечающий за контент страницы
      */
     public function render()
     {
         // TODO: Implement render() method.

         $pathView = WWWKALIPSO_PlUGIN_DIR."/includes/views/admin/menu/WWWKalipsoMainAdminMenu.view.php";

         $this->loadView($pathView);

     }

     public static function newInstance()
     {
                // TODO: Implement newInstance() method.
                $instance = new self;
                return $instance;
     }
 }