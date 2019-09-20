$('#post_content').summernote({
    placeholder: 'Hello bootstrap 4',
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