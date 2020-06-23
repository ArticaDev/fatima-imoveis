<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fátima Imóveis</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/Social-Icons.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- Start: Navbar - XL -->
    <div id="nav-desk" style="display:none;">
      <div class="row" style="margin-bottom:15px;">
          <div class="col" style="display: flex;justify-content: center;"><img src="assets/img/Prancheta%202%20cópia%2014.png" style="margin: 1vh 0;width: 400px;"></div>
      </div>
      <div class="row" style="height: 66px;background-color: #9b1519;">
          <div class="col" style="height: 66px;"></div>
          <div class="col" style="height: 66px;display: flex;justify-content: center;align-items: center;">
              <a href="#">
                  <h3 style="color: rgb(255,255,255);font-family: Roboto;margin-bottom: 0px;">Home</h3>
              </a>
              <a href="#" style="margin: 0px 20px;">
                  <h3 style="color: rgb(255,255,255);font-family: Roboto;margin-bottom: 0px;">Imóveis</h3>
              </a>
              <a href="#">
                  <h3 style="color: rgb(255,255,255);font-family: Roboto;margin-bottom: 0px;">Contato</h3>
              </a>
          </div>
          <div class="col" style="height: 66px;display: flex;align-items: center;justify-content: flex-end;">
              <a  class="search" href="#" style="margin: 0px 20px;">
                  <h3 style="color: rgb(255,255,255);font-family: Roboto;margin-bottom: 0px;margin-right: 0px;margin-left: 0px;">Pesquisa<i id="seta" class="fa fa-arrow-down" style="color: rgb(255,255,255);margin-right: 0px;margin-left: 10px;font-size: 20px;"></i></h3>
              </a>
          </div>
      </div>

    </div>

    <div id="nav-mob" style="display:none;">
    <nav class="navbar navbar-light navbar-expand-md sticky-top shadow" style="background-color: #f1f1f1;">
        <div class="container-fluid"><a class="navbar-brand" href="#"><img src="assets/img/Prancheta%202%20cópia%2014.png" style="width: 180px;" /></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon" style="background-image:'assets\img\Hamburguer Button.svg'"></span></button>
            <div
                class="collapse navbar-collapse d-md-flex justify-content-md-end" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Imóveis</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Contato</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link search" href="#">Pesquisar</a></li>
                </ul>
        </div>
        </div>

    </nav>
      </div>

    <!-- End: Navbar - XL -->
    <div id="searchbar" class="row" style="background-color: #9b1519; display: none;">
        <div class="col-xl-2 d-flex justify-content-center align-items-center first-selector"><select style="width: 100%;height: 30px;"><option value="12" selected>Localização</option><option value="13">This is item 2</option><option value="14">This is item 3</option></select></div>
        <div class="col-xl-2 d-flex justify-content-center align-items-center"><select style="width: 100%;height: 30px;"><option value="12" selected>Quartos</option><option value="13">1</option><option value="14">2</option><option value="15">3</option><option value>4+</option></select></div>
        <div class="col-xl-2 d-flex justify-content-center align-items-center"><select style="width: 100%;height: 30px;"><option value="12" selected>Banheiros</option><option value="13">1</option><option value="14">2</option><option value="15">3+</option></select></div>
        <div class="col d-flex justify-content-center align-items-center"><input type="text" style="width: 100%;height: 30px;" placeholder="Valor Máx." /></div>
        <div class="col d-flex justify-content-center align-items-center"><input type="text" style="width: 100%;" placeholder="Valor Mín." /></div>
        <div class="col d-flext justify-content-end align-items-center"><button class="btn border rounded shadow" type="button" style="background-color: #ffffff;width: 90%;margin-top: 5%;margin-bottom: 5%;margin-right:10%;">Pesquisar</button></div>
    </div>
