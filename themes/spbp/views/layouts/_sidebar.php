<?php if(!Yii::app()->user->isGuest):
    $role = Yii::app()->user->role;
?>
    <aside class="bg-primary aside-sm" id="nav">
        <section class="vbox">
            <!-- user -->
            <div class="bg-success nav-user hidden-xs pos-rlt">
                <div class="nav-avatar pos-rlt">
                    <a href="<?= Yii::app()->homeUrl?>" class="thumb-sm avatar animated rollIn">
                        <img src="<?=$assets?>/images/logosp.png" alt="" class="">
                        <span class="caret caret-white"></span>
                    </a>
                </div>
                <div class="nav-msg">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <b class="badge badge-black count-n"><?= Yii::app()->user->name?></b>
                    </a>
                    <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                        <div class="arrow left"></div>
                            <section class="panel bg-white">
                                <header class="panel-heading">
                                    <strong>Основная информация <span class="count-n">о</span> сотруднике</strong>
                                </header>
                                <div class="list-group">
                                    <a href="#" class="media list-group-item">
                                        <span class="media-body block m-b-none">
                                            <?= Yii::app()->user->fullName?><br>
                                            <small class="text-muted"><?= Yii::app()->user->post->role->name?></small>
                                        </span>
                                    </a>
                                </div>
                                <footer class="panel-footer text-sm">
                                    <a href="/logout">
                                        Выход
                                        <i class="fa fa-sign-out pull-right"></i>
                                    </a>
                                </footer>
                            </section>
                    </section>
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
                    <?php $roles=['1']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/city">
                                <i class="fa fa-certificate"></i>
                                <span>Города</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['3']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/branch/schedule/<?= Yii::app()->user->branch->id?>">
                                <i class="fa fa-certificate"></i>
                                <span>Расписание</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-tasks"></i>
                                <span>Филиал</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/branch">Филиалы</a>
                                </li>
                                <li>
                                    <a href="/branch/room/index">Аудитории</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','5', '3']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bars"></i>
                                <span>Тарифы</span>
                            </a>
                            <ul class="dropdown-menu">
                            <?php $roles=['1']; if(array_intersect($role, $roles)):?>
                                <li>
                                    <a href="/listner/type/index">Формы обучения</a>
                                </li>
                            <?php endif;?>
                                <li>
                                    <a href="/listner/form/index">Тарифы</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','5','3','2']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="/listner/all">
                                <i class="fa fa-building-o"></i>
                                <span>Клиентская база</span>
                            </a>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','5','3','2','4']; if(array_intersect($role, $roles)):?>
                        <li class="dropdown-submenu">
                            <a href="#">
                                <i class="fa fa-building-o"></i>
                                <span>База преподавателей</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/teacher">Список преподавателей</a>
                                </li>
                            <?php $roles=['1','5','4']; if(array_intersect($role, $roles)):?>
                                <li>
                                    <a href="/teacher/lessons">Сводная таблица</a>
                                </li>
                            <?php endif;?>
                            </ul>
                        </li>
                    <?php endif;?>
                    <?php $roles=['1','5','3','2','4']; if(array_intersect($role, $roles)):?>
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
                                    <a href="/balance/report">Сформировать</a>
                                </li>
                                <li>
                                    <a href="/balance/inflow">Доход</a>
                                </li>
                                <li>
                                    <a href="/balance/outflow">Расход</a>
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
                            <a href="/role">
                                <i class="fa fa-user-plus"></i>
                                <span>Должности</span>
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
                </ul>
            </nav>
        </section>
    </aside>
<?php endif;?>