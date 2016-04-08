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
    Yii::t('ListnerModule.listner', 'Типы форм обучения') => ['/listner/type/index'],
    $model->name,
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Типы форм обучения - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Типами форм обучения'), 'url' => ['/listner/type/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Тип формы обучения'), 'url' => ['/listner/type/create']],
    ['label' => Yii::t('ListnerModule.listner', 'Тип формы обучения') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('ListnerModule.listner', 'Редактирование Типа формы обучения'), 'url' => [
        '/listner/type/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('ListnerModule.listner', 'Просмотреть Тип формы обучения'), 'url' => [
        '/listner/type/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('ListnerModule.listner', 'Удалить Тип формы обучения'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/listner/type/delete', 'id' => $model->id],
        'confirm' => Yii::t('ListnerModule.listner', 'Вы уверены, что хотите удалить Тип формы обучения?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Просмотр') . ' ' . Yii::t('ListnerModule.listner', 'Типа формы обучения'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'name',
    ],
]); ?>
