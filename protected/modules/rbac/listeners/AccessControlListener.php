<?php

use yupe\components\Event;

class AccessControlListener
{
    public static function onBackendControllerInit(Event $event)
    {
        $filters = Yii::app()->getModule('yupe')->getBackendFilters();
        $filters = array_replace(
            $filters,
            array_fill_keys(
                array_keys($filters, ['yupe\filters\YBackAccessControl']),
                ['rbac\filters\RbacBackAccessControl']
            )
        );
        Yii::app()->getModule('yupe')->setBackendFilters($filters);
        Yii::app()->getModule('yupe')->addBackendFilter('accessControl');
    }
    public static function onFrontControllerInit(Event $event)
    {
        $filters = Yii::app()->getModule('yupe')->getBackendFilters();
        $filters = array_replace(
            $filters,
            array_fill_keys(
                array_keys($filters, ['yupe\filters\YFrontAccessControl']),
                ['rbac\filters\RbacFrontAccessControl']
            )
        );
        Yii::app()->getModule('yupe')->setBackendFilters($filters);
        Yii::app()->getModule('yupe')->addBackendFilter('accessControl');
    }
}
