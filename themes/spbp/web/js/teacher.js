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
        var form = $('#Position_form_id').val();
        var subject = $('#Position_subject_id').val();
        var branch = $('#branch_id').val();
        if(time){
            $.ajax({
                type: 'GET',
                url: '/listner/position/getTeacher?time='+time,
                dataType: 'json',
                data:{
                    form: form,
                    subject: subject,
                    branch: branch
                },
            }).done(function(data){
                console.log(data);
                $('.teachers').remove();
                data.forEach(function(item){
                        teacher.append('<option class="teachers" value="'+item.id+'">'+item.user.last_name + ' ' + item.user.first_name+'</option>');
                    })
            })
            $.ajax({
                type:'GET',
                url:'/listner/position/room',
                data:{
                    branch_id:branch,
                    time:$('#yw0').val(),
                    group_id:$('#Position_group_id').val(),
                    flag:$('#Position_group').val()

                }
            })
                .done(function(data){
                    if (data=='No room'){alert('Нет свободных комнат на это время')}
                });
        }
    });
});