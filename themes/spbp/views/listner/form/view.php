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
    Yii::t('ListnerModule.listner', 'Формы обучения') => ['/listner/form/index'],
    $model->name,
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Формы обучения - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Формами обучения'), 'url' => ['/listner/form/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Форму обучения'), 'url' => ['/listner/form/create']],
    ['label' => Yii::t('ListnerModule.listner', 'Форма обучения') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('ListnerModule.listner', 'Редактирование Формы обучения'), 'url' => [
        '/listner/form/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('ListnerModule.listner', 'Просмотреть Форму обучения'), 'url' => [
        '/listner/form/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('ListnerModule.listner', 'Удалить Форму обучения'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/listner/form/delete', 'id' => $model->id],
        'confirm' => Yii::t('ListnerModule.listner', 'Вы уверены, что хотите удалить Форму обучения?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Просмотр') . ' ' . Yii::t('ListnerModule.listner', 'Формы обучения'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        [
            'header' => '',
            'name'   => 'Тип формы обучения',
            'value'  => $model->type->name
        ],
        'name',
        'price',
        'description',
        'number',
    ],
]); ?>
