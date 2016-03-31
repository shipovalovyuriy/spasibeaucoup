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
        $branch = \Branch::model()->findAll();
        $teacher = \Teacher::model()->findAll();
        $this->render('index', [
            'branchs' => $branch,
            'teachers' => $teacher
        ]);
    }

    public function actionGetPositions($param1)
    {
        //$branches = [];
        //$array = [];
        $array = \Yii::app()->db->createCommand()
            ->select('b.id, a.name, b.alias, b.capacity')
            ->from('spbp_branch_branch a')
            ->join('spbp_branch_room b', 'a.id = b.branch_id')
            ->where('b.branch_id=:id', array(':id' => $param1))
            ->queryAll();
//        $models = \Room::model()->with('branch')->findAll();
        echo \CJSON::encode($array);
    }

    public function actionGetSchedules($param1, $param2)
    {
        $arr = [];
        $arrs = [];
        if ($param1 == "1") {
            $array = \Yii::app()->db->createCommand()
                ->select('b.id, c.code, z.lastname, b.start_time, b.end_time, b.room_id, d.name,d.color')
                ->from('spbp_user_user a')
                ->join('spbp_user_teacher f','a.id = f.user_id')
                ->join('spbp_listner_position c', 'c.teacher_id = f.id')
                ->join('spbp_listner_schedule b', 'c.id = b.position_id')
                ->join('spbp_listner_listner z','z.id = c.listner_id')
                ->join('spbp_subject_subject d', 'd.id = c.subject_id')
                ->where('f.id =:id',array(":id"=>$param2))
                ->queryAll();
        }else if($param1=="2"){
            $array = \Yii::app()->db->createCommand()
                ->select('b.id, c.code, a.last_name as lastname, b.start_time, b.end_time, b.room_id, d.name,d.color')
                ->from('spbp_user_user a')
                ->join('spbp_user_teacher f','a.id = f.user_id')
                ->join('spbp_listner_position c', 'c.teacher_id = f.id')
                ->join('spbp_listner_schedule b', 'c.id = b.position_id')
                ->join('spbp_subject_subject d', 'd.id = c.subject_id')
                ->where('a.id =:id',array(":id"=>$param2))
                ->queryAll();
        }else if(($param1==0)&&($param2==0)){
        $array = \Yii::app()->db->createCommand()
            ->select('b.id, c.code, concat(a.last_name," - ",z.lastname) as lastname, b.start_time, b.end_time, b.room_id, d.name,d.color')
            ->from('spbp_user_user a')
            ->join('spbp_user_teacher f','a.id = f.user_id')
            ->join('spbp_listner_position c', 'c.teacher_id = f.id')
            ->join('spbp_listner_listner z','z.id = c.listner_id')
            ->join('spbp_listner_schedule b', 'c.id = b.position_id')
            ->join('spbp_subject_subject d', 'd.id = c.subject_id')
            ->queryAll();
    }

        foreach ($array as $row) {
            $arrs['id'] = $row['id'];
            $arrs['resourceId'] = $row['room_id'];
            $arrs['start'] = $row['start_time'];
            $arrs['end'] = $row['end_time'];
            $arrs['title'] = '('.$row['code'].')';
            $arrs['desc'] = $row['lastname'];
            $arrs['subj'] = '('.$row['name'].')';
            $arras['height'] = '100px';
            $arrs['backgroundColor']='#'.$row['color'];
            array_push($arr, $arrs);

        }
        echo \CJSON::encode($arr);
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

    public function actionSchedule($id)
    {
        $model = \Branch::model()->findByPk($id)->id;
        $this->render('schedule',[
            'model' => $model
        ]);
    }
    public function actionBranch()
    {
        $model = \Branch::model()->findAll();
        $this->render('branch', ['model' => $model]);
    }
}
