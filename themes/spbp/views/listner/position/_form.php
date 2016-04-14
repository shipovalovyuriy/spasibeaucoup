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
 *   @var $model Position
 *   @var $form TbActiveForm
 *   @var $this PositionController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'position-form',
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

    <?php if(!isset($_GET['parent_id'])):?>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'subject_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Subject::model()->findAllBySql('SELECT * FROM spbp_subject_subject WHERE id <> ALL(SELECT t1.id FROM spbp_subject_subject t1
                                                            JOIN spbp_listner_position t2 ON t2.subject_id = t1.id
                                                                    WHERE t2.listner_id = '.$_GET['id'].'
                                                    )'), 'id', 'name'),
                        'htmlOptions' => [
                            'empty' => '--выберите--',
                            'encode' => false,
                        ],
                    ]
                ]); ?>
        </div>
    </div>
<?php else:
        echo $form->hiddenField($model, 'subject_id',[
                    'value' => Position::model()->findByPk($_GET['parent_id'])->subject_id,
                    'type' => 'hidden'
            ]);
    endif;?>

    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'type', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Type::model()->findAll(), 'id', 'name'),
                        'htmlOptions' => [
                            'empty' => '--выберите--',
                            'encode' => false,
                        ],
                    ]
                ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'form_id', [
                    'widgetOptions' => [
                        'htmlOptions' => [
                            'empty' => '--выберите--',
                            'encode' => false,
                        ],
                    ]
                ]); ?>
        </div>
    </div>
    <div class="row hide group">
        <div class="col-lg-7">
            <div class="btn-group btn-group-justified m-b">
                <a class="btn btn-success btn-rounded" data-toggle="button">
                    <span class="text">
                        <i class="fa fa-user-plus"></i> Новая группа
                    </span>
                </a>
                <a class="btn btn-default btn-rounded">
                    <i class="fa fa-users"></i> Имеющаяся группа
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'code', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('code'),
                        'data-content' => $model->getAttributeDescription('code'),
                        'readonly' => true
                    ]
                ]
            ]); ?>
        </div>
    </div>
<input type="hidden" value="<?= Listner::model()->findByPk($_GET['id'])->branch_id;?>" id="branch_id">
    <div class="row">
        <div class="col-sm-7">
            <label class="control-label">Укажите время занятий</label>
            <div class="input-group date" id="datetimepicker1">                
                <input type='text' class="form-control ct-form-control" autocomplete="off" placeholder="После каждого выбора времени нажмите +" id="yw0" />
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
            </div>
            <a id="addTime" style="text-decoration:none; cursor:pointer;"class="fa fa-plus"></a>
            <p><label for="">Итоговое время:</label></p>
            <input class="totalTime popover-help form-control" readonly value="<?=$model->time ?>" type="text" name="Position[time]"> 
            <a id="clearTime" style="cursor:pointer;">Очистить</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'teacher_id', [
                    'widgetOptions' => [                        
                        'htmlOptions' => [
                            'empty' => '--выберите--',
                            'encode' => false,
                        ],
                    ],
                ]); ?>
        </div>
    </div>

<div class="row">
<div class="col-sm-7">
    <div class="form-group">
        <label class="col-sm-5 control-label">Полутрочасовой урок</label>
        <div class="col-sm-10">
            <label class="switch">
                <input type="checkbox" name="Position[hui]">
                <span></span>
            </label>
        </div>
    </div>
</div>
</div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->dropDownListGroup($model, 'group_id', [
                    'widgetOptions' => [
                        'data' => CHtml::listData(Group::model()->findAll(), 'id', 'name')
                    ]
                ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'lvl', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('lvl'),
                        'data-content' => $model->getAttributeDescription('lvl')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->datePickerGroup($model, 'start_period', [
                'widgetOptions' => [
                    'options' => [
                        'format'=> "yyyy-mm-dd",
                    ],
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('start_period'),
                        'data-content' => $model->getAttributeDescription('start_period')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->datePickerGroup($model, 'end_period', [
                'widgetOptions' => [
                    'options' => [
                        'format'=> "yyyy-mm-dd",
                    ],
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('end_period'),
                        'data-content' => $model->getAttributeDescription('end_period')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->textFieldGroup($model, 'note', [
                'widgetOptions' => [
                    'htmlOptions' => [
                        'class' => 'popover-help',
                        'data-original-title' => $model->getAttributeLabel('note'),
                        'data-content' => $model->getAttributeDescription('note')
                    ]
                ]
            ]); ?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-7">
            <?php echo $form->datePickerGroup($model,'start_date', [
            'widgetOptions'=>[
                'options' => [
                    'format'=> "yyyy-mm-dd",
                ],
                'htmlOptions' => [
                ]
            ],
            'prepend'=>'<i class="fa fa-calendar"></i>'
        ]); ?>
        </div>
    </div>

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Положение и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Положение и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web').'/js/teacher.js',CClientScript::POS_END)?>
<script>
    var el = document.getElementById("addTime");
    var currentTime = document.getElementById("yw0");
    var total = document.getElementsByClassName("totalTime");
    el.addEventListener("click", function () {
        if(currentTime.value != undefined && currentTime.value && currentTime.value != total.value
                && $('#Position_form_id').val() && $('#Position_subject_id').val()){
            if (total.value == undefined) {
                total.value = currentTime.value
            } else {
                total.value += "," + currentTime.value;
            }
            $('.totalTime').val(total.value);
        }
    });

    $('#clearTime').click(function () {
        total.value = undefined;
        $('.teachers').remove();
        $('.totalTime').val('');
    });
    function getCode() {
        var code = $.ajax({
            type: 'get',
            url: '/listner/position/code?type='+$('#Position_type').val()+'&id='+<?= $_GET['id']?>,
            async: false
        }).done(function(){
            setTimeout(function(){
                getCode();
            }, 10000);
        }).responseText;
        $('#Position_code').val(code);
    }
    function getForm() {
        $.ajax({
            type: 'get',
            url: '/listner/position/form',
            dataType: 'json',
            data: {
                type: $('#Position_type').val(),
            }
        }).done(function(data){
            data.forEach(function(item){
                $('#Position_form_id').append('<option class="form_id" value="'+item.id+'">'+item.name+'</option>');
            })
        });
    }
    $('#Position_type').click(function(){
        if($('#Position_type').val()){
            getCode();
            $('.form_id').remove();
            getForm();
            if($('#Position_type').val() == 1 || $('#Position_type').val() == 2){
                $('.group').removeClass('hide');
            }else{
                $('.group').addClass('hide');
            }
        }
    })
</script>