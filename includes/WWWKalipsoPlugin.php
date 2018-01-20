<?php
namespace includes;

use includes\common\WWWKalipsoDefaultOption;
use includes\common\WWWKalipsoLoader;

use includes\models\admin\menu\WWWKalipsoGooglePlaceSubMenuModel;
use includes\models\admin\menu\WWWKalipsoGuestBookSubMenuModel;
class WWWKalipsoPlugin
{
    private static $instance = null;
    private function __construct() {
        WWWKalipsoLoader::getInstance();
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));


        add_action( 'admin_nopriv_contact_form', array(&$this,'prefix_send_email_to_admin') );

        add_action( 'admin_contact_form', array(&$this,'prefix_send_email_to_admin') );
        // Создаем Custom Post Type Book
        //new BookPostType();
    }
    public static function getInstance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function prefix_send_email_to_admin()
    {

    }

        /**
     * Если не созданные настройки установить по умолчанию
     */
    public function setDefaultOptions(){
        if( ! get_option(WWWKALIPSO_PlUGIN_OPTION_NAME) ){
            update_option( WWWKALIPSO_PlUGIN_OPTION_NAME, WWWKalipsoDefaultOption::getDefaultOptions() );
        }
        if( ! get_option(WWWKALIPSO_PlUGIN_OPTION_VERSION) ){
            update_option(WWWKALIPSO_PlUGIN_OPTION_VERSION, WWWKALIPSO_PlUGIN_VERSION);
        }
    }
    static public function activation()
    {
        // debug.log
        //error_log('plugin '.WWWKALIPSO_PlUGIN_NAME.' activation');
        //Создание таблицы Гостевой книги
        //WWWKalipsoGuestBookSubMenuModel::createTable();
        WWWKalipsoGooglePlaceSubMenuModel::createTable();
    }
    static public function deactivation()
    {
        // debug.log
        //error_log('plugin '.WWWKALIPSO_PlUGIN_NAME.' deactivation');
        delete_option(WWWKALIPSO_PlUGIN_OPTION_NAME);
        delete_option(WWWKALIPSO_PlUGIN_OPTION_VERSION);

        //WWWKalipsoGuestBookSubMenuModel::deleteTable();
        WWWKalipsoGooglePlaceSubMenuModel::deleteTable();
    }
}
WWWKalipsoPlugin::getInstance();