<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?=Yii::app()->getModule('yupe')->siteName .' | '.   Yii::app()->controller->action->id?></title>
        <?php $assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web') ?>
    </head>
    <body>
        <section class="hbox stretch">
          <!-- .aside -->
            <?php if(!Yii::app()->user->isGuest):?>
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
                                    <b class="badge badge-black count-n"><?= Yii::app()->user->branch->name;?></b>
                                </a>                            
                            </div>
                        </div>
                          <!-- / user -->
                          <!-- nav -->
                        <nav class="nav-primary hidden-xs ">
                            <ul class="nav ">
                                <li>
                                  <a href="<?= Yii::app()->homeUrl?>">
                                    <i class="fa fa-eye"></i>
                                    <span>Главная</span>
                                  </a>
                                </li>
<!--                                <li>
                                  <a href="/site/branch">
                                    <i class="fa fa-tasks"></i>
                                    <span>Расписание</span>
                                  </a>
                                </li>-->
                                <li class="dropdown-submenu">
                                    <a href="/listner/all">
                                        <i class="fa fa-building-o"></i>
                                        <span>Клиентская база</span>
                                    </a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="/teacher">
                                        <i class="fa fa-building-o"></i>
                                        <span>База преподавателей</span>
                                    </a>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="/subject">
                                        <i class="fa fa-bookmark"></i>
                                        <span>Список предметов</span>
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
            <!-- /.aside -->
            <!-- .vbox -->
            <section id="content">
                <section class="vbox">
                    <section class="scrollable wrapper">
                        <?= $content;?>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                </section>
            <!-- /.vbox -->
            </section>
        </section>
        <script>
               $(function(){
                    var path = window.location.pathname;
                path = decodeURIComponent(path);
                $(".nav a").each(function () {
                    var href = $(this).attr('href');
                    if (path === href) {
                        var item = $(this).closest('li');
                        item.addClass('active');
                        if(item.hasClass('sub-nav')){
                            item.closest('.dropdown').addClass('active');
                        }
                    }
                });
               });
        </script>
    </body>
</html>