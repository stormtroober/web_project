$(document).ready(function() {
    console.log(document.location.pathname);
    $("#search").addClass("invisible");
    if (document.location.pathname == "/ProgettoWeb/web_project/php/category_page.php") {
        $("#search").removeClass("invisible");
    }
});