<?php
/**
 * Отображение для update:
 *
 *   @category YupeView
 *   @package  yupe
 *   @author   Yupe Team <team@yupe.ru>
 *   @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
 *   @link     http://yupe.ru
 **/
$this->breadcrumbs = [
    $this->getModule()->getCategory() => [],
    Yii::t('BranchModule.branch', 'Филиалы') => ['/branch/branch/index'],
    $model->name => ['/branch/branch/view', 'id' => $model->id],
    Yii::t('BranchModule.branch', 'Редактирование'),
];

$this->pageTitle = Yii::t('BranchModule.branch', 'Филиалы - редактирование');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BranchModule.branch', 'Управление Филиалами'), 'url' => ['/branch/branch/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BranchModule.branch', 'Добавить Филиал'), 'url' => ['/branch/branch/create']],
    ['label' => Yii::t('BranchModule.branch', 'Филиал') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('BranchModule.branch', 'Редактирование Филиала'), 'url' => [
        '/branch/branch/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('BranchModule.branch', 'Просмотреть Филиал'), 'url' => [
        '/branch/branch/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('BranchModule.branch', 'Удалить Филиал'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/branch/branch/delete', 'id' => $model->id],
        'confirm' => Yii::t('BranchModule.branch', 'Вы уверены, что хотите удалить Филиал?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BranchModule.branch', 'Редактирование') . ' ' . Yii::t('BranchModule.branch', 'Филиала'); ?>        <br/>
        <small>&laquo;<?php echo $model->name; ?>&raquo;</small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>