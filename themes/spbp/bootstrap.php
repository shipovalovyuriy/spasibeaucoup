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
    'bootstrap.css',
    'animate.css',
    'font-awesome.min.css',
    'font.css',
    'plugin.css',
    'app.css',
    '../js/fullcalendar/fullcalendar.css',
    '../js/fullcalendar/scheduler.min.css',
    'bootstrap-datetimepicker.min.css',
    //'../js/datepicker/datepicker.css'
);

foreach ($styles as $style) {
    $clientScript->registerCssFile($assetPath . '/css/' . $style);
}

// Javascript
$scripts = array(
    //'jquery.min.js' => CClientScript::POS_HEAD,
    'bootstrap.js' => CClientScript::POS_END,
    'charts/sparkline/jquery.sparkline.min.js' => CClientScript::POS_END,
    'app.js' => CClientScript::POS_END,
    'app.plugin.js' => CClientScript::POS_END,
    'app.data.js' => CClientScript::POS_END,
    'fullcalendar/moment.min.js'=> CClientScript::POS_END,
    'fullcalendar/fullcalendar.js'=> CClientScript::POS_END,
    'fullcalendar/ru.js'=> CClientScript::POS_END,
    'fullcalendar/scheduler.min.js'=> CClientScript::POS_END,
    'initCal.js'=> CClientScript::POS_END,
    //'jquery.ui.timepicker.ru.js' => CClientScript::POS_END,
    'bootstrap-datetimepicker.js'=> CClientScript::POS_END,
    'teacher.js'=> CClientScript::POS_END,
    //'datepicker/bootstrap-timepicker.js'=> CClientScript::POS_END,
    /*'plugins/revslider/js/jquery.themepunch.revolution.min.js' => CClientScript::POS_END,
    'plugins/thumbscroller/jquery-ui-1.8.13.custom.min.js' => CClientScript::POS_END,
    'plugins/thumbscroller/jquery.thumbnailScroller.js' => CClientScript::POS_END,
    'plugins/revslider/js/jquery.themepunch.plugins.min.js' => CClientScript::POS_END,
    'plugins/flexslider/jquery.flexslider-min.js' => CClientScript::POS_END,
    'plugins/magnificpopup/jquery.magnific-popup.min.js' => CClientScript::POS_END,
    'jquery.countTo.js' => CClientScript::POS_END,
    'contact-form.js' => CClientScript::POS_END,
    'singlePageNav.js' => CClientScript::POS_END,
    'main.js' => CClientScript::POS_END,
    'demo.js' => CClientScript::POS_END,*/
);

foreach ($scripts as $script => $position) {
    $clientScript->registerScriptFile($assetPath . '/js/' . $script, $position);
}


$clientScript->registerPackage('jquery');
$clientScript->registerLinkTag('shortcut icon', null, $assetPath . '/images/favicon.ico');