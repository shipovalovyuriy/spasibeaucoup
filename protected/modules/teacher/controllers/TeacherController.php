<?php
/**
* Класс TeacherController:
*
*   @category Yupe\yupe\components\controllers\FrontController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class TeacherController extends \yupe\components\controllers\FrontController
{
    /**
    * Отображает Учителя по указанному идентификатору
    *
    * @param integer $id Идинтификатор Учителя для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $this->render('view', ['model' => $this->loadModel($id)]);}
        else{
            $this->render('../../access/index');
        }
    }
    
    /**
    * Создает новую модель Учителя.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $model = new Teacher;

        if (Yii::app()->getRequest()->getPost('Teacher') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Teacher'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('TeacherModule.teacher', 'Запись добавлена!')
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
    * Редактирование Учителя.
    *
    * @param integer $id Идинтификатор Учителя для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('Teacher') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Teacher'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('TeacherModule.teacher', 'Запись обновлена!')
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
    * Удаляет модель Учителя из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Учителя, который нужно удалить
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
                Yii::t('TeacherModule.teacher', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
            }
        } else
            throw new CHttpException(400, Yii::t('TeacherModule.teacher', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }else{
            $this->render('../../access/index');
        }

        }
    
    /**
    * Управление Учителями.
    *
    * @return void
    */
    public function actionIndex()
    {
        $roles = ['1'];
        $role = \Yii::app()->user->role;
        if (!array_diff($role, $roles)) {
        $model = new Teacher('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Teacher') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Teacher'));
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
        $model = Teacher::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('TeacherModule.teacher', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
