
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/locale/ru.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<h3>Выбрать диапазон</h3>

<form method="get" action="/balance/report/show">
    <div class="row">
        <div class="col-lg-5">
            <div class="form-group">
                <label class="control-label" for="daterange">Диапазон формирования отчета</label>
                <input type="text" class="form-control rm popover-help" name="daterange"/>
            </div>
        </div>
    </div>
    <?php if(in_array('1', Yii::app()->user->role)):?>
        <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label class="control-label" for="branch">Филиал</label>
                    <select class="form-control" style="width:10%;" name="branch">
                        <option value="all">Все</option>
                        <?php foreach($model as $value):?>
                           <option value="<?=$value->id?>"><?=$value->name?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
         </div>
    <?php endif;?>
    <input type="submit" class="btn btn-success" value="Сформировать отчет" style="float:left;">
</form>
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


