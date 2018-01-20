<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 16.02.17
 * Time: 16:08
 */
namespace includes\models\site;
class WWWKalipsoGooglePlaceSubMenuModel
{
    //Название таблицы
    const WWWKALIPSO_TABLE_NAME = "www_kalipso_google_place";
    /**
     * Возвращает название таблицы с префиксом WordPress тот что задаеться при установке
     * всем таблицам
     * @return string
     */
    static public function getTableName(){
        global $wpdb;
        return $wpdb->prefix .static::WWWKALIPSO_TABLE_NAME;
    }

    /**
     * Получает по ID строку в таблице
     * @return mixed
     */
    static public function getById($id){
        global $wpdb;
        $data = $wpdb->get_row("SELECT * FROM ".self::getTableName()." WHERE id= ". $id, ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }
    /**
     * Вставляет данные в таблицу
     * @param $data
     * @return mixed
     */
    static public function insert($data){
        global $wpdb;
        $id = $wpdb->insert( self::getTableName(), $data);
        return $id;
    }

    /**
     * Метод получает все записи в таблице
     * @return bool
     */
    static public function getAll()
    {
        // TODO: Implement getAll() method.
        global $wpdb;
        $data = $wpdb->get_results( "SELECT * FROM ".self::getTableName()." ORDER BY id DESC", ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }
    static public function getLast()
    {
        // TODO: Implement getAll() method.
        global $wpdb;
        $data = $wpdb->get_results( "SELECT * FROM ".self::getTableName()." ORDER BY id DESC LIMIT 5", ARRAY_A);
        if(count($data) > 0) return $data;
        return false;
    }
}