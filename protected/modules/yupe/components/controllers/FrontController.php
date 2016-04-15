<?php
/**
 * Базовый класс для всех контроллеров публичной части
 *
 * @category YupeComponents
 * @package  yupe.modules.yupe.components.controllers
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @version  0.6
 * @link     http://yupe.ru
 **/

namespace yupe\components\controllers;

use Yii;
use yupe\events\YupeControllerInitEvent;
use yupe\events\YupeEvents;
use application\components\Controller;

/**
 * Class FrontController
 * @package yupe\components\controllers
 */
abstract class FrontController extends Controller
{
    public $mainAssets;

    /**
     * Вызывается при инициализации FrontController
     * Присваивает значения, необходимым переменным
     */
    public function init()
    {
        Yii::app()->eventManager->fire(YupeEvents::BEFORE_FRONT_CONTROLLER_INIT, new YupeControllerInitEvent($this, Yii::app()->getUser()));

        parent::init();

        Yii::app()->theme = $this->yupe->theme ?: 'default';

        $this->mainAssets = Yii::app()->getTheme()->getAssetsUrl();

        $bootstrap = Yii::app()->getTheme()->getBasePath() . DIRECTORY_SEPARATOR . "bootstrap.php";

        if (is_file($bootstrap)) {
            require $bootstrap;
        }
    }
//    public function filters()
//    {
//        return Yii::app()->getModule('yupe')->getFrontFilters();
//    }
    protected function beforeAction($action)
    {
        parent::beforeAction($action);
        if(\Yii::app()->user->isGuest){
            if($action->id == 'login')
                return true;
            $this->redirect(Yii::app()->createUrl('login'));
        }else{
            return true;
        }
        
    }
    protected function gavno(){
        $position = [];
        $list = \Schedule::model()->findAllBySql('select * from spbp_listner_schedule a
                join spbp_listner_position b on a.position_id = b.id
                join spbp_form_form c on b.form_id = c.id
                where a.number = c.number AND a.end_time < now() AND b.status = 1');

        foreach($list as $value){
            $a = \Position::model()->findByPk($value->position_id);

            array_push($position,$a);
        }
        return $position;
    }
}
