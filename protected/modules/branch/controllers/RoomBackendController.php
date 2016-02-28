<?php
/**
* Класс RoomBackendController:
*
*   @category Yupe\yupe\components\controllers\BackController
*   @package  yupe
*   @author   Yupe Team <team@yupe.ru>
*   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
*   @link     http://yupe.ru
**/
class RoomBackendController extends \yupe\components\controllers\BackController
{
    /**
    * Отображает Комнату по указанному идентификатору
    *
    * @param integer $id Идинтификатор Комнату для отображения
    *
    * @return void
    */
    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }
    
    /**
    * Создает новую модель Комнаты.
    * Если создание прошло успешно - перенаправляет на просмотр.
    *
    * @return void
    */
    public function actionCreate()
    {
        $model = new Room;

        if (Yii::app()->getRequest()->getPost('Room') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Room'));
        
            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('BranchModule.branch', 'Запись добавлена!')
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
    * Редактирование Комнаты.
    *
    * @param integer $id Идинтификатор Комнату для редактирования
    *
    * @return void
    */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        if (Yii::app()->getRequest()->getPost('Room') !== null) {
            $model->setAttributes(Yii::app()->getRequest()->getPost('Room'));

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('BranchModule.branch', 'Запись обновлена!')
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
    * Удаляет модель Комнаты из базы.
    * Если удаление прошло успешно - возвращется в index
    *
    * @param integer $id идентификатор Комнаты, который нужно удалить
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
                Yii::t('BranchModule.branch', 'Запись удалена!')
            );

            // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) {
                $this->redirect(Yii::app()->getRequest()->getPost('returnUrl', ['index']));
            }
        } else
            throw new CHttpException(400, Yii::t('BranchModule.branch', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
    }
    
    /**
    * Управление Комнатам.
    *
    * @return void
    */
    public function actionIndex()
    {
        $model = new Room('search');
        $model->unsetAttributes(); // clear any default values
        if (Yii::app()->getRequest()->getParam('Room') !== null)
            $model->setAttributes(Yii::app()->getRequest()->getParam('Room'));
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
        $model = Room::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('BranchModule.branch', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
