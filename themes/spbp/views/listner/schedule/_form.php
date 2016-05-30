<?php
/**
 * Отображение для _form:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 *
 *   @var $model Schedule
 *   @var $form TbActiveForm
 *   @var $this ScheduleBackendController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'schedule-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>

<div class="alert alert-info">
    <?php echo Yii::t('ListnerModule.listner', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('ListnerModule.listner', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker4'>
                    <input type='text' class="form-control" value="<?=$model->start_time?>" name="Schedule[start_time]" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker5'>
                    <input type='text' class="form-control" value="<?=$model->end_time?>" name="Schedule[end_time]" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'room_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Room::model()->findAll($model->branch), 'id', 'alias'),
                        'htmlOptions' => [
                            'empty' => '--выберите--',
                            'encode' => false,
                        ],
                    ]
                ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-8">
            <div class="form-group">
                <?php
                    echo $form->hiddenField($model, 'teacher_id');
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name'=>'teacher_id',
                        'source'=> CController::createUrl('/listner/schedule/teacher?branch='.$model->room->branch_id.'&subject='.$model->subject),
                        // additional javascript options for the autocomplete plugin
                        'options'=>[
                            'minLength'=>'2',
                            'select'=>'js:function( event, ui ) {
                                $("#teacher_id").val( ui.item.label );
                                $("#Schedule_user_id").val( ui.item.value );
                                return false;
                            }',
                        ],
                        'htmlOptions'=>[
                            'onfocus' => 'js: this.value = null; $("#teacher_ids").val(null); $("#Schedule_user_id").val(null);',
                            'class' => 'input-xxlarge search-query popover-help form-control',
                            'placeholder' => "Введите имя преопдавателя, если вы случайно нажали, то просто обновите страницу или нажмите назад",
                        ],
                    ));
                ?>
            </div>
        </div>
    </div>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Расписание и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Расписание и закрыть'),
        ]
    ); ?>
    <script type="text/javascript">
        $(function () {
//            $('#datetimepicker4').datetimepicker({
//                startDate:'<?= substr($model->start_time,0,-9)?>'
//            });
//            $('#datetimepicker5').datetimepicker({
//                startDate:'<?= substr($model->end_time,0,-9)?>'
//            });
        });
    </script>

<?php $this->endWidget(); ?>