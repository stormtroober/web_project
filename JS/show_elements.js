$(document).ready(function() {
    $('.dropdown-toggle').dropdown();
    $('#order').hide();
    $("#search").addClass("invisible");
    if (document.location.pathname == "/ProgettoWeb/web_project/php/category_page.php") {
        $("#search").removeClass("invisible");
        $('#order').show();
    }
});