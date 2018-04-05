$(document).ready(function(){
    $('.mpopup').magnificPopup({
        type: 'inline',
        modal: true
    });
});
$(document).off('click', '.left_nav');
$(document).on('click', '.left_nav', function(e){
    $('.left_nav').removeClass('active');
    $(this).addClass('active');
});
$(document).on('click', '.popup-modal-dismiss', function(e) {
    e.preventDefault();
    $.magnificPopup.close();
    $('.left_nav').removeClass('active');
    $('.left_nav').blur();
});
$(function () {
    var location = window.location.href;
    var cur_url = '/' + location.split('/').pop();

    $('#left_nav').each(function () {
        var link = $(this).find('a').attr('href');

        if (cur_url == link)
        {
            $(this).addClass('active');
        }
    });
});