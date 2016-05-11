<?php
/**
 * Файл настроек для модуля city
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.city.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.city.CityModule',
    ],
    'import'    => ['application.modules.city.models.*',],
    'component' => [],
    'rules'     => [
        '/city' => 'city/city/index',
        '/city/<action>' => 'city/city/<action>',
    ],
];