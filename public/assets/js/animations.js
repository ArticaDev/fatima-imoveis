$(function(){

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
  //color navbar change
var tela = window.innerWidth
  $(window).scroll(function(){
    if ($(window).scrollTop() > 10) {
               $(".navbar").addClass("active")

       } else {
              $(".navbar").removeClass("active")
       }
  })


  $(".search").click(function(){
    $("#searchbar").slideToggle()
    if (tela>1199){
      $(".deskslider").fadeToggle("slow")} })

  $(".nav .nav-link").on("click", function(){
     $(".nav").find(".active").removeClass("active")
     $(this).addClass("active")
  });



  $(".home").click(function(){
    $("#searchbar").slideUp()
    if (tela>1199){
      $(".deskslider").fadeIn("slow")}
    $("html, body").animate({ scrollTop: 0}, "slow")
    $(".nav").find(".active").removeClass("active")
    $(".home").addClass("active")
  })

  $("#imoveis").click(function(){
$("html, body").animate({ scrollTop:0}, "slow")
  })

  $("#contato").click(function(){
$("html, body").animate({ scrollTop: $(document).height() }, "slow")
  })


  window.garage = '';
  window.recreation = '';

$(".search-btn-pool").click(function(){
$(this).toggleClass("white");
recreation = 1;
})

$(".search-btn-car").click(function(){
$(this).toggleClass("white");
garage=1;
})

$('#emailIcon').click(function() {
       var input = document.createElement('input');
       input.setAttribute('value', 'fatima.llima@hotmail.com');
       document.body.appendChild(input);
       input.select();
       document.execCommand('copy');
       document.body.removeChild(input);

       $('#emailIcon[data-toggle="tooltip"]').attr('data-original-title', "Email copiado !")
       .tooltip('dispose')
       .tooltip('show');

     })


})




    /*
  $("#seta").toggleClass("fa fa-arrow-down")
    $("#seta").toggleClass("fa fa-arrow-up")})

    var tela = window.innerWidth

    if (tela>768){
      $("#nav-desk").show()
      $("#nav-mob").hide()
    }
    else{
      $("#nav-desk").hide()
      $("#nav-mob").show()  */
