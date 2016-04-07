<?php

/**
 * Класс ListnerController:
 *
 * @category Yupe\yupe\components\controllers\FrontController
 * @package  yupe
 * @author   Yupe Team <team@yupe.ru>
 * @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 * @link     http://yupe.ru
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
    public function actions()
    {
        $roles = ['1','5'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)){
            return [
                'inline' => [
                    'class'           => 'yupe\components\actions\YInLineEditAction',
                    'model'           => 'Listner',
                    'validAttributes' => ['access_level', 'status', 'email_confirm']
                ]
            ];        
        }
    }
    public function actionView($id)
    {
        $roles = ['1','5','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
            $this->render('view', ['model' => $this->loadModel($id)]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    /**
     * Создает новую модель Студента.
     * Если создание прошло успешно - перенаправляет на просмотр.
     *
     * @return void
     */
    public function actionCreate()
    {
        $roles = ['1','5','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
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
        $this->render('create', ['model' => $model]);}
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
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
        $roles = ['1','5','3'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
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
        $this->render('update', ['model' => $model]);}
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
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
        $roles = ['1','5','3'];
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
        }
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    /**
     * Управление Студентами.
     *
     * @return void
     */
    public function actionAll()
    {
        $roles = ['1','5','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));

            if(array_intersect($role,[2,3])){
                $model->branch_id = \Yii::app()->user->branch;
            }
        $this->render('index', ['model' => $model]);}
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    public function actionCurrent()
    {
        $roles = ['1','5','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        $model->status = Listner::STATUS_LISTNER;
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));
            if(array_intersect($role,[2,3])){
                $model->branch_id = \Yii::app()->user->branch;
            }
        $this->render('current', ['model' => $model]);}
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    public function actionPotential()
    {
        $roles = ['1','5','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        $model->status = Listner::STATUS_POTENTIAL;
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));
            if(array_intersect($role,[2,3])){
                $model->branch_id = \Yii::app()->user->branch;
            }
        $this->render('potential', ['model' => $model]);}
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    public function actionGraduate()
    {
        $roles = ['1','5','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
        $model = new Listner('search');
        $model->unsetAttributes(); // clear any default values
        $model->status = Listner::STATUS_GRADUATE;
        if (Yii::app()->getRequest()->getParam('Listner') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Listner'));
            if(array_intersect($role,[2,3])){
                $model->branch_id = \Yii::app()->user->branch;
            }
        $this->render('graduate', ['model' => $model]);}
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    public function actionSubject($id)
    {
        $roles = ['1','5','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
            $model = Position::model()->findAll('id=' . $id);
            $this->render('subjectList', ['model' => $model[0]]);
        } else {
            throw new CHttpException(403,  'Ошибка прав доступа.');
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
        $model = Listner::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('ListnerModule.listner', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
