<?php
/**
 * Файл настроек для модуля subject
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.subject.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.subject.SubjectModule',
    ],
    'import'    => [
        'application.modules.teacher.models.*',
        //'application.modules..models.*',
    ],
    'component' => [],
    'rules'     => [
        '/subject' => 'subject/subject/index',
        #'/addTeacher/<i:\d+>/<s:\d+>' => '/addTeacher/'
    ],
];