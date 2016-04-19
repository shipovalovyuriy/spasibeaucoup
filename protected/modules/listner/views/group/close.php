

<?php
$this->widget('yupe\widgets\FrontGridView',
    [
        'id' => 'group-grid',
        'type' => 'striped condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => [
            'id',
            'name',
            'lvl',
            'note',
            'is_active',
// 'branch_id',
// 'email',
            [
                'header' => 'Закрыть группу',
                'class' => 'yupe\widgets\FrontButtonColumn',
                'template' => '{gavno}',
                'buttons' => [
                    'gavno' => [
                        'icon' => 'fa fa-fw fa-lock',
                        'label' => Yii::t('Закрыть','Закрыть'),
                        'url' => 'array("/listner/group/off", "id" => $data->id)',
                    ],
                ],
            ],
        ],
    ]
); ?>