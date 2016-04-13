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
        if (array_intersect($role, $roles)){
            $model = new Position;
            if (Yii::app()->getRequest()->getPost('Position') !== null) {
                $model->setAttributes(Yii::app()->getRequest()->getPost('Position'));
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
            $this->render('create', ['model' => $model]);
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
            if (Yii::app()->getRequest()->getPost('Position') !== null) {
                $model->setAttributes(Yii::app()->getRequest()->getPost('Position'));
                $model->parent_id = $pid;
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
            $this->render('create', ['model' => $model]);
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
            $criteria = new CDbCriteria;
            $condition = '';
            $first = 0;
            foreach ($times as $cr) {
                if ($first == 0) {
                    $condition .= "`t`.`start_time`<='$cr' AND SUBTIME(`t`.`end_time`,'01:00:00')>='$cr'";
                    $first++;
                } else {
                    $condition .= " AND `t`.`start_time`<='$cr' AND SUBTIME(`t`.`end_time`,'01:00:00')>='$cr'";
                }
            }
            foreach ($schedule as $sch) {
                $condition .= " AND `schedule`.`start_time` <>'$sch'";
            }
            $condition .= " AND `subject`.`subject_id` = $subject AND `t`.`is_test` = 0";
            $criteria->condition = $condition;
            $models = Teacher::model()->with('user', 'schedule', 'subject')->findAll($criteria);

            $arr = [];

            foreach($models as $pizda){
                $klitor = Teacher::model()->with('user')->findAll('user_id='.$pizda->user_id);
                if(count($klitor)>1){
                    foreach($klitor as $barebuh){
                        if ($barebuh->branch_id == $branch){array_push($arr,$barebuh);}
                    }
                }else{
                    array_push($arr,$pizda);
                }
            }
            echo CJSON::encode($this->convertModelToArray($arr));
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
    public function actionForm($type){
        if (Yii::app()->request->isAjaxRequest) {
            $model = Form::model()->findAll('`t`.type_id='.$type);
            echo CJSON::encode($model);
        } else {
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }
    public function actionCode($type, $id){
        if (Yii::app()->request->isAjaxRequest) {
            $user = Listner::model()->findByPk($id)->branch_id;
            $model = Branch::model()->findByPk($user);
            if($type==1 || $type==2)
                echo $model->group_counter+1;
            else
                echo $model->individual_counter+1;
        } else {
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }
}
