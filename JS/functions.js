$(document).ready(function() {
    
    $("#show_password").click(function(){
        if($(this).prop("checked")) {
            $("#password").attr("type", "text");
        } else {
            $("#password").attr("type", "password");
        }
    });

});