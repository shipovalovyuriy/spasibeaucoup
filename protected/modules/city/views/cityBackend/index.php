<?php
/**
* Отображение для cityBackend/index
*
* @category YupeView
* @package  yupe
* @author   Yupe Team <team@yupe.ru>
* @license  https://github.com/yupe/yupe/blob/master/LICENSE BSD
* @link     http://yupe.ru
**/
$this->breadcrumbs = [
    Yii::t('CityModule.city', 'city') => ['/city/cityBackend/index'],
    Yii::t('CityModule.city', 'Index'),
];

$this->pageTitle = Yii::t('CityModule.city', 'city - index');

$this->menu = $this->getModule()->getNavigation();;
?>

<div class="page-header">
    <h1>
        <?php echo Yii::t('CityModule.city', 'city'); ?>
        <small><?php echo Yii::t('CityModule.city', 'Index'); ?></small>
    </h1>
</div>