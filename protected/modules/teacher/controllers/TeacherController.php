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
        $roles = ['1','4','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)){
            $this->render('view', ['model' => $this->loadModel($id)]);}
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    }

    // Показать расписание для учителя


    public function actionSchedule($id){

        $roles = ['1','4'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)){
            $model = $this->loadModel($id);
            //$roles=['1'];
            $litners = Listner::model()->with('position')->findAll('teacher_id='.$id);
                if(Yii::app()->user->teacher ==$id || in_array('1', $role)){
                    $this->render('schedule',['model'=>$model,'litners'=>$litners]);
                }else{
                    throw new CHttpException(403,  'Ошибка прав доступа.');
                }
            }
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
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
        $roles = ['1','4'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
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
            $this->render('create', ['model' => $model]);    
        }
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
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
        $roles = ['1','4'];
        $role = \Yii::app()->user->role;
        if(array_intersect($role, $roles)){
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
            $this->render('update', ['model' => $model]);
        }
        else{
            throw new CHttpException(403,  'Ошибка прав доступа.');
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
    public function actionLessons(){
        $arr = [];
        $x = [];
        $tvar = null;
        if (Yii::app()->request->isAjaxRequest) {

            if (!$_GET['date']){echo "gavno";}else{
            $datecontrol =explode('-',$_GET['date']);


            $model = Yii::app()->db->createCommand()
                ->select('id,first_name, last_name')
                ->from('spbp_user_user')
                ->queryAll();

            foreach ($model as $gavno) {
                $dermo = 0;
                $pizda = Yii::app()->db->createCommand()
                    ->select('id')
                    ->from('spbp_user_teacher')
                    ->where('user_id=:wluha', [":wluha" => $gavno['id']])
                    ->queryAll();

                foreach ($pizda as $value) {
                    $a = Yii::app()->db->createCommand()
                        ->select('count(b.id) as hours')
                        ->from('spbp_listner_position a')
                        ->join('spbp_listner_schedule b', 'b.position_id = a.id')
                        ->where('a.teacher_id =:id and b.end_time < now() and a.is_test = 0 and month(b.end_time)=:pizda and year(b.end_time)=:hui', [':id' => $value['id'],':hui'=>$datecontrol[0],':pizda'=>$datecontrol[1]])
                        ->queryRow();

                    $dermo += $a['hours'];

                }
                $x['firstname'] = $gavno['first_name'];
                $x['lastname'] = $gavno['last_name'];
                $x['hours'] = $dermo;

                array_push($arr, $x);
            }

            echo CJSON::encode($arr);
                }
        }
        else{
        $this->render('lessons',['model'=>$arr]);}

    }
    public function actionDelete($id)
    {
        $roles = ['1','4'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)) {
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
            } 
            else
                throw new CHttpException(400, Yii::t('TeacherModule.teacher', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
        }
        else
            throw new CHttpException(403,  'Ошибка прав доступа.');
        }
    
    /**
    * Управление Учителями.
    *
    * @return void
    */
    public function actionIndex()
    {
        $roles = ['1','4','3'];
        $role = \Yii::app()->user->role;
        if(array_intersect($role, $roles)){
            $model = new Teacher('search');
            $model->unsetAttributes(); // clear any default values
            if (Yii::app()->getRequest()->getParam('Teacher') !== null)
                $model->setAttributes(Yii::app()->getRequest()->getParam('Teacher'));
                if(array_intersect($role,[2,3])){
                    $model->branch_id = \Yii::app()->user->branch;
                }
                $model->is_test = 0;
            $this->render('index', ['model' => $model]);
        }
        else{
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
        $model = Teacher::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, Yii::t('TeacherModule.teacher', 'Запрошенная страница не найдена.'));

        return $model;
    }
}
