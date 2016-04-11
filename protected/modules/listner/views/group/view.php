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
    Yii::t('ListnerModule.listner', 'Группы') => ['/listner/group/index'],
    $model->name,
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Группы - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Группам'), 'url' => ['/listner/group/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Группу'), 'url' => ['/listner/group/create']],
    ['label' => Yii::t('ListnerModule.listner', 'Группа') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('ListnerModule.listner', 'Редактирование Группы'), 'url' => [
        '/listner/group/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('ListnerModule.listner', 'Просмотреть Группу'), 'url' => [
        '/listner/group/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('ListnerModule.listner', 'Удалить Группу'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/listner/group/delete', 'id' => $model->id],
        'confirm' => Yii::t('ListnerModule.listner', 'Вы уверены, что хотите удалить Группу?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Просмотр') . ' ' . Yii::t('ListnerModule.listner', 'Группы'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'name',
        'time',
        'lvl',
        'note',
        'teacher_id',
    ],
]); ?>
