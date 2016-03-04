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
    Yii::t('BranchModule.branch', 'Сотрудники') => ['/branch/user/index'],
    $model->id,
];

$this->pageTitle = Yii::t('BranchModule.branch', 'Сотрудники - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BranchModule.branch', 'Управление Сотрудниками'), 'url' => ['/branch/user/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BranchModule.branch', 'Добавить Сотрудника'), 'url' => ['/branch/user/create']],
    ['label' => Yii::t('BranchModule.branch', 'Сотрудник') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('BranchModule.branch', 'Редактирование Сотрудника'), 'url' => [
        '/branch/user/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('BranchModule.branch', 'Просмотреть Сотрудника'), 'url' => [
        '/branch/user/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('BranchModule.branch', 'Удалить Сотрудника'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/branch/user/delete', 'id' => $model->id],
        'confirm' => Yii::t('BranchModule.branch', 'Вы уверены, что хотите удалить Сотрудника?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BranchModule.branch', 'Просмотр') . ' ' . Yii::t('BranchModule.branch', 'Сотрудника'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'update_time',
        'first_name',
        'middle_name',
        'last_name',
        'nick_name',
        'email',
        'gender',
        'birth_date',
        'site',
        'about',
        'location',
        'status',
        'access_level',
        'visit_time',
        'create_time',
        'avatar',
        'hash',
        'email_confirm',
        'phone',
        'salary',
        'salary_date',
    ],
]); ?>
