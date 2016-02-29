$(document).ready(function(){
    var listenerId = null;
    var teacherId = null;
    var obj = {
        now: new Date(),
        editable: false,
        lang:'ru',
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
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
        resourceAreaWidth: '50%',
        resourceColumns: [
            {
                group: true,
                labelText: 'Филиал',
                field: 'name'
            },
            {
                labelText: 'Аудитория',
                field: 'alias'
            },
            {
                labelText: 'Вместительность',
                field: 'capacity'
            }
        ],
        resources: {
            url: '/getPositions',
        },
        events: {
            url:'/GetSchedules'
        }
    };

    console.log(obj);

    $('#calendar').fullCalendar(obj);


});
