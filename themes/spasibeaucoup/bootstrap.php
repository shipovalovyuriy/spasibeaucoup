<?php
/**
 * Theme bootstrap file.
 */
// We need to do this to ensure that assets was published even if we don't use any booster widget on the page
if (Yii::app()->hasComponent('bootstrap')) {
    Yii::app()->getComponent('bootstrap');
}
// Get clientScript component
$clientScript = Yii::app()->getClientScript();

// папка с ресурсами темы (по умолчанию web) будет опубликована и возвращен публичный url для неё
$assetManager = Yii::app()->getAssetManager();

// Publish theme assets, note that we keep assets in web folder
$assetPath = $assetManager->publish(
    Yii::app()->theme->basePath . '/web'
);
$styles = array(
    'icons/icomoon/styles.css',
    'bootstrap.css',
    'core.css',
    'components.css',
    'colors.css',
//    '../js/fullcalendar/fullcalendar.css',
//    '../js/fullcalendar/scheduler.min.css',
);

foreach ($styles as $style) {
    $clientScript->registerCssFile($assetPath . '/css/' . $style);
}

// Javascript
$scripts = array(

    'plugins/loaders/pace.min.js'=> CClientScript::POS_END,
    'core/libraries/jquery.min.js'=> CClientScript::POS_END,
    'core/libraries/bootstrap.min.js'=> CClientScript::POS_END,
    'plugins/loaders/blockui.min.js'=> CClientScript::POS_END,
    'plugins/visualization/d3/d3.min.js'=> CClientScript::POS_END,
    'plugins/visualization/d3/d3_tooltip.js'=> CClientScript::POS_END,
    'plugins/forms/styling/switchery.min.js'=> CClientScript::POS_END,
    'plugins/forms/styling/uniform.min.js'=> CClientScript::POS_END,
    'plugins/forms/selects/bootstrap_multiselect.js' => CClientScript::POS_END,    
    'plugins/ui/moment/moment.min.js '=> CClientScript::POS_END,
    'plugins/pickers/daterangepicker.js' => CClientScript::POS_END,
    '/plugins/ui/nicescroll.min.js' => CClientScript::POS_END,
    'core/app.js' => CClientScript::POS_END,
    'pages/dashboard.js' => CClientScript::POS_END,
    'pages/layout_fixed_custom.js' => CClientScript::POS_END,
//    'fullcalendar/moment.min.js'=> CClientScript::POS_END,
//    'fullcalendar/fullcalendar.js'=> CClientScript::POS_END,
//    'fullcalendar/ru.js'=> CClientScript::POS_END,
//    'fullcalendar/scheduler.min.js'=> CClientScript::POS_END,
//    'initCal.js'=> CClientScript::POS_END,

);

foreach ($scripts as $script => $position) {
    $clientScript->registerScriptFile($assetPath . '/js/' . $script, $position);
}


$clientScript->registerPackage('jquery');
$clientScript->registerLinkTag('shortcut icon', null, $assetPath . '/images/favicon.ico');