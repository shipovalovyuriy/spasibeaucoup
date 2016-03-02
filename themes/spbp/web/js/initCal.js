$(document).ready(function(){
    var userId = 2;
    var branchId = 1;
    var userType = 1;// 1 - teacher , 2 - listener
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
                labelText: 'Аудитория',
                field: 'alias'
            },
            {
                labelText: 'Вместительность',
                field: 'capacity'
            }
        ],
        resources: {
            url: '/GetPositions/'+branchId,
        },
        events: {
            url:'/GetSchedules/'+userType+'/'+userId,
        }
    };

    console.log(obj);

    $('#calendar').fullCalendar(obj);


});
