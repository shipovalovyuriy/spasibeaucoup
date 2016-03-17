
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/locale/ru.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<h3>Выбрать диапазон</h3>

<form method="GET" action="/balance/show">
    <div class="col-lg-6">
        <input type="text" class="form-control rm popover-help" name="daterange"/>
    </div>
    <input type="submit" class="btn btn-success">
</form>
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


