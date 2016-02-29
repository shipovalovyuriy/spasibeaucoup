<?php $assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web') ?>
    <p style="text-align: center;"><img width="30%" src="<?=$assets?>/images/logosp.png"></p>
        <div class="row" style="text-align: center;">
            <h2>Клиентская база</h2>
            <a href="/listner/all" class="btn btn-white btn-lg">
                Общая
            </a>
            <a href="/listner/current" class="btn btn-white btn-lg">Студенты</a>
            <a href="/listner/graduates" class="btn btn-white btn-lg">Выпускники</a>
            <a href="/listner/potential" class="btn btn-white btn-lg">Потенциальные</a>
        </div>