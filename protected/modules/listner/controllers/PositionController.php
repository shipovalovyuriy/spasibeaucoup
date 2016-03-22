<?php
/**
* Класс PositionController:
*
*   @category Yupe\yupe\components\controllers\FrontController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
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
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Положения.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate($id)
    {
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
    }
    
    /**
    * Управление Положениями.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Position('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Position') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Position'));
        $this->render('index', ['model' => $model]);
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
    
    public function actionGetTeacher($time, $form)
    {
        if(Yii::app()->request->isAjaxRequest){
            $times = explode(',', $time);
            $tCount = count($times);
            $crTimes = $times;
            $schedule = [];
            $j = 0;
            $k = 0;
            $form = Form::model()->findByPk($form);
            for($i=0; $i<$tCount; $i++){
                $times[$i] = substr($times[$i], strpos($times[$i],'T')+1);
            }
            for($i=0; $i<$form->number;$i++){
                if($j==$tCount){
                    $j=0;
                    $k++;
                }
                $schedule[$i] = str_replace(" ","T",date('Y-m-d H:i:s',strtotime("+".$k."week",strtotime($crTimes[$j]))));
                $j++;
            }
            $criteria = new CDbCriteria;
            $condition = '';
            $first = 0;
            foreach($times as $cr){
                if($first == 0){
                    $condition .= "`t`.`start_time`<='$cr' AND SUBTIME(`t`.`end_time`,'01:00:00')>='$cr'";
                    $first++;
                }else{
                    $condition .= " AND `t`.`start_time`<='$cr' AND SUBTIME(`t`.`end_time`,'01:00:00')>='$cr'";
                }
            }
            foreach($schedule as $sch){
                $condition .= " AND `schedule`.`start_time` <>'$sch'";
            }
            $criteria->condition = $condition;
            $models = Teacher::model()->with('user', 'schedule')->findAll($criteria);
            /*foreach($models as $model){
                foreach($model->schedule as $modelSt){
                        if(in_array($modelSt, $schedule)){
                            unset($model);
                        }
                }
            }*/
            //$models = Teacher::model()->with('user', 'schedule')->getCommandBuilder()->createFindCommand('spbp_user_teacher', $criteria)->getText();
            //die($models);
            echo CJSON::encode($this->convertModelToArray($models));
            Yii::app()->end();
        }
        else{
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }
    public function convertModelToArray($models) {
        if (is_array($models))
            $arrayMode = TRUE;
        else {
            $models = array($models);
            $arrayMode = FALSE;
        }

        $result = array();
        foreach ($models as $model) {
            $attributes = $model->getAttributes();
            $relations = array();
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
}
