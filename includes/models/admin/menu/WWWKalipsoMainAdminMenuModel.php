<?php

namespace includes\models\admin\menu;
use includes\controllers\admin\menu\WWWKalipsoICreatorInstance;
class WWWKalipsoMainAdminMenuModel implements WWWKalipsoICreatorInstance
{
    public function __construct(){
        add_action( 'admin_init', array( &$this, 'createOption' ) );
        error_log(1);
    }
    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции
     */
    public function createOption()
    {

        // register_setting( $option_group, $option_name, $sanitize_callback );
        // Регистрирует новую опцию
        register_setting('WWWKalipsoMainSettings', WWWKALIPSO_PlUGIN_OPTION_NAME, array(&$this, 'saveOption'));
        // add_settings_section( $id, $title, $callback, $page );
        // Добавление секции опций

        add_settings_section( 'www_kalipso_key_id', __('Key', WWWKALIPSO_PlUGIN_TEXTDOMAIN), '', 'www-kalipso-plugin' );
        // add_settings_field( $id, $title, $callback, $page, $section, $args );
        // Добавление полей опций

        add_settings_field(
            'www_kalipso_key_id',
            __('Key', WWWKALIPSO_PlUGIN_TEXTDOMAIN),
            array(&$this, 'keyField'),
            'www-kalipso-plugin',
            'www_kalipso_key_id'
        );
    }

    public function keyField(){
        $option = get_option(WWWKALIPSO_PlUGIN_OPTION_NAME);
        ?>
        <input type="text"
               name="<?php echo WWWKALIPSO_PlUGIN_OPTION_NAME; ?>[key]"
               value="<?php echo esc_attr( $option['key'] ) ?>" />
        <?php
       
    }
    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input)
    {

        return $input;
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}