$(document).ready(function(){

    if (adminMode==true){
        var time = new Date();
        var timeMin = time.getHours();
        var timeMax = time.getHours()+3;
        var timeModmin = timeMin+":00:00";
        var timeModmax = timeMax+":00:00";
        var left = '';
        var right = '';
    }else{
        var timeModmin = "09:00:00";
        var timeModmax = "21:00:00";
        var left = 'today prev,next';
        var right = 'timelineDay,timelineThreeDays,agendaWeek';
    }

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
        minTime: timeModmin,
        maxTime: timeModmax,
        slotLabelFormat: [
            'H:mm', // top level of text
        ],
        slotWidth:100,
        header: {
            left: left,
            center: 'title',
            right: right,
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
/*        events: {
            url:'/GetSchedules/'+userType+'/'+userId,
        },*/
        events: function(start, end, timezone, callback) {
            moment = $('#calendar').fullCalendar('getDate');
            console.log(moment.format());
            $.ajax({
                url: '/GetSchedules/'+userType+'/'+userId,
                data: {
                    start:moment.format(),
                },
                success: function(doc) {
                    console.log(JSON.parse(doc));
                    var data = JSON.parse(doc);
                    var events = [];
                    $.each(data,function(index,el){
                        events.push({
                            id: el.id,
                            resourceId: el.resourceId,
                            start: el.start,
                            end: el.end,
                            title: el.title,
                            desc: el.desc,
                            subj: el.subj,
                            height: el.height,
                            backgroundColor: el.backgroundColor,
                        });
                    });

                    callback(events);
                }
            });
        },
        eventRender: function(event, element) {
            element.find('.fc-title').append("<br/>" + event.desc);
            element.find('.fc-title').append("<br/>" + event.subj);
        }
    };

    $('#calendar').fullCalendar(obj);
});
