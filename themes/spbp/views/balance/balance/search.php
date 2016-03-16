<a href="/balance/print">Скачать в excel</a>
<div class="row">
    <div class="col-lg-5">
        <h2>Приход</h2>
        <table class="table-striped">
            <th>Дата</th>
            <th>Код предмета</th>
            <th>Получатель</th>
            <th>Оплата</th>
            <th>Основание</th>
            <th>Комментарий</th>
            <?php foreach ($inflow as $value): ?>
                <tr>
                    <td><?php echo $value->date; ?></td>
                    <td><?php echo $value->subject->code; ?></td>
                    <td><?php echo $value->receiver; ?></td>
                    <td><?php echo $value->form->price; ?></td>
                    <td><?php echo $value->based; ?></td>
                    <td><?php echo $value->comment; ?></td>

                </tr>

            <?php endforeach;?>


        </table>

    </div>

    <div class="col-lg-5 col-lg-offset-1">
        <h2>Расход</h2>
        <table class="table-striped">
            <th>Дата</th>
            <th>Шифр</th>
            <th>Получатель</th>
            <th>Сумма</th>
            <th>Основание</th>
            <th>Комментарий</th>
            <?php foreach ($outflow as $value): ?>
                <tr>
                    <td><?php echo $value->date?></td>
                    <td><?php echo $value->cost->name?></td>
                    <td><?php echo $value->receiver; ?></td>
                    <td><?php echo $value->price; ?></td>
                    <td><?php echo $value->based; ?></td>
                    <td><?php echo $value->note; ?></td>
                </tr>
            <?php endforeach;?>
        </table>

    </div>
</div>
<div class="row">
    <div class="col-lg-5">
        <h2>Итог</h2>
        <table class="table-striped">
            <th>Дата</th>
            <th>Приход</th>
            <th>Расход</th>
            <?php foreach ($totalflow as $value): ?>
                <tr>
                    <td><?php echo $value['date']; ?></td>
                    <td><?php echo $value['inflow']; ?></td>
                    <td><?php echo $value['outflow']; ?></td>

                </tr>

            <?php endforeach;?>
            <th>Итог</th>
            <tr>
                <td><?php $x = array_pop($totalflow); echo $x['total']?></td>
            </tr>

        </table>

    </div>
</div>

<?php

$_GET['inflow'] = $inflow;
$_GET['outflow'] = $outflow;
$_GET['totalFlow'] = $totalflow;

?>