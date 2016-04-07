<?php
/**
 * Файл настроек для модуля teacher
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.teacher.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.teacher.TeacherModule',
    ],
    'import'    => [
        'application.modules.branch.models.*',
    ],
    'component' => [],
    'rules'     => [
        '/teacher' => 'teacher/teacher/index',
        '/teacher/<action>/' => 'teacher/teacher/<action>',
        '/teacher/<action>/<id:\d+>' => 'teacher/teacher/<action>',
    ],
];