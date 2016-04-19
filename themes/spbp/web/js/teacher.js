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
        }
    });
    $('#clearTime').click(function(){
        $('#bbt').removeClass('btn-success');
        $('#bbt').addClass('btn-danger');
        $('#bbt').html('Проверить аудитории');
    });
    $('#bbt').click(function(){
        var branch = $('#branch_id').val();
        if($('#Position_group_id').val()){
            var group = $('#Position_group_id').val();
        }else{
            var group = 0;
        }
        $.ajax({
                type:'GET',
                url:'/listner/position/room?start_time='+$('#yw0').val(),
                data:{
                    branch_id:branch,
                    group_id:group,
                    flag:$('#Position_group').val()

                }
            })
            .done(function(data){

                $('#ttt').fadeIn(300);
                if (data=='No room'){alert('Нет свободных комнат на это время')

                    $('#bbt').removeClass('btn-success');
                    $('#bbt').addClass('btn-danger');
                    $('#bbt').html('Проверить аудитории');

                }else{
                //$('#ggg').fadeIn();
                $('#bbt').removeClass('btn-danger');
                    $('#bbt').addClass('btn-success');
                    $('#bbt').html('Имеются');
                }
            });


    });
});