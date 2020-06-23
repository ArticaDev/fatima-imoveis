$(function(){
  $(".search").click(function(){
    $("#searchbar").slideToggle()
    $(".deskslider").fadeToggle("slow")
    $("#seta").toggleClass("fa fa-arrow-down")
    $("#seta").toggleClass("fa fa-arrow-up")})

    var tela = window.innerWidth

    if (tela>768){
      $("#nav-desk").show()
      $("#nav-mob").hide()
    }
    else{
      $("#nav-desk").hide()
      $("#nav-mob").show()
    }

  })
