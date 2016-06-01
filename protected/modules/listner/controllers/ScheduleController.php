<?php
/**
* Класс ScheduleBackendController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
 *  @todo фильтр по предмету в getTeacher
**/
class ScheduleController extends \yupe\components\controllers\FrontController
{
    /**
    * Отображает Расписание по указанному идентификатору
    *
    * @param integer $id Идинтификатор Расписание для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Расписания.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Schedule;

        if (Yii::app()->getRequest()->getPost('Schedule') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Schedule'));
        
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
    * Редактирование Расписания.
    *
    * @param integer $id Идинтификатор Расписание для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if($model->checkEdit()){
            if (Yii::app()->getRequest()->getPost('Schedule') !== null) {
                $model->setAttributes(Yii::app()->getRequest()->getPost('Schedule'));

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
            throw new CHttpException(403, Yii::t('ListnerModule.listner', 'Отказ доступа. Запрещается переносить занятие менее чем за 24 часа.')); 
        }
    }
    
    /**
    * Удаляет модель Расписания из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Расписания, который нужно удалить
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
    * Управление Расписаниями.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Schedule('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Schedule') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Schedule'));
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
        $model = Schedule::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));

        return $model;
    }
    
    public function actionTeacher($branch, $subject, $term) {
        if (Yii::app()->request->isAjaxRequest) {
            $criteria = new CDbCriteria;
            $criteria->condition = "`t`.`branch_id` = $branch AND `user`.first_name LIKE '%$term%'";
            $model = Teacher::model()->with('user')->findAll($criteria);
            $list = [];        
            foreach($model as $q){
                $data['value']= $q['id'];
                $data['label']= $q->user->fullName;
                $list[]= $data;
                unset($data);
            }
            echo CJSON::encode($list);
        } else {
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));
        }
    }
}
