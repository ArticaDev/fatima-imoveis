<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Fátima Corretora</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{ asset('assets/css/Footer-Clean.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/Simple-Slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/Social-Icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-price-format/2.2.0/jquery.priceformat.min.js"></script>
    <script src="{{ asset('assets/js/Simple-Slider.js') }}"></script>
    <script src="{{ asset('assets/js/animations.js') }}"></script>

</head>

<body>
    <div class="sticky-top">
        <!-- Start: Header - Mobile -->
        <nav class="navbar navbar-light navbar-expand-md" style="background-color: #f1f1f1;">
            <div class="container-fluid"><a class="navbar-brand" href="{{ route('casas.index') }}"><img class="home"
                        src="{{ asset('assets/img/Prancheta%202%20cópia%2014.png') }}" style="width: 180px;"></a><button
                    data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle
                        navigation</span><span class="navbar-toggler-icon"
                        style="background-image: url(&quot;{{ asset('assets/img/Hamburguer%20Button.svg') }}&quot;);"></span></button>
                <div class="collapse navbar-collapse d-md-flex justify-content-md-end" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li class="nav-item" role="presentation"><a class="nav-link active home"
                                href="{{ route('casas.index') }}">Home</a></li>
                        <li class="nav-item" role="presentation"><a id="imoveis" class="nav-link search"
                                href="#">Imóveis</a></li>
                        <li class="nav-item" role="presentation"><a id="contato" class="nav-link" href="#">Contato</a>
                        </li>
                        <li class="nav-item" role="presentation"><a class="nav-link btn"><i
                                    class="las la-search search"></i></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End: Header - Mobile -->
        <!-- Start: Search -->
        
<section class="searchbar">
    <div class="container ">
        <div class="row d-flex justify-content-center align-items-center" style="background-color: #9b1519; height: 100%; padding-top: 5px;">
            <div class="hide" style="display: contents;">
            <div class="col-xl-2 d-xl-flex align-items-xl-center"><select id="rooms" style="width: 100%;height: 30px;"><option value="1" selected>Quartos</option><option value="2">1</option><option value="3">2</option><option value="15">3</option><option value>4+</option></select></div>
            <div class="col-xl-2 d-xl-flex align-items-xl-center"><select id="bathrooms" style="width: 100%;height: 30px;"><option value="1" selected>Banheiros</option><option value="2">1</option><option value="3">2</option><option value="15">3+</option></select></div></div> 
            <div class="col d-xl-flex align-items-xl-center"><select id="categories" style="width: 100%;height: 30px;"><option value="1" selected>Casa</option><option value="2">Apartamento</option><option value="3">Lotes/Terrenos</option></select></div>
            <div class="col-xl-2 d-flex justify-content-xl-center align-items-xl-center"><input id="bairro" style="width: 100%;height: 30px;" type="text"
                placeholder="Bairro"></div>
            <div class="col d-xl-flex align-items-xl-center"><input class="display-price" id="price" type="text" style="width: 100%;height: 30px;" placeholder="Valor Máx." /></div>
            <div class="col d-xl-flex align-items-xl-center"><input id="meters" type="text" style="width: 100%;" placeholder="0 m²" /></div>
        </div>
        <div class="row d-flex justify-content-center align-items-center" style="background-color: #9b1519;height: 54px;">
            <div class="col-xl-2 "><button id="search-btn" class="btn border rounded shadow" type="button" style="background-color: #ffffff;width: 100%;margin-top: 8px;margin-bottom: 5%;">Pesquisar</button></div>
        </div>
    </div>
</section>

        <!-- End: Search -->
    </div>
    @yield('content')
    <!-- Start: Footer -->
    <div class="mt-5 social-icons"
        style="background-color: rgb(155,21,25);height: 200px;margin-top: 0%; width:100%!important;">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center" style="padding:0px;">
                <a href="https://www.instagram.com/fatima.lima.imoveis/"><i class="icon ion-social-instagram-outline"
                        style="color: rgb(255,255,255);"></i></a><i data-toggle="tooltip" data-placement="top"
                    title="Copiar email" id="emailIcon" class="icon ion-email"
                    style="color: rgb(255,255,255); cursor:pointer;"></i><a
                    href="https://www.facebook.com/profile.php?id=100051747426880"><i class="icon ion-social-facebook"
                        style="color: rgb(255,255,255);"></i></a>
                <a
                    href="https://api.whatsapp.com/send?phone=5517981093483&text=Ol%C3%A1!%20Eu%20tenho%20interesse%20em%20comprar%20uma%20casa!"><i
                        class="icon ion-social-whatsapp-outline" style="color: rgb(255,255,255);"></i></a><a
                    style="width: 80px;height: 60px;" href="https://www.olx.com.br/perfil/fatima-lima-2a1d3396"><img
                        src="{{ asset('assets/img/olx_logo_freelogovectors.net_-white.png') }}"
                        style="width: 60px;" /></a></div>
        </div>
        <a style="text-decoration:none;" href="https://articadev.com">
            <p style="margin-top: 3vh;color: rgb(255,255,255);font-size: 1.25em;">Desenvolvido por Artica</p>
        </a>
    </div>
    <!-- End: Footer -->

    <script type="text/javascript">
    $(function() {

        $('.display-price').priceFormat({
            prefix: 'R$ ',
            centsSeparator: ',',
            thousandsSeparator: '.'
        });

        $('#meters').priceFormat({
            prefix: '',
            suffix: ' m²'
        });

        $('#search-btn').click(function() {

            window.location.href =
                `{{url("pesquisar")}}?bairro=${$( "#bairro" ).val()}&rooms=${$( "#rooms" ).val()}&bathrooms=${$( "#bathrooms" ).val()}&price=${$( "#price" ).val()}&garage=${garage}&recreation=${recreation}`;
        });


    });
    </script>


</body>



</html>
