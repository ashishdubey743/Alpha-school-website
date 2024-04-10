(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Sidebar Toggler
    $('.sidebar-toggler').click(function () {
        $('.sidebar, .content').toggleClass("open");
        return false;
    });


    // Progress Bar
    $('.pg-bar').waypoint(function () {
        $('.progress .progress-bar').each(function () {
            $(this).css("width", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Calender
    $('#calender').datetimepicker({
        inline: true,
        format: 'L'
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: true,
        loop: true,
        nav : false
    });


    
})(jQuery);

function delete_teacher(id, ref){
    $.ajax({
        url: 'remove_teacher',
        type: 'POST',
        dataType: 'json',
        data:{
            id:id,
            "_token": $('#token').val()
        },
        success: function(data) {
            ref.closest('tr').remove();
        }
    });
}

function delete_query(id, ref){
    $.ajax({
        url: '/delete_query',
        type: 'POST',
        dataType: 'json',
        data:{
            id:id,
            "_token": $('#token').val()
        },
        success: function(data) {
            ref.closest('tr').remove();
        }
    });
}

function delete_task(id, ref){
    $.ajax({
        url: '/delete_task',
        type: 'POST',
        dataType: 'json',
        data:{
            id:id,
            "_token": $('#token').val()
        },
        success: function(data) {
            ref.closest('tr').remove();
        }
    });
}

function delete_student(id, ref){
    $.ajax({
        url: '/delete_student',
        type: 'POST',
        dataType: 'json',
        data:{
            id:id,
            "_token": $('#token').val()
        },
        success: function(data) {
            ref.closest('tr').remove();
        }
    });
}



function bulk_delete(){
    if(document.querySelectorAll('.check-input-single')){
        let idsArray = [];
    
        document.querySelectorAll('.check-input-single').forEach(function(input) {
        if (input.checked) {
            idsArray.push(input.value);
        }
        input.onclick = function() {
                const valueToRemove = input.value;
                const index = idsArray.indexOf(valueToRemove);
                if (index > -1) {
                idsArray.splice(index, 1);
                } else if (input.checked) {
                idsArray.push(input.value);
                }
            };
        });
        
        $.ajax({
            url: '/bulk_delete',
            type: 'POST',
            dataType: 'json',
            data: {
              ids: idsArray,
              "_token": $('#token').val()
            },
            success: function(data) {
              if (data.success) {
                document.querySelectorAll('.form-check-input').forEach(checkbox => {
                    checkbox.checked = false;
                });
                const messageContainer = document.createElement('div');
                messageContainer.classList.add('alert', 'alert-success');
                messageContainer.textContent = data.message; 
          
                const targetElement = document.querySelector('.container-fluid.pt-4.px-4'); 
                targetElement.insertBefore(messageContainer, targetElement.firstChild);
          
                idsArray.forEach(function(id) {
                  ref = document.querySelector('[value="' + id + '"]');
                  ref.closest('tr').remove();
                });
              } else {
                console.error(data.message); 
              }
            }
          });
          
    }
    
}