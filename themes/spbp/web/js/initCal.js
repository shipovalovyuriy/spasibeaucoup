$(document).ready(function(){
    var listenerId = null;
    var teacherId = null;
    var obj = {
        now: '2016-01-07',
        editable: true,
        lang:'ru',
        aspectRatio: 1.8,
        scrollTime: '00:00',
        header: {
            left: 'today prev,next',
            center: 'title',
            right: 'timelineDay,timelineThreeDays,agendaWeek'
        },
        defaultView: 'timelineDay',
        views: {
            timelineThreeDays: {
                type: 'timeline',
                duration: {days: 3}
            }
        },
        resourceAreaWidth: '40%',
        resourceColumns: [
            {
                group: true,
                labelText: 'Филиал',
                field: 'building'
            },
            {
                labelText: 'Аудитория',
                field: 'title'
            },
            {
                labelText: 'Вместительность',
                field: 'occupancy'
            }
        ],
        resources: [
        ],
        events: [
            {id: '1', resourceId: '1', start: '2016-01-07T02:00:00', end: '2016-01-07T07:00:00', title: 'event 1'},
            {id: '2', resourceId: '1', start: '2016-01-07T05:00:00', end: '2016-01-07T22:00:00', title: 'event 2'},
        ]
    };

    console.log(obj);
    $.ajax({
        url: 'site/getPositions',
        type: 'GET',
        data: {'listenerId':listenerId,'teacherId':teacherId}
    })
    .done(function(resp) {

        var data = JSON.parse(resp);

        obj.resources = data;

    })
    .fail(function() {
        console.log("error");
    });


    $('#calendar').fullCalendar(obj);


});
