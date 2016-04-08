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
    Yii::t('ListnerModule.listner', 'Формы обучения') => ['/listner/form/index'],
    Yii::t('ListnerModule.listner', 'Управление'),
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Формы обучения - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Формами обучения'), 'url' => ['/listner/form/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Форму обучения'), 'url' => ['/listner/form/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Формы обучения'); ?>
        <small><?php echo Yii::t('ListnerModule.listner', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('ListnerModule.listner', 'Поиск Форм обучения');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('form-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('ListnerModule.listner', 'В данном разделе представлены средства управления Формами обучения'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'form-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            [
                'header' => 'Тип формы обучения',
                'name'   => 'type.name',
            ],
            'name',
            'price',
            'description',
            'number',
//            'number_in_week',
            [
                'class' => 'yupe\widgets\FrontButtonColumn',
            ],
        ],
    ]
); ?>
