<div class="row">
    <div class="col-lg-12">
        <h2>Положения утратившие силу</h2>
        <table class="table-striped">
            <th>ID</th>
            <th>Код</th>
            <th>Форма обучения</th>
            <th>Слушатель</th>
            <th>Дата начала</th>
            <th>Статус слушателя</th>
            <th>Действие</th>

            <?php foreach ($model as $value): ?>
                <tr>
                    <td data-id="<?=$value->id?>"><?php echo $value->id; ?></td>
                    <td><?php echo $value->code; ?></td>
                    <td><?php echo $value->form->name; ?></td>
                    <td><?php echo $value->listner->name." ".$value->listner->lastname; ?></td>
                    <td><?php echo $value->start_date; ?></td>
                    <td><?php echo $value->listner->status; ?></td>
                    <td><button class="btn btn-danger closes">Закрыть</button></td>

                </tr>

            <?php endforeach;?>


        </table>

    </div>
</div>

<script>
    $(function(){
        $('.closes').click(function(){

            var id = $(this).parent().siblings().first().html();
            var el = $(this).parent().parent();
            $.ajax({
                    url: '/listner/position/off',
                    type: 'GET',
                    data: {'id': id},
                })
                .done(function() {

                    el.fadeOut(500);

                })
        });
    })
</script>