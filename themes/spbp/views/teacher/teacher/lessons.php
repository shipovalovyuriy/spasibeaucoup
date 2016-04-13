<div class="row">
    <h1 class="page-header">Сводная таблица по учителям</h1>
    <div class="col-lg-6 col-lg-offset-3">
        <table style="margin:0 auto" class="table-striped table-bordered">
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Количество часов</th>

            <?php foreach ($model as $value): ?>
                <tr>
                    <td ><?php echo $value['lastname']; ?></td>
                    <td><?php echo $value['firstname']; ?></td>
                    <td><?php echo $value['hours']; ?></td>


                </tr>

            <?php endforeach;?>


        </table>

    </div>
</div>