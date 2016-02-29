<?php
/**
 * Дефолтный контроллер сайта:
 *
 * @category YupeController
 * @package  yupe.controllers
 * @author   YupeTeam <team@yupe.ru>
 * @license  BSD http://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_BSD
 * @version  0.5.3 (dev)
 * @link     http://yupe.ru
 *
 **/
namespace application\controllers;

use yupe\components\controllers\FrontController;

class SiteController extends FrontController
{
    /**
     * Отображение главной страницы
     *
     * @return void
     */
    public function actionIndex()
    {
        $this->render('index');
    }

    public function actionGetPositions()
    {
        //$branches = [];
        //$array = [];
        $array = \Yii::app()->db->createCommand()
            ->select('b.id, a.name, b.alias, b.capacity')
            ->from('spbp_branch_branch a')
            ->join('spbp_branch_room b','a.id = b.branch_id;')
            ->queryAll();
//        $models = \Room::model()->with('branch')->findAll();

        if ((isset($_GET['listenerId']))&&($_GET['listenerId']!=null)){
            echo "Listener";
        } else if ((isset($_GET['teacherId']))&&($_GET['teacherId']!=null)) {
            echo "Teacher";
        } else {
            echo \CJSON::encode($array);
        }
    }

    /**
     * Отображение для ошибок:
     *
     * @return void
     */
    public function actionError()
    {   
        $error = \Yii::app()->errorHandler->error;
        
        if (empty($error) || !isset($error['code']) || !(isset($error['message']) || isset($error['msg']))) {
            $this->redirect(['index']);
        }

        if (!\Yii::app()->getRequest()->getIsAjaxRequest()) {

            $this->render(
                'error',
                [
                    'error' => $error
                ]
            );
        }
    }
    public function actionSchedule()
    {
        $this->render('schedule');
    }
}
