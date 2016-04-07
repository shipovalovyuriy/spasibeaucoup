<?php
/**
 * Отображение для index:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('ListnerModule.listner', 'Студенты') => ['/listner/listner/index'],
    Yii::t('ListnerModule.listner', 'Управление'),
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Студенты - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Студентами'), 'url' => ['/listner/listner/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Студента'), 'url' => ['/listner/listner/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Студенты'); ?>
        <small><?php echo Yii::t('ListnerModule.listner', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('ListnerModule.listner', 'Поиск Студентов');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('listner-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('ListnerModule.listner', 'В данном разделе представлены средства управления Студентами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'listner-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            'lastname',
            'patronymic',
            'phone',
            'create_date',
//            'branch_id',
//            'email',
            [
                'class' => '\yupe\widgets\EditableStatusColumn',
                'name' => 'status',
                'url' => $this->createUrl('/listner/listner/inline'),
                'source' => $model->getStatusList(),
                'options' => [
                    Listner::STATUS_POTENTIAL => ['class' => 'label-success'],
                    Listner::STATUS_LISTNER   => ['class' => 'label-warning'],
                    Listner::STATUS_GRADUATE  => ['class' => 'label-default'],
                    Listner::STATUS_CANCEL    => ['class' => 'label-danger'],
                ],
            ],
            [
                'class' => 'yupe\widgets\FrontButtonColumn',
            ],
        ],
    ]
); ?>
<script>
    $(function(){
        $('a[rel=Listner_status][data-value=0]').append('<div class="label label-success"><span style="border-bottom: 1px dashed;">Потенциальный</span></div>');
        $('a[rel=Listner_status][data-value=1]').append('<div class="label label-warning"><span style="border-bottom: 1px dashed;">Слушатель</span></div>');
        $('a[rel=Listner_status][data-value=2]').append('<div class="label label-primary"><span style="border-bottom: 1px dashed;">Выпускник</span></div>');
        $('a[rel=Listner_status][data-value=3]').append('<div class="label label-danger"><span style="border-bottom: 1px dashed;">Отказ</span></div>');
    })
</script>