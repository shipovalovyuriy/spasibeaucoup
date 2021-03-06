<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Admin <?=Yii::app()->getModule('yupe')->siteName?></title>
        <?php $assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web') ?>
    </head>
    <body>
        <section class="hbox stretch">
          <!-- .aside -->
            <?php $this->renderPartial('//layouts/_sidebar', ['assets' => $assets]);?>
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