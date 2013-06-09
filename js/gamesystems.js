$(function() {

    $(".icon_delete").click(function(){
        if (confirm('Are you sure?')) {
            $(this).closest('.identitylist').remove();
            $.get("/d20/gamesystem/delete/" + $(this).attr('data-id') );
        }
    }); 

});
