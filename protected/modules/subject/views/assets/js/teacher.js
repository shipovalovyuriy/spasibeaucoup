$('.connectedSortable').on('receive',function(event, ui){
    console.log(1);
    e.preventDefault();
    var temp = ui.item;
    $.ajax({
        type: 'GET',
        url: '/backend/subject/subject/addTeacher/'+temp.attr('id'),
        dataType: 'json',
        data:{},
        success: function(data) {
            alert('success');
        },
    }).then(function(){
        $('.trash').click(function(){
            $('.faq-hidden').removeClass('show');
            elem.removeClass('active');
            
        });
        $('.faq').click(function(){
            $("li.active").removeClass("active");
            $(this).parent().addClass('active');
        });
        $('.main').on('click','.yiiPager', function(){
            elem.removeClass('active');
        });
    })
});