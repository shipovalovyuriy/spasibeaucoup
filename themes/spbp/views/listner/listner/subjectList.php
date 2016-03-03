<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Просмотр') . ' ' . Yii::t('ListnerModule.listner', 'Расписания Студента').' Номер листа учета №'.$model->code ?>        <br/>
        <a href="/listner/view/<?= $model->listner->id?>"><small>&laquo;<?php echo $model->listner->name . ' ' . $model->listner->lastname ?>&raquo;</small></a>
    </h1>
</div>
<div class="col-lg-12">
    <section class="panel portlet-item">
        <header class="panel-heading"><?= $model->subject->name?></header>         
        <div class="list-group bg-white">
            <a href="#" class="list-group-item">
                <i class=""></i> Март
            </a>
            <?php foreach($model->schedule as $schedule):?>
                <a href="#" class="list-group-item">
                    <i class=""></i> Урок № <?= $schedule->number .' | '. str_replace('T', ' ', $schedule->start_time)?>
                </a>
            <?php endforeach;?>
        </div>
    </section>
</div>
