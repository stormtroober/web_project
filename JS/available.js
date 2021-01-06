$(document).ready(function() {
    let spans = $('.available');
    let notAvailable = false;
    spans.each(function() {
        console.log("a");
        if(parseInt($(this).text()) > 0){
            if(parseInt($(this).text()) == 1){
                $(this).text("Only 1 left!");
                $(this).css("color", "green");
            }
            else{
                if(parseInt($(this).text()) == 2){
                    $(this).text("Only 2 left!");
                    $(this).css("color", "green");
                }
                else{
                    $(this).text("Available");
                    $(this).css("color", "green"); 
                }
            }
             
        }
        else{
            $(this).text("Not Available");
            $(this).css("color", "red");
            notAvailable = true;
        }
    })
});