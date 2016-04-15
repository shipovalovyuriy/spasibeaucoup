<?php
/**
 * Файл настроек для модуля listner
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.listner.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.listner.ListnerModule',
    ],
    'import'    => [
        'application.modules.listner.models.*',
        'application.modules.subject.models.*',
    ],
    'component' => [],
    'rules'     => [
        //'/listner' => 'listner/listner/index',
        '/listner/<action>' => 'listner/listner/<action>',
        '/listner/<action>/<id:\d+>' => 'listner/listner/<action>',
        '/listner/view/<id:\d+>/create' => 'listner/position/create',
        '/listner/view/<id:\d+>/create/<parent_id:\d+>' => 'listner/position/createNext',
        '/listner/subject/lessons/<id:\d+>' => 'listner/listner/subject/',
        '/listner/subject/lessons/group/<id:\d+>' => 'listner/listner/subjectGroup/',
        '/listner/subject/lessons/<group_id:\d+>/update/<id:\d+>' => 'listner/schedule/update/',
        '/listner/subject/lessons/<position_id:\d+>/update/<id:\d+>' => 'listner/schedule/update/',
        '/listner/subject/lessons/<id:\d+>/doc' => 'listner/position/doc',
        '/listner/<controller>/<action>' => 'listner/<controller>/<action>',
        '/listner/positon/create/<id:\d+>' => 'listner/position/create',
    ],
];