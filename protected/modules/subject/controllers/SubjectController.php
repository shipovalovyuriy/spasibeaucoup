<?php
/**
* Класс SubjectController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class SubjectController extends \yupe\components\controllers\FrontController
{
    /**
    * Отображает Предмет по указанному идентификатору
    *
    * @param integer $id Идинтификатор Предмет для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $teachers = Teacher::model()->findAll();
        $this->render('view', ['model' => $this->loadModel($id), 'teachers' => $teachers]);}
        else{
            $this->render('../../access/index');
        }

    }
    
    /**
    * Создает новую модель Предмета.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $model = new Subject;

        if (Yii::app()->getRequest()->getPost('Subject') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Subject'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('SubjectModule.subject', 'Запись добавлена!')
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
        $this->render('create', ['model' => $model]);}
        else{
            $this->render('../../access/index');
        }
    }
    
    /**
    * Редактирование Предмета.
    *
    * @param integer $id Идинтификатор Предмет для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('Subject') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Subject'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('SubjectModule.subject', 'Запись обновлена!')
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
        $this->render('update', ['model' => $model]);}
        else{
            $this->render('../../access/index');
        }
    }
    
    /**
    * Удаляет модель Предмета из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Предмета, который нужно удалить
    *
    * @return void
    */
    public function actionDelete($id)
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
            if (Yii::app()->getRequest()->getIsPostRequest()) {
                // поддерживаем удаление только из POST-запроса
                $this->loadModel($id)->delete();

                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('SubjectModule.subject', 'Запись удалена!')
                );

                // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
                if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                    $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
                }
            } else
                throw new CHttpException(400, Yii::t('SubjectModule.subject', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
        }
        else{
            $this->render('../../access/index');
        }
    }
    
    /**
    * Управление Предметами.
    *
    * @return void
    */
    public function actionIndex()
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $model = new Subject('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Subject') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Subject'));
        $this->render('index', ['model' => $model]);}
        else{
            $this->render('../../access/index');
        }
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
        $model = Subject::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('SubjectModule.subject', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
