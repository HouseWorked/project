$('.comment_lent').hide();
$(document).on('click', '.btn_comment_event', function(e){
    e.preventDefault();
    var id = $(this).attr('id');
    $('.id_'+id).toggle();
});