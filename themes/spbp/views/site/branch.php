<?php $assets = Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web') ?>
    <p style="text-align: center;"><img width="30%" src="<?=$assets?>/images/logosp.png"></p>
        <div class="row" style="text-align: center;">
            <h2>Филиалы</h2>
            <?php foreach($model as $branch):?>
                <a href="/branch/schedule/<?= $branch->id?>" class="btn btn-white btn-lg"><?= $branch->name?></a>
            <?php endforeach;?>
        </div>