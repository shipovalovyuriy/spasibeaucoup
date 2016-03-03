<script>
    var userId = 0;
    var branchId = <?= $model ?>;
    var userType = 0;// 1 - teacher , 2 - listener
</script>
<?php
    $this->beginWidget('application.modules.listner.widgets.CalendarWidget');
    $this->endWidget();
?>