$(document).ready(function(){
    //var userId = 1;
    //var branchId = 1;
    //var userType = 2;// 1 - teacher , 2 - listener
    var obj = {
        now: new Date(),
        editable: false,
        lang:'ru',
        schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
        aspectRatio: 1.8,
        eventOverlap:false,
        eventLimit: true,
        displayEventEnd:true,
        height:600,
        scrollTime: '00:00',
        minTime: "09:00:00",
        maxTime: "21:00:00",
        slotLabelFormat: [
            'H:mm', // top level of text
        ],
        slotWidth:100,
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
        },
        eventRender: function(event, element) {
            element.find('.fc-title').append("<br/>" + event.desc);
            element.find('.fc-title').append("<br/>" + event.subj);
        }
    };


    $('#calendar').fullCalendar(obj);

});
