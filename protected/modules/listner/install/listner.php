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
        '/listner/<action:\w+>/<id:\d+>' => 'listner/listner/<action>',
        '/listner/subject/lessons/<id:\d+>' => 'listner/listner/subject/list'
    ],
];