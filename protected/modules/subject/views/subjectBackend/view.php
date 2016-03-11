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
    Yii::t('SubjectModule.subject', 'Предметы') => ['/subject/subjectBackend/index'],
    $model->name,
];

$this->pageTitle = Yii::t('SubjectModule.subject', 'Предметы - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('SubjectModule.subject', 'Управление Предметами'), 'url' => ['/subject/subjectBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('SubjectModule.subject', 'Добавить Предмет'), 'url' => ['/subject/subjectBackend/create']],
    ['label' => Yii::t('SubjectModule.subject', 'Предмет') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('SubjectModule.subject', 'Редактирование Предмета'), 'url' => [
        '/subject/subjectBackend/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('SubjectModule.subject', 'Просмотреть Предмет'), 'url' => [
        '/subject/subjectBackend/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('SubjectModule.subject', 'Удалить Предмет'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/subject/subjectBackend/delete', 'id' => $model->id],
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

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'name',
        'color',
        'code',
    ],
]); ?>
