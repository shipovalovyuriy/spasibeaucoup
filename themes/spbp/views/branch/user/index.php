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
    Yii::t('BranchModule.branch', 'Сотрудники') => ['/branch/user/index'],
    Yii::t('BranchModule.branch', 'Управление'),
];

$this->pageTitle = Yii::t('BranchModule.branch', 'Сотрудники - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('BranchModule.branch', 'Управление Сотрудниками'), 'url' => ['/branch/user/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('BranchModule.branch', 'Добавить Сотрудника'), 'url' => ['/branch/user/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('BranchModule.branch', 'Сотрудники'); ?>
        <small><?php echo Yii::t('BranchModule.branch', 'управление'); ?></small>
    </h1>
</div>

<p>
    <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="collapse" data-target="#search-toggle">
        <i class="fa fa-search">&nbsp;</i>
        <?php echo Yii::t('BranchModule.branch', 'Поиск Сотрудников');?>
        <span class="caret">&nbsp;</span>
    </a>
</p>

<div id="search-toggle" class="collapse out search-form">
        <?php Yii::app()->clientScript->registerScript('search', "
        $('.search-form form').submit(function () {
            $.fn.yiiGridView.update('user-grid', {
                data: $(this).serialize()
            });

            return false;
        });
    ");
    $this->renderPartial('_search', ['model' => $model]);
?>
</div>

<br/>

<p> <?php echo Yii::t('BranchModule.branch', 'В данном разделе представлены средства управления Сотрудниками'); ?>
</p>

<?php
 $this->widget(
    'yupe\widgets\FrontGridView',
    [
        'id'           => 'user-grid',
        'type'         => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter'       => $model,
        'columns'      => [
            'id',
            'update_time',
            'first_name',
            'middle_name',
            'last_name',
            'nick_name',
//            'email',
//            'gender',
//            'birth_date',
//            'site',
//            'about',
//            'location',
//            'status',
//            'access_level',
//            'visit_time',
//            'create_time',
//            'avatar',
//            'hash',
//            'email_confirm',
//            'phone',
//            'salary',
//            'salary_date',
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
            ],
        ],
    ]
); ?>
<script>
    $(function(){
        $('.btn.btn-success.pull-right.btn-sm').attr('href','/registration');
    })
</script>