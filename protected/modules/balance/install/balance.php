<?php
/**
 * Файл настроек для модуля balance
 *
 * @author yupe team <team@yupe.ru>
 * @link http://yupe.ru
 * @copyright 2009-2016 amyLabs && Yupe! team
 * @package yupe.modules.balance.install
 * @since 0.1
 *
 */
return [
    'module'    => [
        'class' => 'application.modules.balance.BalanceModule',
    ],
    'import'    => [],
    'component' => [],
    'rules'     => [
        '/balance' => 'balance/balance/index',
        '/balance/<action>' => 'balance/balance/<action>',
    ],
];