$(function(){
  $("#search").click(function(){
    $("#searchbar").slideToggle();
    $(".deskslider").fadeToggle("slow");
    $("#seta").toggleClass("fa fa-arrow-down")
    $("#seta").toggleClass("fa fa-arrow-up")
})

})
