<?php
/**
 * Отображение для view:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('SubjectModule.subject', 'Предметы') => ['/subject/subject/index'],
    $model->name,
];

$this->pageTitle = Yii::t('SubjectModule.subject', 'Предметы - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('SubjectModule.subject', 'Управление Предметами'), 'url' => ['/subject/subject/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('SubjectModule.subject', 'Добавить Предмет'), 'url' => ['/subject/subject/create']],
    ['label' => Yii::t('SubjectModule.subject', 'Предмет') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('SubjectModule.subject', 'Редактирование Предмета'), 'url' => [
        '/subject/subject/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('SubjectModule.subject', 'Просмотреть Предмет'), 'url' => [
        '/subject/subject/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('SubjectModule.subject', 'Удалить Предмет'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/subject/subject/delete', 'id' => $model->id],
        'confirm' => Yii::t('SubjectModule.subject', 'Вы уверены, что хотите удалить Предмет?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('SubjectModule.subject', 'Просмотр') . ' ' . Yii::t('SubjectModule.subject', 'Предмета'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  
  <style>
  #sortable1, #sortable2 {
    border: 1px solid #8C8C8C;
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
  <div class="row col-lg-8">
        <div class="col-sm-7 panel">
            <div class="panel-heading">Тестовый вид назначения преподавателя на предмет</div>
            <div class="panel-body">
                <?php if(!$model->isNewRecord):?>        
                    <ul id="sortable1" class="connectedSortable">
                        <?php foreach($teachers as $teacher):if(!$teacher->subject):?>
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
    </div>
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