$(document).ready(function() {
    $('#lat li:has(ul)').click(function(e){
         if($(this).hasClass('activado')){
            $(this).removeClass('activado');
            $(this).children('ul').slideUp();
         }else{
            $('#lat li ul').slideUp();
            $('#lat li').removeClass('activado');
            $(this).addClass('activado');
            $(this).children('ul').slideDown();
         }
    });
});