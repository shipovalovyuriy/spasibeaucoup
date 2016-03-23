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
    Yii::t('UserModule.user', 'Должности') => ['/user/roleToUser/index'],
    $model->id,
];

$this->pageTitle = Yii::t('UserModule.user', 'Должности - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('UserModule.user', 'Управление Должностями'), 'url' => ['/user/roleToUser/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('UserModule.user', 'Добавить Должность'), 'url' => ['/user/roleToUser/create']],
    ['label' => Yii::t('UserModule.user', 'Должность') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('UserModule.user', 'Редактирование Должности'), 'url' => [
        '/user/roleToUser/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('UserModule.user', 'Просмотреть Должность'), 'url' => [
        '/user/roleToUser/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('UserModule.user', 'Удалить Должность'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/user/roleToUser/delete', 'id' => $model->id],
        'confirm' => Yii::t('UserModule.user', 'Вы уверены, что хотите удалить Должность?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('UserModule.user', 'Просмотр') . ' ' . Yii::t('UserModule.user', 'Должности'); ?>        <br/>
        <small>&laquo;<?php echo $model->id; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView', [
    'data'       => $model,
    'attributes' => [
        'id',
        'user_id',
        'role_id',
    ],
]); ?>
