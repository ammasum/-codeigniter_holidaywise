

$(document).ready(function () {
    $('#post_content').summernote({
        placeholder: 'Type Your Details',
        tabsize: 2,
        height: 100
    });
    
    $('#postcreate').submit(function( event ){
        if($('#post_content').val().length > 0){
            $(this).submit();
        }else{
            event.preventDefault();
        }
    });

    $('#postDeleteButton').click(function(){
        deleteId = $(this).attr('data-id');
    });

    $('#confirmDeletePost').click(function(){
        let delete_url = baseUrl + 'admin/delete_post/';
        window.location.href = delete_url + deleteId;
    });
});