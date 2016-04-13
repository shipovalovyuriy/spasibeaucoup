<div class="row">
    <div class="col-lg-12">
        <h2>Сводная таблица по учителям</h2>
        <table class="table-striped">
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