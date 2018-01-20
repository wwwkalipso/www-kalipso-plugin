<?php
namespace includes\common;

use includes\ajax\WWWKalipsoGuestBookAjaxHandler;
use includes\ajax\WWWKalipsoGooglePlaceAjaxHandler;
use includes\controllers\admin\menu\WWWKalipsoMainAdminMenuController;
use includes\controllers\admin\menu\WWWKalipsoMainAdminSubMenuController;
use includes\controllers\site\shortcodes\WWWKalipsoGoogleShortcodeController;
use includes\widgets\WWWKalipsoGooglePlaceDashboardWidget;

class WWWKalipsoLoader
{
    private static $instance = null;
    private function __construct(){
        // is_admin() Условный тег. Срабатывает когда показывается админ панель сайта (консоль или любая
        // другая страница админки).
        // Проверяем в админке мы или нет
        if ( is_admin() ) {
            // Когда в админке вызываем метод admin()

            $this->admin();
        } else {
            // Когда на сайте вызываем метод site()
            $this->site();
        }
        $this->all();
    }
    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    /**
     * Метод будет срабатывать когда вы находитесь в Админ панеле. Загрузка классов для Админ панели
     */
    public function admin(){
        WWWKalipsoMainAdminMenuController::newInstance();
        WWWKalipsoMainAdminSubMenuController::newInstance();
        WWWKalipsoGooglePlaceDashboardWidget::newInstance();
    }
    /**
     * Метод будет срабатывать когда вы находитесь Сайте. Загрузка классов для Сайта
     */
    public function site()
    {
        WWWKalipsoGoogleShortcodeController::newInstance();
    }
    /**
     * Метод будет срабатывать везде. Загрузка классов для Админ панеле и Сайта
     */
    public function all(){

        WWWKalipsoLocalization::getInstance();
        WWWKalipsoLoaderScript::getInstance();
        // подключаем ajax обработчик
        WWWKalipsoGooglePlaceAjaxHandler::newInstance();

    }
}