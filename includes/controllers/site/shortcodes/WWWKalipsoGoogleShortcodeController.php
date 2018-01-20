<?php

namespace includes\controllers\site\shortcodes;
use includes\common\WWWKalipsoRequestApi;
use includes\controllers\admin\menu\WWWKalipsoICreatorInstance;

use includes\models\site\WWWKalipsoGoogleShortcodeModel;
class WWWKalipsoGoogleShortcodeController extends WWWKalipsoShortcodesController implements WWWKalipsoICreatorInstance
{
    public $model;
    public function __construct() {
        parent::__construct();
        $this->model = WWWKalipsoGoogleShortcodeModel::newInstance();
    }
    /**
     * Функция в которой будем добалять шорткоды через функцию add_shortcode( $tag , $func );
     * @return mixed
     */
    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.
        /*
         * Добавляем щорткод [step_by_step_calendar_price_month]
         */
        add_shortcode( 'wwwkalipso_google', array(&$this, 'action'));
    }
    /**
     * Функция обработки шоткода
     * Функция указанная в параметре $func, получает 3 параметра, каждый из них может быть передан,
     * а может нет:
     * $atts(массив)
     *      Ассоциативный массив атрибутов указанных в шоткоде. По умолчанию пустая строка - атрибуты
     *      не переданы.
     *      По умолчанию: ''
     * $content(строка)
     *      Текст шоткода, когда используется закрывающая конструкция шотркода: [foo]текст шорткода[/foo]
     *      По умолчанию: ''
     * $tag(строка)
     *      Тег шорткода. Может пригодится для передачи в доп. функции. Пр: если шорткод - [foo],
     *      то тег будет - foo.
     *      По умолчанию: текущий тег
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return mixed
     */
    public function action($atts = array(), $content = '', $tag = '')
    {
        // TODO: Implement action() method.
        /**
         * Объединяет атрибуты (параметры) шоткода с известными атрибутами, остаются только известные
         * атрибуты. Устанавливает значения атрибута по умолчанию, если он не указан.
         */
        $atts = shortcode_atts( array(
            'city' => '',
        ), $atts, $tag );

        $data = $this->model->getData($atts['city']);
        if ($data == false) return false;
        return $this->render($data);
    }
    /**
     * Функция отвечающа за вывод обработаной информации шорткодом
     * @param $data
     * @return mixed
     */
    public function render($data)
    {
        // TODO: Implement render() method.

        $output = '';


        foreach ($data as $row) {

            $output .= '<form class="www_custom"   method="post">
                            <div >
                                <label>'.__('Restoraunt', WWWKALIPSO_PlUGIN_TEXTDOMAIN ).'</label>
                                <input  type="text" name="www_restotaunt_name" class="www-restotaunt-name"  
                                value="'.str_replace('"',"'",$row->name).'" readonly="readonly" ><br>
                                
                                <label>'.__('Address', WWWKALIPSO_PlUGIN_TEXTDOMAIN ).'</label>
                                <input type="text" name="www_address" class="www-address" 
                                value="'.str_replace('"',"'",$row->formatted_address).'" readonly="readonly"><br>
                                 
                                <label>'.__('Rating', WWWKALIPSO_PlUGIN_TEXTDOMAIN ).'</label>
                                <input type="text" name="www_rating" class="www-rating" value="'.$row->rating.'" readonly="readonly"><br>
                                
                                <input type="hidden" name="www_place_id" class="www-place_id" value="'.$row->place_id.'">
                                <button class="wwwkalipso-google-place-btn-add" >'.__('Add', WWWKALIPSO_PlUGIN_TEXTDOMAIN ).'</button> 
                            </div>         
                       </form>';

        }
        return $output;
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}