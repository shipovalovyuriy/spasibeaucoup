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

<?php echo $form->errorSummary($model);?>

    <?php if(!isset($_GET['parent_id']) && !isset($_GET['parent_group'])):?>
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
<?php elseif(isset($_GET['parent_group'])):
    echo $form->hiddenField($model, 'subject_id',[
                    'value' => Group::model()->findByPk($_GET['parent_group'])->subject_id,
                    'type' => 'hidden'
            ]);
 else:
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
    <label for="price_chek">Акция по старой цене</label>
    <input type="checkbox" id="price_chek" name="Position[is_old]">
</div>
    <div class="row">
        <div class="col-sm-7">
            <div class="form-group">
                <label class="control-label" for="Position_form_id">Тариф</label>
                <?php 
                    echo $form->hiddenField($model, 'form_id');
                    $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name'=>'form_id',
                        'source'=> CController::createUrl('/listner/position/form'),
                        // additional javascript options for the autocomplete plugin
                        'options'=>[
                            'minLength'=>'2',
                            'select'=>'js:function( event, ui ) {
                                $("#form_id").val( ui.item.label );
                                $("#Position_form_id").val( ui.item.value );
                                return false;
                            }',
                        ],
                        'htmlOptions'=>[
                            'onfocus' => 'js: this.value = null; $("#form_id").val(null); $("#Position_form_id").val(null);',
                            'class' => 'input-xxlarge search-query popover-help form-control',
                            'placeholder' => "Введите название тарифа",
                        ],
                    ));
                ?>
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
<div class="row hide group">
    <div class="col-sm-7">
        <div class="form-group">
            <label class="col-sm-5 control-label">Создать новую группу?</label>
            <div class="col-sm-10">
                <label class="switch">
                    <input type="checkbox" name="group" id="Position_group">
                    <span></span>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-7">
        <div class="form-group">
            <label class="control-label" for="Position_group_id">Номер группы</label>
            <?php 
                echo $form->hiddenField($model, 'group_id');
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                    'name'=>'group_id',
                    'source'=> CController::createUrl('/listner/position/group?branch='.Listner::model()->findByPk($_GET['id'])->branch_id),
                    // additional javascript options for the autocomplete plugin
                    'options'=>[
                        'minLength'=>'2',
                        'select'=>'js:function( event, ui ) {
                            $("#group_id").val( ui.item.label );
                            $("#Position_group_id").val( ui.item.value );
                            return false;
                        }',
                    ],
                    'htmlOptions'=>[
                        'onfocus' => 'js: this.value = null; $("#group_id").val(null); $("#Position_group_id").val(null);',
                        'class' => 'input-xxlarge search-query popover-help form-control',
                        'placeholder' => "Введите номер группы",
                    ],
                ));
            ?>
        </div>
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
            <div>
                <span id="bbt" style="margin:0 20px 20px 0;" class="btn btn-danger">Проверить аудитории</span>
                <span id="ttt" style="margin-left:20px;display:none;">Нажмите кнопку еще раз, чтобы проверить снова</span>
            </div>
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

<div class="row oneH">
<div class="col-sm-7">
    <div class="form-group">
        <label class="col-sm-5 control-label">Полутрочасовой урок</label>
        <div class="col-sm-10">
            <label class="switch">
                <input type="checkbox" name="hui">
                <span></span>
            </label>
        </div>
    </div>
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

<div class="row" id="ggg">
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
    </div>

<?php $this->endWidget(); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web').'/js/teacher.js',CClientScript::POS_END)?>
<script>
    $('#Position_group_id').parents('.row').addClass('hide');
    $('#Position_group').val('off');
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
        }).responseText;
        $('#Position_code').val(code);
    }
    $('#Position_type').click(function(){
        if($('#Position_type').val()){
            getCode();
            $('.form_id').remove();
            if($('#Position_type').val() == 1 || $('#Position_type').val() == 2){
                $('#Position_code').attr('required', false);
                $('.group').removeClass('hide');
                $('#Position_group_id').parents('.row').removeClass('hide');
                $('#Position_group').attr("checked", false);
                $('#addTime').parents('.row').addClass('hide');
                $('#Position_teacher_id').parents('.row').addClass('hide');
                $('#Position_code').parents('.row').removeClass('hide');
                $('.oneH').removeClass('hide');
                getGroup();
            }else{
                $('#Position_code').attr('required', true);
                $('.group').addClass('hide');
                $('#Position_group_id').parents('.row').addClass('hide');
                $('#addTime').parents('.row').removeClass('hide');
                $('#Position_teacher_id').parents('.row').removeClass('hide');
                $('#Position_code').parents('.row').addClass('hide');
                $('.oneH').removeClass('hide');
            }
        }
    });
    $('#Position_group').change(function(){
        if($(this).is(':checked')){
            $('#Position_group').val('on');
            $('#addTime').parents('.row').removeClass('hide');
            $('#Position_teacher_id').parents('.row').removeClass('hide');
            $('#Position_group_id').parents('.row').addClass('hide');
            $('#Position_code').parents('.row').addClass('hide');
            $('.group_id').remove();
            $('.oneH').removeClass('hide');
        }else{
            $('#Position_group').val('off');
            $('#addTime').parents('.row').addClass('hide');
            $('#Position_teacher_id').parents('.row').addClass('hide');
            $('#Position_group_id').parents('.row').removeClass('hide');
            $('#parent_group').parents('.row').addClass('hide');
            $('.oneH').addClass('hide');
        }
    })
</script>