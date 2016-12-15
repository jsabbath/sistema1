$(document).ready(function() {
    $('#l2 li:has(ul)').click(function(e){
         if($(this).hasClass('activado')){
            $(this).removeClass('activado');
            $(this).children('ul').slideUp();
         }else{
            $('#l2 li ul').slideUp();
            $('#l2 li').removeClass('activado');
            $(this).addClass('activado');
            $(this).children('ul').slideDown();
         }
    });
});