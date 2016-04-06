<div class="page-header">
    <h1>
        <?php echo Yii::t('ListnerModule.listner', 'Просмотр') . ' ' . Yii::t('ListnerModule.listner', 'Расписания Студента').' Номер листа учета №'.$model->code ?>        <br/>
        <a href="/listner/view/<?= $model->listner->id?>"><small>&laquo;<?php echo $model->listner->name . ' ' . $model->listner->lastname ?>&raquo;</small></a>
    </h1>
</div>
<div class="col-lg-12">
    <section class="panel portlet-item">
        <header class="panel-heading"><?= $model->subject->name?> 
            <div class="pull-right">
                <a class="text-right" href="#">
                    <i></i>
                </a>
                <a class="text-right" href="/listner/position/create?id=<?= $model->listner_id?>&pid=<?= $model->id?>">
                    <i class="fa fa-plus-circle"></i> Продлить курс
                </a>
                <a class="text-right" href="/listner/position/doc?id=<?= $model->id?>">
                    <i class="fa fa-file-o"></i>  Документ
                </a>
            </div>
        </header>
        <div class="list-group bg-white">
            <div class="list-group-item">
                <?php if($model->prev):?>
                    <a href="<?= $model->prev->id?>">
                        <i class="fa fa-arrow-circle-left"></i><span>Предыдущее |</span>
                    </a>
                <?php endif;?>
                <?= $model->month;?>
                <?php if($model->next):?>
                    <a href="<?= $model->next->id?>">
                        <span>| Следующее</span><i class="fa fa-arrow-circle-right"></i>
                    </a>
                <?php endif;?>
            </div>
            <?php foreach($model->schedule as $schedule):?>
                <a href="#" class="list-group-item" <?php if($schedule->start_time):?>style="text-decoration: line-through;"<?php endif;?>>
                    <i class=""></i> Урок № <?= $schedule->number .' | '. str_replace('T', ' ', $schedule->start_time)?>
                </a>
            <?php endforeach;?>            
        </div>
    </section>
</div>
