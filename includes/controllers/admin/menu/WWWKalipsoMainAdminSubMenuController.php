<?php

namespace includes\controllers\admin\menu;

use includes\models\admin\menu\WWWKalipsoGooglePlaceSubMenuModel;

class WWWKalipsoMainAdminSubMenuController extends WWWKalipsoBaseAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_submenu_page(
            WWWKALIPSO_PlUGIN_TEXTDOMAIN,
            _x(
                'Google place restoraunt',
                'admin menu page' ,
                WWWKALIPSO_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Google place restoraunt',
                'admin menu page' ,
                WWWKALIPSO_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'wwwkalipso_control_sub_menu',
            array(&$this, 'render'));
    }
    public function render()
    {
        // TODO: Implement render() method.

        $action = isset($_GET['action']) ? $_GET['action'] : null ;
        //Данные которые будут передаваться в view
        $data = array();
        $pathView = WWWKALIPSO_PlUGIN_DIR;
        /*
         * Используем switch чтобы определить какой сейчас  $_GET['action']
         */
        error_log($action);
        switch($action) {

            case "update_option":
                $this->redirect("admin.php?page=wwwkalipso_control_sub_menu&rrr=ooo");
                break;
            // Подгружаем view для добавление данных в таблицу

            case "add_data":

                break;
            // Сохранение данных в таблицу
            // admin.php?page=wwwkalipso_control_guest_book_menu&action=insert_data
            case "insert_data":


                break;

            case "edit_data":
                /*
                 * Чтобы получить из таблицы запись которую редактировать мы используем $_GET['id'] параметр
                 * Проверяем его наличие и на пустоту
                */

                if(isset($_GET['id']) && !empty($_GET['id'])){
                    // Получаем данные записи в таблице по id затем эти данные передадим в view WWWKalipsoGooglePlaceSubMenuEdit.view
                    $data = WWWKalipsoGooglePlaceSubMenuModel::getById((int)$_GET['id']);
                    $pathView .= "/includes/views/admin/menu/WWWKalipsoGooglePlaceSubMenuEdit.view.php";

                    $this->loadView($pathView, 0, $data);
                }
                break;
            // Обновление редактированых данных в таблице
            // admin.php?page=wwwkalipso_control_guest_book_menu&action=update_data
            case "update_data":
                // Проверяем наличие $_POST данных от формы редактирования  WWWKalipsoGooglePlaceSubMenuModel.view.php

                if (isset($_POST)){
                    // Если данные есть то обновляем их в базе данных по ID
                    WWWKalipsoGooglePlaceSubMenuModel::updateById(
                        array(
                            'my_rating' => $_POST['my_rating'],

                        ), $_POST['id']
                    );
                    $this->redirect("admin.php?page=wwwkalipso_control_sub_menu");
                }
                break;
            // Удаление данных
            // admin.php?page=wwwkalipso_control_guest_book_menu&action=delete_data&id=ID записи
            case "delete_data":
                // Чтобы удалить определеную запись в таблице мы используем $_GET['id'] параметр
                // Проверяем его наличие и на пустоту
                if(isset($_GET['id']) && !empty($_GET['id'])){
                    WWWKalipsoGooglePlaceSubMenuModel::deleteById((int)$_GET['id']);
                }
                $this->redirect("admin.php?page=wwwkalipso_control_sub_menu");
                break;

            default:
                //Получение всех записей в таблице чтобы отобразить их view
                $data = WWWKalipsoGooglePlaceSubMenuModel::getAll();
                $pathView .= "/includes/views/admin/menu/WWWKalipsoGooglePlaceSubMenu.view.php";
                $this->loadView($pathView, 0, $data);
        }
    }
    /**
     * Метод перенаправления на нужную страницу
     * @param string $page
     */
    public function redirect($page = ''){
        echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}