<link href='../fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='../lib/moment.min.js'></script>
<script src='../lib/jquery.min.js'></script>
<script src='../fullcalendar.min.js'></script>
<?php
Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/blog.js');
Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/bootstrap-notify.js');
Yii::app()->getClientScript()->registerScriptFile($this->mainAssets . '/js/jquery.li-translit.js');
?>
<script>

$(document).ready(function() {

    $('#calendar').fullCalendar({
			defaultDate: '2016-01-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
                    title: 'All Day Event',
					start: '2016-01-01'
				},
				{
                    title: 'Long Event',
					start: '2016-01-07',
					end: '2016-01-10'
				},
				{
                    id: 999,
					title: 'Repeating Event',
					start: '2016-01-09T16:00:00'
				},
				{
                    id: 999,
					title: 'Repeating Event',
					start: '2016-01-16T16:00:00'
				},
				{
                    title: 'Conference',
					start: '2016-01-11',
					end: '2016-01-13'
				},
				{
                    title: 'Meeting',
					start: '2016-01-12T10:30:00',
					end: '2016-01-12T12:30:00'
				},
				{
                    title: 'Lunch',
					start: '2016-01-12T12:00:00'
				},
				{
                    title: 'Meeting',
					start: '2016-01-12T14:30:00'
				},
				{
                    title: 'Happy Hour',
					start: '2016-01-12T17:30:00'
				},
				{
                    title: 'Dinner',
					start: '2016-01-12T20:00:00'
				},
				{
                    title: 'Birthday Party',
					start: '2016-01-13T07:00:00'
				},
				{
                    title: 'Click for Google',
					url: 'http://google.com/',
					start: '2016-01-28'
				}
			]
		});

	});

</script>
<style>

body {
    margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>

	<div id='calendar'></div>

