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
    Yii::t('CityModule.city', 'Города') => ['/city/city/index'],
    Yii::t('CityModule.city', 'Управление'),
];

$this->pageTitle = Yii::t('CityModule.city', 'Города - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('CityModule.city', 'Управление Городами'), 'url' => ['/city/city/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('CityModule.city', 'Добавить Город'), 'url' => ['/city/city/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('CityModule.city', 'Города'); ?>
        <small><?php echo Yii::t('CityModule.city', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('CityModule.city', 'Поиск Городов');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('city-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('CityModule.city', 'В данном разделе представлены средства управления Городами'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'city-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'name',
            [
                'class' => 'yupe\widgets\FrontButtonColumn',
            ],
        ],
    ]
); ?>
