<?php
/**
 * Отображение для _search:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'action'      => Yii::app()->createUrl($this->route),
        'method'      => 'get',
        'type'        => 'vertical',
        'htmlOptions' => ['class' => 'well'],
    ]
);
?>

<fieldset>
    <div class="row">
        <div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'id', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('id'),
                        'data-content' => $model->getAttributeDescription('id')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dropDownListGroup($model, 'position_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Position::model()->findAll(), 'id', 'id')
                    ]
                ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'number', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('number'),
                        'data-content' => $model->getAttributeDescription('number')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'start_time', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('start_time'),
                        'data-content' => $model->getAttributeDescription('start_time')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->textFieldGroup($model, 'end_time', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('end_time'),
                        'data-content' => $model->getAttributeDescription('end_time')
                    ]
                ]
            ]); ?>
        </div>
		<div class="col-sm-3">
            <?php echo $form->dropDownListGroup($model, 'room_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Room::model()->findAll(), 'id', 'id')
                    ]
                ]); ?>
        </div>
		    </div>
</fieldset>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'context'     => 'primary',
            'encodeLabel' => false,
            'buttonType'  => 'submit',
            'label'       => '<i class="fa fa-search">&nbsp;</i> ' . Yii::t('ListnerModule.listner', 'Искать Расписание'),
        ]
    ); ?>

<?php $this->endWidget(); ?>