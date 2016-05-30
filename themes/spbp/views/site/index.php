<?php
$assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web'); ?>
    <?php if(array_intersect(Yii::app()->user->role, ['1','4','5'])):?>    
        <div class="col-md-6 pull-left">
            <section class="panel">
                <header class="panel-heading">
                    <ul class="nav nav-pills pull-right">
                        <li>
                            <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                        </li>
                    </ul>
                    Список филиалов <span class="badge bg-info"></span>                    
                </header>
                <section class="panel-body">
                    <?php foreach($branchs as $branch):?>
                        <a href="/branch/schedule/<?=$branch->id?>">
                            <article class="media">
                                <div class="pull-left">
                                    <span class="fa fa-stack fa-2x">
                                        <i class="fa fa-circle text-info fa-stack-2x"></i>
                                        <i class="fa fa-building text-white fa-stack-1x"></i>
                                    </span>
                                </div>
                                <div class="media-body h4">                        
                                    <?= $branch->name?>
                                </div>
                            </article>
                        </a>
                        <?php if($branch != end($branchs)):?><div class="line pull-in"></div><?php endif;?>
                    <?php endforeach;?>
                </section>
            </section>
        </div>
    <?php endif;?>
    <div class="col-md-6 pull-right">
        <section class="panel">
            <header class="panel-heading">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                </ul>
                Клиентская база 
                <span class="badge bg-info"></span>                    
            </header>
            <section class="panel-body">
            <?php  $roles = ['1','5','3','2'];
        $role = \Yii::app()->user->role;
        if (array_intersect($role, $roles)):?>
        <a href="/listner/all">
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-info fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body h4">                        
                        Общая
                    </div>
                </article>
                </a>
                <div class="line pull-in"></div>
                <a href="/listner/current">
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-success fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body h4">                        
                        Студенты
                    </div>
                </article>
                </a>
                <div class="line pull-in"></div>
                <a href="/listner/graduate">
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-light fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body h4">                        
                        Выпускники
                    </div>
                </article>
                </a>
                <div class="line pull-in"></div>
                <a href="/listner/potential">
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-warning fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body h4">                        
                        Потенциальные
                    </div>
                </article>
                </a>
                <div class="line pull-in"></div>
                <?php endif;?>
                <a href="/listner/create">
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-primary fa-stack-2x"></i>
                            <i class="fa fa-user-plus text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body h4">                        
                        Зарегистрировать клиента
                    </div>
                </article>
                </a>
            </section>
        </section>
    </div>
    <div class="col-md-6 pull-left">
        <section class="panel">
            <header class="panel-heading">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                </ul><?php if(array_intersect(Yii::app()->user->role, ['1','4','5'])):?>
                База сотрудниов <?php else:?>База преподавателей<?php endif;?><span class="badge bg-info"></span>                    
            </header>
            <section class="panel-body">
            <?php if(array_intersect(Yii::app()->user->role, ['1','4','5'])):?>
                            <a href="/user">
                        <?php else:?>
                            <a href="/teacher">
                        <?php endif;?>
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-info fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body h4">                        
                        <?php if(array_intersect(Yii::app()->user->role, ['1','4','5'])):?>
                            Все сотрудники
                        <?php else:?>
                            Преподаватели филиала
                        <?php endif;?>
                    </div>
                </article>
                </a>
                <?php if(array_intersect(Yii::app()->user->role, ['1','4'])):?>
                    <div class="line pull-in"></div>
                    <a href="/teacher/create">
                    <article class="media">
                        <div class="pull-left">
                            <span class="fa fa-stack fa-2x">
                                <i class="fa fa-circle text-primary fa-stack-2x"></i>
                                <i class="fa fa-user-plus text-white fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="media-body h4">                    
                            Добавить преподавателя
                        </div>
                    </article>
                    </a>
                <?php endif;?>
            </section>
        </section>
    </div>
    <?php if($salary && in_array('1', Yii::app()->user->role)):?>
        <section class="panel no-borders hbox">
            <aside class="bg-info lter r-l text-center v-middle">
                <div class="wrapper" style="text-shadow: #000 0 0 2px;">
                    <a href="/salary">
                        <i class="fa fa-dollar fa fa-4x"></i>
                        <p class="text"><em>Уведомление о зарплате</em></p>
                    </a>
                </div>
            </aside>
        </section>
    <?php endif;?>

<?php if($positions && in_array('3', Yii::app()->user->role)):?>
    <section class="panel no-borders hbox">
        <aside class="bg-info lter r-l text-center v-middle">
            <div class="wrapper" style="text-shadow: #000 0 0 2px;">
                <a href="/listner/position/close">
                    <i class="fa fa-envelope fa fa-4x"></i>
                    <p class="text"><em>Уведомление о положениях</em></p>
                </a>
            </div>
        </aside>
    </section>
<?php endif;?>

<?php if(in_array('3', Yii::app()->user->role)): ?>

    <div class="col-md-6 pull-left">
<section class="panel">
            <header class="panel-heading">
                <ul class="nav nav-pills pull-right">
                    <li>
                        <a href="#" class="panel-toggle text-muted"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a>
                    </li>
                </ul>
                Расписание                  
            </header>
    <script>
        var userId = 0;
        var branchId = <?php echo Yii::app()->user->branch;?>;
        var userType = 0;// 1 - teacher , 2 - listener
        var adminMode = true;
    </script>
    <section class="panel-body">
    <?php
    $this->beginWidget('application.modules.listner.widgets.CalendarWidget');
    $this->endWidget();
    ?>
    </section >
    </div>

<?php endif;?>