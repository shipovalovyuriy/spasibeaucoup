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
 *   @var $model Group
 *   @var $form TbActiveForm
 *   @var $this GroupController
 **/
$form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm', [
        'id'                     => 'group-form',
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
            <label class="control-label">Укажите время занятий</label>
            <div class="input-group date" id="datetimepicker1">
                <input type='text' class="form-control ct-form-control" autocomplete="off" placeholder="После каждого выбора времени нажмите +" id="yw0" />
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>
            </div>
            <a id="addTime" style="text-decoration:none; cursor:pointer;"class="fa fa-plus"></a>
            <p><label for="">Итоговое время:</label></p>
            <input class="totalTime popover-help form-control" value="<?=$model->time ?>" type="text" name="Group[time]">
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

    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'context'    => 'primary',
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Группу и продолжить'),
        ]
    ); ?>
    <?php $this->widget(
        'bootstrap.widgets.TbButton', [
            'buttonType' => 'submit',
            'htmlOptions'=> ['name' => 'submit-type', 'value' => 'index'],
            'label'      => Yii::t('ListnerModule.listner', 'Сохранить Группу и закрыть'),
        ]
    ); ?>

<?php $this->endWidget(); ?>

<script>
    $(function(){
        $('#datetimepicker1').datetimepicker({
            locale: 'ru',
            stepping: 30,
            enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
            format: 'YYYY-MM-DDTHH:mm',
        });
    })


</script>
<script>
    var el = document.getElementById("addTime");
    var currentTime = document.getElementById("yw0");
    var total = document.getElementsByClassName("totalTime");
    el.addEventListener("click", function () {
        if(currentTime.value != undefined && currentTime.value && currentTime.value != total.value){
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
        $('#addTime').click(function(){
            var teacher = $('#Position_teacher_id');
            var time = $('.totalTime').val();
            var form = $('#Position_form_id').val();
            var subject = $('#Position_subject_id').val();
            var branch = $('#branch_id').val();
            if(time){
                $.ajax({
                    type: 'GET',
                    url: '/listner/position/getTeacher?time='+time,
                    dataType: 'json',
                    data:{
                        form: form,
                        subject: subject,
                        branch: branch
                    },
                }).done(function(data){
                    $('.teachers').remove();
                    data.forEach(function(item){
                        teacher.append('<option class="teachers" value="'+item.id+'">'+item.user.last_name + ' ' + item.user.first_name+'</option>');
                    })
                })
            }
        });
    });
</script>
