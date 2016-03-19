$(function(){
    $('#datetimepicker1').datetimepicker({
            locale: 'ru',
            stepping: 30,
            enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20],
            format: 'YYYY-MM-DDTHH:mm',
    });
    $('#addTime').click(function(){
        var teacher = $('#Position_teacher_id');
        var time = $('.totalTime').val();
        if(time){
            $.ajax({
                type: 'GET',
                url: '/listner/position/getTeacher?time='+time,
                dataType: 'json',
                data:{},
            }).done(function(data){
                $('.teachers').remove();
                data.forEach(function(item){
                        teacher.append('<option class="teachers" value="'+item.id+'">'+item.user.first_name + ' ' + item.user.last_name+'</option>');
                    })
            })
        }
    });
});