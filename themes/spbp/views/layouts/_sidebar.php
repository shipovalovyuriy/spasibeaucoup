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
                        <b class="badge badge-black count-n"><?php Yii::app()->user->post->role->name?></b>
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
                        <a href="#">
                            <i class="fa fa-tasks"></i>
                            <span>Расписание</span>
                        </a>
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
                    <li class="dropdown-submenu">
                        <a href="/balance/index">
                            <i class="fa fa-file-text"></i>
                            <span>Отчет</span>
                        </a>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="/teacher/schedule/<?=Yii::app()->user->teacher?>">
                            <i class="fa fa-file-text"></i>
                            <span>Мое расписание</span>
                        </a>
                    </li>
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