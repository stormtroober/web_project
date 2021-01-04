$(document).ready(function() {
    $('.dropdown-toggle').dropdown();
    $('#order').hide();
    $("#search").addClass("invisible");
    let path = document.location.pathname;
    let page = path.split("/").pop();
    if (page == "category_page.php") {
        $("#search").removeClass("invisible");
        $('#order').show();
    }
});