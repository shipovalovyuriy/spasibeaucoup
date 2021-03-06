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
    Yii::t('ListnerModule.listner', 'Студенты') => ['/listner/listner/index'],
    $model->name,
];

$this->pageTitle = Yii::t('ListnerModule.listner', 'Студенты - просмотр');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('ListnerModule.listner', 'Управление Студентами'), 'url' => ['/listner/listner/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('ListnerModule.listner', 'Добавить Студента'), 'url' => ['/listner/listner/create']],
    ['label' => Yii::t('ListnerModule.listner', 'Студент') . ' «' . mb_substr($model->id, 0, 32) . '»'],
    ['icon' => 'fa fa-fw fa-pencil', 'label' => Yii::t('ListnerModule.listner', 'Редактирование Студента'), 'url' => [
        '/listner/listner/update',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-eye', 'label' => Yii::t('ListnerModule.listner', 'Просмотреть Студента'), 'url' => [
        '/listner/listner/view',
        'id' => $model->id
    ]],
    ['icon' => 'fa fa-fw fa-trash-o', 'label' => Yii::t('ListnerModule.listner', 'Удалить Студента'), 'url' => '#', 'linkOptions' => [
        'submit' => ['/listner/listner/delete', 'id' => $model->id],
        'confirm' => Yii::t('ListnerModule.listner', 'Вы уверены, что хотите удалить Студента?'),
        'csrf' => true,
    ]],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Просмотр') . ' ' . Yii::t('ListnerModule.listner', 'Студента'); ?>        <br/>
        <small>&laquo;<?php echo $model->name .' '.$model->lastname ?>&raquo;</small>
    </h1>
</div>
<div class="row">
    <div class="col-md-6 pull-left">
        <section class="panel">
            <header class="panel-heading">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                </ul>
                Персональные данные <span class="badge bg-info"></span>                    
            </header>
            <section class="panel-body">
                    <article class="media">
                        <div class="pull-left">
                            <span class="fa fa-stack fa-2x">
                                <i class="fa fa-circle text-info fa-stack-2x"></i>
                                <i class="fa fa-star text-white fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="media-body">                        
                            <a href="#" class="h4">Телефон: <?= $model->phone?></a>
                        </div>
                    </article>
                    <div class="line pull-in"></div>
                    <article class="media">
                        <div class="pull-left">
                            <span class="fa fa-stack fa-2x">
                                <i class="fa fa-circle text-info fa-stack-2x"></i>
                                <i class="fa fa-star text-white fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="media-body">                        
                            <a href="#" class="h4">Email: <?= $model->email?></a>
                        </div>
                    </article>
                    <div class="line pull-in"></div>
                    <article class="media">
                        <div class="pull-left">
                            <span class="fa fa-stack fa-2x">
                                <i class="fa fa-circle text-info fa-stack-2x"></i>
                                <i class="fa fa-star text-white fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="media-body">                        
                            <a href="#" class="h4">Статус: <?= $model->getStatus($model->status);?></a>
                        </div>
                    </article>
            </section>
        </section>
    </div>

    <div class="col-md-6 pull-right">
        <section class="panel">
            <header class="panel-heading">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                </ul>
                Список курсов <span class="badge bg-info"></span>                    
            </header>
            <section class="panel-body">
                <?php
                foreach($model->position as $position): if(!$position->parent_id):
                    if($position->groupP){
                        if($position->groupP->first_parent_group)
                            continue;
                    }
                    if($position->group_id){$a='group/'.$position->id;$b='users';}else{$a=$position->id; $b='star';}?>
                    <a href="/listner/subject/lessons/<?= $a?>">
                    <article class="media">
                        <div class="pull-left">
                            <span class="fa fa-stack fa-2x">
                                <i class="fa fa-circle text-default fa-stack-2x"></i>
                                <i class="fa fa-<?= $b;?> text-white fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="media-body h4">                        
                            <?= $position->subject->name?>
                        </div>
                    </article>
                    <div class="line pull-in"></div>
                <?php endif; endforeach;?>
                <?php if(array_intersect(\Yii::app()->user->role, ['1', '3'])):?>
                <a href="/listner/view/<?=$model->id?>/create">
                    <article class="media">
                        <div class="pull-left">
                            <span class="fa fa-stack fa-2x">
                                <i class="fa fa-circle text-default fa-stack-2x"></i>
                                <i class="fa fa-plus-square text-white fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="media-body h4">                        
                            Добавить курс
                        </div>
                    </article>
                    </a>
                <?php endif;?>
            </section>
        </section>
    </div>
</div>
<script>
    var userId = <?php echo $model->id?>;
    var branchId = <?php echo $model->branch->id?>;
    var userType = 2;
    var adminMode = false;
</script>
<div class="row" style="margin-left: 5%; margin-right: 5%;">
    <?php
        $this->beginWidget('application.modules.listner.widgets.CalendarWidget');
        $this->endWidget();
    ?>
</div>