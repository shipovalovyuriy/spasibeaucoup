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
 *   @var $model Subject
 *   @var $form TbActiveForm
 *   @var $this SubjectBackendController
 **/
$mainAssets = Yii::app()->assetManager->publish(
    Yii::getPathOfAlias('subject.views.assets')
);
//Yii::app()->clientScript->registerCssFile($mainAssets.'/resources/demos/style.css');
Yii::app()->clientScript->registerScriptFile($mainAssets . '/js/teacher.js', CClientScript::POS_END);
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'subject-form',
        'enableAjaxValidation'   => false,
        'enableClientValidation' => true,
        'htmlOptions'            => ['class' => 'well'],
    ]
);
?>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <style>
  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
  }
  </style>
  
<div class="alert alert-info">
    <?php echo Yii::t('SubjectModule.subject', 'Поля, отмеченные'); ?>
    <span class="required">*</span>
    <?php echo Yii::t('SubjectModule.subject', 'обязательны.'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'name', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('name'),
                        'data-content' => $model->getAttributeDescription('name')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php if(!$model->isNewRecord):?>        
                <ul id="sortable1" class="connectedSortable">
                    <?php foreach($teachers as $teacher):if(!$teacher->subject): ?>
                        <li class="ui-state-default " id="<?= $teacher->id?>"><?= $teacher->user->first_name.' '.$teacher->user->last_name?></li>
                    <?php endif; endforeach;?>
                </ul>
                <ul id="sortable2" class="connectedSortable">
                    <?php foreach($teachers as $teacher):if($teacher->subject): ?>
                        <li class="ui-state-default " id="<?= $teacher->id?>"><?= $teacher->user->first_name.' '.$teacher->user->last_name?></li>
                    <?php endif; endforeach;?>
                </ul>
            <?php endif;?>
        </div>
    </div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->textFieldGroup($model, 'code', [
            'widgetOptions' => [
                'htmlOptions' => [
                    'class' => 'popover-help',
                    'data-original-title' => $model->getAttributeLabel('code'),
                    'data-content' => $model->getAttributeDescription('code')
                ]
            ]
        ]); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <?php echo $form->colorpickerGroup(
                $model,
                'color',
                [
                        'wrapperHtmlOptions' => [
                                'class' => 'col-sm-5'
                        ],
                ]
        ); ?>
    </div>
</div>

<?php



?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('SubjectModule.subject', 'Сохранить Предмет и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('SubjectModule.subject', 'Сохранить Предмет и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>
<script>
    $(function() {
        $( "#sortable1, #sortable2" ).sortable({
            connectWith: ".connectedSortable",
            receive: function( event, ui ) {
                var temp = ui.item;
                temp.attr('id');
                $.ajax({
                    type: 'GET',
                    url: '/backend/subject/subject/addTeacher?i='+temp.attr('id')+'&s='+<?=$model->id?>,
                    dataType: 'json',
                    data:{},
                    success: function() {
                        alert('success');
                    },
                })
            },
            //axis: "x"
        }).disableSelection();
    });
</script>