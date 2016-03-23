<?php
/**
 * Отображение для create:
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
    Yii::t('UserModule.user', 'Добавление'),
];

$this->pageTitle = Yii::t('UserModule.user', 'Должности - добавление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('UserModule.user', 'Управление Должностями'), 'url' => ['/user/roleToUser/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('UserModule.user', 'Добавить Должность'), 'url' => ['/user/roleToUser/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('UserModule.user', 'Должности'); ?>
        <small><?php echo Yii::t('UserModule.user', 'добавление'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>