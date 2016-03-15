
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<h3>Выбрать диапазон</h3>

<form method="GET" action="/balance/show">
<input type="text" name="daterange" value="01/01/2016 - 01/01/2016" />
    <input type="submit">
 </form>
<script type="text/javascript">
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            timePicker: false,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY'
            }
        });
    });
</script>


