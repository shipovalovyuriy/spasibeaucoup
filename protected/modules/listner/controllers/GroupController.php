<?php
/**
* Класс GroupController:
*
*   @category Yupe\yupe\components\controllers\FrontController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class GroupController extends \yupe\components\controllers\FrontController
{
    /**
    * Отображает Группу по указанному идентификатору
    *
    * @param integer $id Идинтификатор Группу для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Группы.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Group;

        if (Yii::app()->getRequest()->getPost('Group') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Group'));
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
    * Редактирование Группы.
    *
    * @param integer $id Идинтификатор Группу для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('Group') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Group'));

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
    * Удаляет модель Группы из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Группы, который нужно удалить
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
    * Управление Группам.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Group('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Group') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Group'));
        $this->render('index', ['model' => $model]);
    }

    public function actionClose(){


        $model = new Group('search');
        $model->unsetAttributes(); // clear any default values

        $roles = ['1','2','3','4','5'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {

                $roles = ['2','3'];

                $model->setAttributes(Yii::app()->getRequest()->getParam('Group'));
                //$model->is_active = 0;
                if (array_intersect($role,$roles)){

                    $model->branch_id = \Yii::app()->user->branch;
                }


                $this->render('close',['model'=>$model]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }


    }

    public function actionOff($id){

        $model = \Group::model()->findByPk($id);

        $model->status = 0;

        $model->update();
        $this->redirect('/listner/group/close');
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
        $model = Group::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
