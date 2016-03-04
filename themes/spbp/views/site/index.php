<?php $assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web') ?>
    <!--p style="text-align: center;"><img width="30%" src="<?$assets?>/images/logosp.png"></p>
        <div class="row" style="text-align: center;">
            <h2>Клиентская база</h2>
            <a href="/listner/all" class="btn btn-white btn-lg">
                Общая
            </a>
            <a href="/listner/current" class="btn btn-white btn-lg">Студенты</a>
            <a href="/listner/graduates" class="btn btn-white btn-lg">Выпускники</a>
            <a href="/listner/potential" class="btn btn-white btn-lg">Потенциальные</a>
        </div-->

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
                            <a href="/branch/<?=$branch->id?>" class="h4"><?= $branch->name?></a>
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
                            <i class="fa fa-circle text-primary fa-stack-2x"></i>
                            <i class="fa fa-users text-white fa-stack-1x"></i>
                        </span>
                    </div>
                    <div class="media-body">                        
                        <a href="/listner/graduates" class="h4">Выпускники</a>
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
                        <a href="/employees" class="h4">Все сотрудники</a>
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
                        <a href="/teacher" class="h4">Преподаватели</a>
                    </div>
                </article>
            </section>
        </section>
    </div>