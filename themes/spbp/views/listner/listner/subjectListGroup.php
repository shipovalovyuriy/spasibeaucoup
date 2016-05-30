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
                <?php if(!$model->groupP->getNext($model->listner_id)):?>
                    <a class="text-right" href="/listner/view/<?= $model->listner_id?>/create/group/<?= $model->group_id?>">
                        <i class="fa fa-plus-circle"></i> Продлить курс
                    </a>
                <?php endif;?>
                <a class="text-right" target="_blank" href="/listner/subject/lessons/<?= $model->id?>/doc">
                    <i class="fa fa-file-o"></i>  Документ
                </a>
            </div>
        </header>
        <div class="list-group bg-white">
            <div class="list-group-item">
                <?php if($model->groupP->getPrev($model->listner_id)):?>
                    <a href="<?= $model->groupP->getPrev($model->listner_id)->id?>">
                        <i class="fa fa-arrow-circle-left"></i><span>  Предыдущее |</span>
                    </a>
                <?php endif;?>
                <?= $model->month;?>
                <?php if($model->groupP->getNext($model->listner_id)):?>
                    <a href="<?= $model->groupP->getNext($model->listner_id)->id?>">
                        <span>| Следующее  </span><i class="fa fa-arrow-circle-right"></i>
                    </a>
                <?php endif;?>
            </div>
            <?php 
            $schdules = Group::model()->findByPk($model->group_id)->schedule;
            foreach($schdules as $schedule):?>
                <div class="list-group-item" <?php if(date('c')>=$schedule->end_time):?>style="text-decoration: line-through;"<?php endif;?>>
                    Урок № <?= $schedule->number .' | '. str_replace('T', ' ', $schedule->start_time) .' | '. $schedule->room->alias?>
                    <?php if($schedule->checkEdit()):?>
                        <a href="/listner/subject/lessons/<?= $model->id?>/update/<?= $schedule->id?>">
                            <i class="fa fa-pencil pull-right"></i>
                        </a>
                    <?php endif;?>
                </div>
            <?php endforeach;?>            
        </div>
    </section>
</div>
