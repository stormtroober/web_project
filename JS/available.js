$(document).ready(function() {
    let spans = jQuery("[id=available]");
    spans.each(function() {
        if(parseInt($(this).text()) > 0){
            $(this).text("Disponibile");
            $(this).css("color", "green");  
        }
        else{
            $(this).text("Non Disponibile");
            $(this).css("color", "red");
        }
    })
});