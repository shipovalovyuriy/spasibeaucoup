<?php
/**
* Класс ListnerController:
*
*   @category Yupe\yupe\components\controllers\FrontController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class ListnerController extends \yupe\components\controllers\FrontController
{
    /**
    * Отображает Студента по указанному идентификатору
    *
    * @param integer $id Идинтификатор Студента для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    /**
    * Создает новую модель Студента.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Listner;
        if (Yii::app()->getRequest()->getPost('Listner') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Listner'));
            $model->create_date = date("Y-m-d H:i:s");
            $model->branch_id = Yii::app()->user->branch->id;
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
    * Редактирование Студента.
    *
    * @param integer $id Идинтификатор Студента для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('Listner') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Listner'));

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
    * Удаляет модель Студента из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Студента, который нужно удалить
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
    * Управление Студентами.
    *
    * @return void
    */
    public function actionAll()
    {
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));
        $this->render('index', ['model' => $model]);
    }
    public function actionCurrent(){
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        $model->status = Listner::STATUS_LISTNER;
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));
        $this->render('current', ['model' => $model]);
    }
    public function actionPotential(){
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        $model->status = Listner::STATUS_POTENTIAL;
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));
        $this->render('potential', ['model' => $model]);
    }
    public function actionGraduate(){
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        $model->status = Listner::STATUS_GRADUATE;
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));
        $this->render('graduate', ['model' => $model]);
    }
    
    public function actionSubject($id){
        $model = Position::model()->findAll('id='.$id);
        $this->render('subjectList', ['model' => $model[0]]);
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
        $model = Listner::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
