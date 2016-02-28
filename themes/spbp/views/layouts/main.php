<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Web Application | todo</title>
        <?php $assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web') ?>
      <!--[if lt IE 9]>
        <script src="js/ie/respond.min.js" cache="false"></script>
        <script src="js/ie/html5.js" cache="false"></script>
        <script src="js/ie/fix.js" cache="false"></script>
      <![endif]-->
    </head>
    <body>
        <section class="hbox stretch">
          <!-- .aside -->
            <aside class="bg-primary aside-sm" id="nav">
                <section class="vbox">
                    <header class="dker nav-bar nav-bar-fixed-top">
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a href="#" class="nav-brand" data-toggle="fullscreen">todo</a>
                        <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user">
                            <i class="fa fa-comment-o"></i>
                        </a>
                    </header>
                    <section>
                      <!-- user -->
                    <div class="bg-success nav-user hidden-xs pos-rlt">
                        <div class="nav-avatar pos-rlt">
                            <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                                <img src="<?= $assets?>/images/avatar.jpg" alt="" class="">
                                <span class="caret caret-white"></span>
                            </a>
                            <ul class="dropdown-menu m-t-sm animated fadeInLeft">
                                <span class="arrow top"></span>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="profile.html">Profile</a>
                                </li>
                                <li>
                                    <a href="#">
                                      <span class="badge bg-danger pull-right">3</span>
                                      Notifications
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="docs.html">Help</a>
                                </li>
                                <li>
                                    <a href="signin.html">Logout</a>
                                </li>
                            </ul>
                            <div class="visible-xs m-t m-b">
                                <a href="#" class="h3">John.Smith</a>
                                <p><i class="fa fa-map-marker"></i> London, UK</p>
                            </div>
                        </div>
                        <div class="nav-msg">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <b class="badge badge-white count-n">2</b>
                            </a>
                            <section class="dropdown-menu m-l-sm pull-left animated fadeInRight">
                                <div class="arrow left"></div>
                                <section class="panel bg-white">
                                    <header class="panel-heading">
                                        <strong>You have <span class="count-n">2</span> notifications</strong>
                                    </header>
                                    <div class="list-group">
                                        <a href="#" class="media list-group-item">
                                            <span class="pull-left thumb-sm">
                                                <img src="images/avatar.jpg" alt="John said" class="img-circle">
                                            </span>
                                            <span class="media-body block m-b-none">
                                                Use awesome animate.css<br>
                                                <small class="text-muted">28 Aug 13</small>
                                            </span>
                                        </a>
                                        <a href="#" class="media list-group-item">
                                            <span class="media-body block m-b-none">
                                                1.0 initial released<br>
                                                <small class="text-muted">27 Aug 13</small>
                                            </span>
                                        </a>
                                    </div>
                                    <footer class="panel-footer text-sm">
                                        <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                                        <a href="#">See all the notifications</a>
                                    </footer>
                                </section>
                            </section>
                        </div>
                      </div>
                      <!-- / user -->
                      <!-- nav -->
                      <nav class="nav-primary hidden-xs">
                        <ul class="nav">
                          <li class="active">
                            <a href="<?= Yii::app()->homeUrl?>">
                              <i class="fa fa-eye"></i>
                              <span>Главная</span>
                            </a>
                          </li>
                          <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-tasks"></i>
                              <span>Календарь</span>
                            </a>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-building-o"></i>
                              <span>Клиентская база</span>
                            </a>
                        </li>
                        <li class="dropdown-submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-bookmark"></i>
                              <span>Список предметов</span>
                            </a>
                          </li>

                        </ul>
                      </nav>
                      <!-- / nav -->
                      <!-- note -->
                      <div class="bg-danger wrapper hidden-vertical animated fadeInUp text-sm">            
                          <a href="#" data-dismiss="alert" class="pull-right m-r-n-sm m-t-n-sm"><i class="fa fa-times"></i></a>
                          Hi, welcome to todo,  you can start here.
                      </div>
                    <!-- / note -->
                    </section>
                    <footer class="footer bg-gradient hidden-xs">
                        <a href="modal.lockme.html" data-toggle="ajaxModal" class="btn btn-sm btn-link m-r-n-xs pull-right">
                            <i class="fa fa-power-off"></i>
                        </a>
                        <a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm">
                            <i class="fa fa-bars"></i>
                        </a>
                    </footer>
                </section>
            </aside>
          <!-- /.aside -->
          <!-- .vbox -->
            <section id="content">
                <section class="vbox">
                    <header class="header bg-white b-b">
                      <p>Welcome to todo application</p>
                    </header>
                    <section class="scrollable wrapper">
                        <?= $content;?>
                    </section>
                    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
                </section>
            <!-- /.vbox -->
            </section>
        </body>
    </html>