<?php $assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web') ?>
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
                    <article class="media">
                        <div class="pull-left">
                            <span class="fa fa-stack fa-2x">
                                <i class="fa fa-circle text-info fa-stack-2x"></i>
                                <i class="fa fa-building text-white fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="media-body">                        
                            <a href="/branch/schedule/<?=$branch->id?>" class="h4"><?= $branch->name?></a>
                        </div>
                    </article>
                    <?php if($branch != end($branchs)):?><div class="line pull-in"></div><?php endif;?>
                <?php endforeach;?>
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
                Клиентская база 
                <span class="badge bg-info"></span>                    
            </header>
            <section class="panel-body">
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-info fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                        
                        <a href="/listner/all" class="h4">Общая</a>
                    </div>
                </article>
                <div class="line pull-in"></div>
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-success fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                        
                        <a href="/listner/current" class="h4">Студенты</a>
                    </div>
                </article>
                <div class="line pull-in"></div>
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-light fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                        
                        <a href="/listner/graduate" class="h4">Выпускники</a>
                    </div>
                </article>
                <div class="line pull-in"></div>
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-warning fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                        
                        <a href="/listner/potential" class="h4">Потенциальные</a>
                    </div>
                </article>
                <div class="line pull-in"></div>
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-primary fa-stack-2x"></i>
                            <i class="fa fa-user-plus text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                        
                        <a href="/listner/create" class="h4">Зарегистрировать клиента</a>
                    </div>
                </article>
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
                </ul>
                База сотрудниов <span class="badge bg-info"></span>                    
            </header>
            <section class="panel-body">
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-info fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                        
                        <a href="/user" class="h4">Все сотрудники</a>
                    </div>
                </article>
                <div class="line pull-in"></div>
                <article class="media">
                    <div class="pull-left">
                        <span class="fa fa-stack fa-2x">
                            <i class="fa fa-circle text-primary fa-stack-2x"></i>
                            <i class="fa fa-user-plus text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                    
                        <a href="/teacher/create" class="h4">Добавить преподавателя</a>
                    </div>
                </article>
            </section>
        </section>
    </div>