<?php if(!Yii::app()->user->isGuest):
    $role = Yii::app()->user->role;
?>
    <aside class="bg-primary aside-sm" id="nav">
        <section class="vbox">
            <!-- user -->
            <div class="bg-success nav-user hidden-xs pos-rlt">
                <div class="nav-avatar pos-rlt">
                    <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                        <img src="<?=$assets?>/images/logosp.png" alt="" class="">
                        <span class="caret caret-white"></span>
                    </a>
                </div>
                <div class="nav-msg">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <b class="badge badge-black count-n"><?= Yii::app()->user->name?></b>
                    </a>                            
                </div>
            </div>
              <!-- / user -->
              <!-- nav -->
            <nav class="nav-primary">
                <ul class="nav ">
                    <li>
                        <a href="<?= Yii::app()->homeUrl?>">
                            <i class="fa fa-eye"></i>
                            <span>Главная</span>
                        </a>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-tasks"></i>
                            <span>Расписание</span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php foreach(Branch::model()->findAll() as $model):?>
                            <li>
                                <a href="/branch/schedule/<?= $model->id?>"><?= $model->name?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </li>
                    <?php $roles=['1','5','3','2']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/listner/all">
                                <i class="fa fa-building-o"></i>
                                <span>Клиентская база</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','5','3','2']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/teacher">
                                <i class="fa fa-building-o"></i>
                                <span>База преподавателей</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','5','3','2']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/subject">
                                <i class="fa fa-bookmark"></i>
                                <span>Список предметов</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','3']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-file-text"></i>
                                <span>Отчет</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/balance/report/index">Сформировать</a>
                                </li>
                                <li>
                                    <a href="/balance/inflow/index">Доход</a>
                                </li>
                                <li>
                                    <a href="/balance/outflow/index">Расход</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif;?>
                    <?php $roles=['6']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/teacher/schedule/<?=Yii::app()->user->teacher?>">
                                <i class="fa fa-calendar"></i>
                                <span>Мое расписание</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','4']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/user">
                                <i class="fa fa-users"></i>
                                <span>Сотрудники</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','4']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/role">
                                <i class="fa fa-user-plus"></i>
                                <span>Должности</span>
                            </a>
                        </li>
                    <?php endif;?>
                </ul>
            </nav>
            <footer class="footer bg-gradient hidden-xs">
                <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
                    <i class="fa fa-bars"></i>
                </a>
            </footer>
        </section>
    </aside>
<?php endif;?>