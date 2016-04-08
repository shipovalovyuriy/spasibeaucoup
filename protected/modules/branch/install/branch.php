<?php
/**
 * Файл настроек для модуля branch
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.branch.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.branch.BranchModule',
    ],
    'import'    => [
        'application.modules.branch.models.*',
        'application.modules.teacher.models.*',
    ],
    'component' => [],
    'rules'     => [
        '/branch' => 'branch/branch/index',
        '/branch/<action>' => 'branch/branch/<action>',
        '/branch/<controller>/<action>' => 'branch/<controller>/<action>',
    ],
];