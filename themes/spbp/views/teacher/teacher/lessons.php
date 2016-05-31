<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/locale/ru.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<div class="container">
<div class="row">
    <h1 class="page-header">Сводная таблица по учителям</h1>
    <div class="col-lg-6 col-lg-offset-3">



        <label class="control-label">Укажите отчетный месяц</label>
        <div class="input-group date" id="datetimepicker2">
            <input type="text" id="range" class="form-control rm popover-help" name="daterange"/>
                <span class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </span>

        </div>
        <div style="float:left;margin-top:25px;" id="req" class="btn btn-success">Запросить</div>
        </div>

</div>
</div>
<div  id="pizda" style="margin-top:50px;" class="row">

    </div>
<script type="text/javascript">
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            timePicker: false,
            locale: {
                format: 'MM/DD/YYYY',
            }
        });
        $('.rm').click(function(){
            $('.fc-button').remove();
        })
        $('.applyBtn').text('Применить');
        $('.cancelBtn').text('Отмена');
    });
</script>
<script>

    $(function(){

        $('#req').bind('click',function(){
            $('#pizda').children().remove();
            $.ajax({
                url:'/teacher/lessons',
                type:'GET',
                data:{'date':$('#range').val()}
            })
                .done(function(resp){
                    if (resp=='gavno'){alert('Введите отчетный месяц');}else {
                        data = JSON.parse(resp);
                        var str = '<table style="margin:0 auto" class="table-striped table-bordered" id="gavnina"><th>Фамилия</th> <th>Имя</th> <th>Количество часов</th></table>';
                        console.log(data);
                        $('#pizda').append(str);
                        data.forEach(function (item) {
                            str = '<tr><td>' + item.lastname + '</td><td>' + item.firstname + '</td><td>' + item.hours + '</td></tr>';
                            $('#gavnina').append(str);
                        });
                    }

                })
                .error(function(){
                    alert('Введите отчетный месяц');
                });
        })


    })

</script>
