$(document).ready(function(){
    var userId = 0;
    var branchId = 1;
    var userType = 0;// 1 - teacher , 2 - listener
    var obj = {
        now: new Date(),
        editable: false,
        lang:'ru',
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        aspectRatio: 1.8,
        eventLimit: true,
        height:600,
        scrollTime: '00:00',
        minTime: "09:00:00",
        maxTime: "21:00:00",

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
        resourceAreaWidth: '20%',
        resourceColumns: [
            {
                labelText: 'Аудитория',
                field: 'alias',
            },
            {
                labelText: 'Вместительность',
                field: 'capacity',
            }
        ],
        resources: {
            url: '/GetPositions/'+branchId,
        },
        events: {
            url:'/GetSchedules/'+userType+'/'+userId,
        }
    };


    $('#calendar').fullCalendar(obj);


});
