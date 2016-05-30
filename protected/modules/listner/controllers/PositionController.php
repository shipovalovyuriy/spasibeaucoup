<?php

/**
 * Класс PositionController:
 *
 * @category Yupe\yupe\components\controllers\FrontController
 * @package  yupe
 * @author   Yupe Team <team@yupe.ru>
 * @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 * @link     http://yupe.ru
 **/
class PositionController extends \yupe\components\controllers\FrontController
{
    /**
     * Отображает Положение по указанному идентификатору
     *
     * @param integer $id Идинтификатор Положение для отображения
     *
     * @return void
     */
    public function actionView($id)
    {
        $roles = ['1','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
            $this->render('view', ['model' => $this->loadModel($id)]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    /**
     * Создает новую модель Положения.
     * Если создание прошло успешно - перенаправляет на просмотр.
     *
     * @return void
     */
    public function actionCreate($id)
    {
        $roles = ['1','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles) && !isset($_GET['parent_id'])){
            $model = new Position;
            $listner = Listner::model()->findByPk($id)->branch_id;
            if (Yii::app()->getRequest()->getPost('Position') !== null) {
                $model->setAttributes(Yii::app()->getRequest()->getPost('Position'));
                $model->listner_id = $id;
                if(isset($_POST['group'])){
                    $model->group = $_POST['group'];
                }else {$model->group=NULL;}
                if(isset($_POST['hui'])){
                $model->hui = $_POST['hui'];}
                else {$model->hui=NULL;}
                if(!$model->group_id){
                    if ($model->save()) {
                        Yii::app()->user->setFlash(
                            yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                            Yii::t('ListnerModule.listner', 'Запись добавлена!')
                        );

                        $this->redirect('/listner/view/'.$id);
                    }
                }
            }
            $this->render('create', ['model' => $model, 'listner' => $listner]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }
    
    
    
    public function actionCreateNext($id,$parent_id)
    {
        $roles = ['1','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)){
            $model = new Position;
            $listner = Listner::model()->findByPk($id)->branch_id;
            if (Yii::app()->getRequest()->getPost('Position') !== null) {
                $model->setAttributes(Yii::app()->getRequest()->getPost('Position'));
                $model->parent_id = $parent_id;
                if($model->prev->first_parent){
                    $model->first_parent = $model->prev->first_parent;
                }else{
                    $model->first_parent = $model->prev->id;
                }
                if(in_array('3', $role) && !in_array('1', $role)){
                    $model->branch_id = Yii::app()->user->branch->id;
                }
                $model->listner_id = $id;
                if ($model->save()) {
                    Yii::app()->user->setFlash(
                        yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                        Yii::t('ListnerModule.listner', 'Запись добавлена!')
                    );

                    $this->redirect(
                        (array)Yii::app()->getRequest()->getPost(
                            'submit-type',
                            [
                                'update',
                                'id' => $model->id
                            ]
                        )
                    );
                }
            }
            $this->render('create', ['model' => $model, 'listner' => $listner]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }
    
    public function actionCreateNextGroup($id,$parent_group){
        $roles = ['1','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)){
            $model = new Position;
            $listner = Listner::model()->findByPk($id)->branch_id;
            if (Yii::app()->getRequest()->getPost('Position') !== null) {
                $model->setAttributes(Yii::app()->getRequest()->getPost('Position'));
                $model->parent_group = $parent_group;
//                if($model->prev->first_parent){
//                    $model->first_parent = $model->prev->first_parent;
//                }else{
//                    $model->first_parent = $model->prev->id;
//                }
                if(in_array('3', $role) && !in_array('1', $role)){
                    $model->branch_id = Yii::app()->user->branch->id;
                }
                if(isset($_POST['group'])){
                    $model->group = $_POST['group'];
                }else {$model->group=NULL;}
                if(isset($_POST['hui'])){
                $model->hui = $_POST['hui'];}
                else {$model->hui=NULL;}
                $model->listner_id = $id;
                if (!$model->save()) {
                    die(var_dump($model->getErrors()));
                    Yii::app()->user->setFlash(
                        yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                        Yii::t('ListnerModule.listner', 'Запись добавлена!')
                    );

                    $this->redirect(
                        (array)Yii::app()->getRequest()->getPost(
                            'submit-type',
                            [
                                'update',
                                'id' => $model->id
                            ]
                        )
                    );
                }
            }
            $this->render('create', ['model' => $model, 'listner' => $listner]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    /**
     * Редактирование Положения.
     *
     * @param integer $id Идинтификатор Положение для редактирования
     *
     * @return void
     */
    public function actionUpdate($id)
    {
        $roles = ['1','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
            $model = $this->loadModel($id);

            if (Yii::app()->getRequest()->getPost('Position') !== null) {
                $model->setAttributes(Yii::app()->getRequest()->getPost('Position'));

                if ($model->save()) {
                    Yii::app()->user->setFlash(
                        yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                        Yii::t('ListnerModule.listner', 'Запись обновлена!')
                    );

                    $this->redirect(
                        (array)Yii::app()->getRequest()->getPost(
                            'submit-type',
                            [
                                'update',
                                'id' => $model->id
                            ]
                        )
                    );
                }
            }
            $this->render('update', ['model' => $model]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    /**
     * Удаляет модель Положения из базы.
     * Если удаление прошло успешно - возвращется в index
     *
     * @param integer $id идентификатор Положения, который нужно удалить
     *
     * @return void
     */
    public function actionDelete($id)
    {
        $roles = ['1','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
            if (Yii::app()->getRequest()->getIsPostRequest()) {
                // поддерживаем удаление только из POST-запроса
                $this->loadModel($id)->delete();

                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('ListnerModule.listner', 'Запись удалена!')
                );

                // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
                if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                    $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
                }
            } else
                throw new CHttpException(400, Yii::t('ListnerModule.listner', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    /**
     * Управление Положениями.
     *
     * @return void
     */
    public function actionIndex()
    {
        $roles = ['1','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
            $this->redirect('/listner/all');
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    public function actionOff(){

        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $pos = Position::model()->findByPk($id);
            $pos->status = 0;
            $pos->update();

            $listner = Listner::model()->findByPk($pos->listner_id);

            $criteria = new CDbCriteria();

            $criteria->condition = "listner_id=$listner->id and status = 1";

            $pos = Position::model()->findAll($criteria);

            if (!$pos){
                $listner->status = 2;
                $listner->update();
            }



        };
    }
    public function actionClose(){


        $position = $this->gavno();

        $this->render('close',['model'=>$position]);
    }

    /**
     * Возвращает модель по указанному идентификатору
     * Если модель не будет найдена - возникнет HTTP-исключение.
     *
     * @param integer идентификатор нужной модели
     *
     * @return void
     */
    public function loadModel($id)
    {
        $model = Position::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));

        return $model;
    }

    public function actionGetTeacher($time, $form, $subject, $branch)
    {
        if (Yii::app()->request->isAjaxRequest) {
            $times = explode(',', $time);
            $tCount = count($times);
            $crTimes = $times;
            $schedule = [];
            $j = 0;
            $k = 0;            
            $form = Form::model()->findByPk($form);
            for ($i = 0; $i < $tCount; $i++) {
                $times[$i] = substr($times[$i], strpos($times[$i], 'T') + 1);
            }
            for ($i = 0; $i < $form->number; $i++) {
                if ($j == $tCount) {
                    $j = 0;
                    $k++;
                }
                $schedule[$i] = str_replace(" ", "T", date('Y-m-d H:i:s', strtotime("+" . $k . "week", strtotime($crTimes[$j]))));
                $j++;
            }
            $condT = '';
            $condition = ''; 
            $first = 0;
            foreach ($times as $cr) {
                $condT .= " AND `t`.`start_time`<='$cr' AND SUBTIME(`t`.`end_time`,'01:00:00')>='$cr'";
            }
            foreach ($schedule as $sch) {
                if ($first == 0) {
                    $condition .= "`schedule`.`start_time` ='$sch'";
                    $first++;
                } else {
                    $condition .= " OR `schedule`.`start_time` ='$sch'";
                }
            }
            $models = Teacher::model()
                    ->with('user', 'schedule', 'subject')
                    ->findAllBySql("SELECT  `t`.* FROM spbp_user_teacher `t` "
                            . "WHERE `t`.`id` <> ALL("
                            . "SELECT `t`.`id` FROM spbp_user_teacher `t` JOIN spbp_listner_position `position` "
                            . "ON `position`.`teacher_id` = `t`.`id` JOIN spbp_listner_schedule `schedule` "
                            . "ON `schedule`.`position_id` = `position`.`id` WHERE $condition) $condT");
            $arr=[];
            foreach($models as $teacher){
                $checks = TeacherToSubject::model()->find("teacher_id=$teacher->id AND subject_id=$subject");
                if($checks['teacher_id'] == $teacher->id){
                    array_push($arr, $teacher);
                }
            }
            $arr1 = [];
            foreach($arr as $teacher){
                $checks = Teacher::model()->with('user', 'schedule', 'subject')->findAll('user_id='.$teacher->user_id);
                if(count($checks)>1){
                    foreach($checks as $check){
                        if ($check->branch_id == $branch){array_push($arr1,$check);}
                    }
                }else{
                    array_push($arr1,$teacher);
                }
            }
            echo CJSON::encode($this->convertModelToArray($arr1));
            Yii::app()->end();
        } else {
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }

    public function convertModelToArray($models)
    {
        if (is_array($models))
            $arrayMode = TRUE;
        else {
            $models = array($models);
            $arrayMode = FALSE;
        }

        $result = [];
        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $relations = [];
            foreach ($model->relations() as $key => $related) {
                if ($model->hasRelated($key)) {
                    $relations[$key] = $this->convertModelToArray($model->$key);
                }
            }
            $all = array_merge($attributes, $relations);

            if ($arrayMode)
                array_push($result, $all);
            else
                $result = $all;
        }
        return $result;
    }
    
    public function actionDoc($id){
        $model = Position::model()->findByPk($id);
        $admin = User::model()->findBySql('SELECT * FROM spbp_user_user t1 JOIN spbp_user_role_to_user t2 ON t2.user_id = t1.id WHERE t2.role_id = 3 AND t1.branch_id ='.$model->listner->branch_id);
        $this->render('positionDoc', [
            'model' => $model,
            'admin' => $admin
        ]);
    }
    public function actionForm($term){
        if (Yii::app()->request->isAjaxRequest) {
            $model = Form::model()->findAllByAttributes(['name' => $term]);
            $list = [];        
            foreach($model as $q){
                $data['value']= $q['id'];
                $data['label']= $q->type->name.' | '.$q['name'].' | '.$q['number'];
                $list[]= $data;
                unset($data);
            }
            echo CJSON::encode($list);
        } else {
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }
    public function actionCode($type, $id){
        if (Yii::app()->request->isAjaxRequest) {
            $model = Listner::model()->findByPk($id)->branch;
            if($type==1 || $type==2)
                echo $model->group_counter+1;
            else
                echo $model->individual_counter+1;
        } else {
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }
    public function actionRoom(){
        if(Yii::app()->request->isAjaxRequest){

            $start = $_GET['start_time'];
            $branch_id = $_GET['branch_id'];
            if($_GET['group_id']==0)
                $number = 1;
            else
                $number =count(Group::model()->findByPk($_GET['group_id'])->positions)+1;
            if($_GET['flag']=="on"){$number=1;}
            if(!Room::model()->findBySql(
                "SELECT * FROM spbp_branch_room"
                . " WHERE id <> ALL(SELECT t1.id FROM spbp_branch_room t1 "
                . "JOIN spbp_listner_schedule t2 "
                . "ON t2.room_id = t1.id WHERE t2.start_time = '$start')  "
                . "AND branch_id = '$branch_id' AND capacity>='$number' ORDER BY capacity")->id){
                    echo "No room";
            }

        }
    }
    
    public function actionGroup($branch, $term){
        if (Yii::app()->request->isAjaxRequest) {
            $model = Group::model()->findAll("name=$term AND branch_id=$branch");
            $list = [];        
            foreach($model as $q){
                $data['value']= $q['id'];
                $data['label']= $q->subject->name.' | '.$q['name'];
                $list[]= $data;
                unset($data);
            }
            echo CJSON::encode($list);
        } else {
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }
}
