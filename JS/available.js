$(document).ready(function() {
    let text = $("#available").text();
    if(parseInt(text) == 0){
        $("#available").text("Disponibile");
        $("#available").css("color", "green");  
    }
    else{
        $("#available").text("Non Disponibile");
        $("#available").css("color", "red");
    }
});