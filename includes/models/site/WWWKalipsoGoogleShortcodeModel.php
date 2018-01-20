<?php

namespace includes\models\site;
use includes\common\WWWKalipsoGoogleRequestApi;
use includes\controllers\admin\menu\WWWKalipsoICreatorInstance;

class WWWKalipsoGoogleShortcodeModel implements WWWKalipsoICreatorInstance
{
    public function __construct() {
    }
    /**
     * Получения данных от кэша если данных нет в кэше запросить от сервера и записать в кэш
     * @param $city
     * @return array|bool
     */
    public function getData($city){
        error_log("model{$city}");
        $cacheKey = "";
        $data = array();
        $cacheKey = $this->getCacheKey($city);
        if ( false === ($data = get_transient($cacheKey))) {
            $reuestAPI = WWWKalipsoGoogleRequestApi::getInstance();
            $data = $reuestAPI->getPlaceGoogle($city);
            set_transient($cacheKey, $data, 100);
        }
        return $data;
    }
    /**
     * Создает ключ для кэша
     */
    public function getCacheKey($city){
        return WWWKALIPSO_PlUGIN_TEXTDOMAIN
            ."_google_location_{$city}";
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}