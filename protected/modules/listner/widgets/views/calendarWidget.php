
    <div class="panel">
    <div id='calendar'></div>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->getAssetManager()->getPublishedUrl(Yii::app()->theme->basePath . '/web').'/js/initCal.js',CClientScript::POS_END)?>
</div>