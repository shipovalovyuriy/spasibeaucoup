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
    Yii::t('SubjectModule.subject', 'Предметы') => ['/subject/subject/index'],
    Yii::t('SubjectModule.subject', 'Управление'),
];

$this->pageTitle = Yii::t('SubjectModule.subject', 'Предметы - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('SubjectModule.subject', 'Управление Предметами'), 'url' => ['/subject/subject/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('SubjectModule.subject', 'Добавить Предмет'), 'url' => ['/subject/subject/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('SubjectModule.subject', 'Предметы'); ?>
        <small><?php echo Yii::t('SubjectModule.subject', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('SubjectModule.subject', 'Поиск Предметов');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('subject-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('SubjectModule.subject', 'В данном разделе представлены средства управления Предметами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'subject-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
