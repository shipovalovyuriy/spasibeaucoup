<div class="row">
    <div class="col-lg-5">
        <h1 class="page-header">Список студентов</h1>
        <table class="table-striped">
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Телефон</th>
            <?php foreach ($list as $value): ?>
                <tr>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->lastname; ?></td>
                    <td><?php echo $value->phone; ?></td>

                </tr>

            <?php endforeach;?>
        </table>

    </div>
</div>

<script>
    var userId = <?= $model->id ?>;
    var branchId = <?= $model->branch_id ?>;
    var userType = 1;// 1 - teacher , 2 - listener
</script>
<?php
$this->beginWidget('application.modules.listner.widgets.CalendarWidget');
$this->endWidget();
?>