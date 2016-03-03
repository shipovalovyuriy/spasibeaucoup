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
            <aside class="bg-primary aside-sm nav-vertical" id="nav">
                <section class="vbox">
                      <!-- user -->
                    <div class="bg-success nav-user hidden-xs pos-rlt">
                        <div class="nav-avatar pos-rlt">
                            <a href="#" class="thumb-sm avatar animated rollIn" data-toggle="dropdown">
                                <img src="<?= $assets?>/images/avatar.jpg" alt="" class="">
                                <?php //$this->widget('AvatarWidget', ['user' => $user, 'noCache' => true, 'imageHtmlOptions' => ['width' => 100, 'height' => 100]]); ?>
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
                        <!--div class="nav-msg">
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
                        </div-->
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
                              <a href="/site/branch" class="dropdown-toggle">
                                <i class="fa fa-tasks"></i>
                                <span>Расписание</span>
                              </a>
                            </li>
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
                </section>
            </aside>
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
        </body>
    </html>