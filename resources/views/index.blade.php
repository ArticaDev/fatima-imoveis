@extends('layouts.default')
@section('content')
<div class="container" style="min-height:62.5vh;">
    <!-- Start: Slider -->
    @isset($new_houses)

    <div class="row deskslider" style="margin-top: 5vh;">
        <div class="col">
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    @foreach($new_houses as $new_house)
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-xl-4 d-flex flex-column justify-content-xl-center align-items-xl-center"
                                    style="margin-left: 10vw;padding: 0px;"><img
                                        src="{{ 'images/'.$new_house->image->first()->filename }}" style="width: 394px; height:272px;">
                                </div>
                                <div class="col" style="margin-right: 10vw;">
                                    <div
                                        class="row d-xl-flex flex-column justify-content-xl-center align-items-xl-center">
                                        <div class="col d-xl-flex justify-content-xl-center">
                                          <h2 class="text-center"style="color: #9b1519;font-weight: 300; margin-bottom:5%;">{{ $new_house->title }}</h2>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 3%;">
                                        <div class="col d-xl-flex justify-content-xl-center align-items-xl-center"><i
                                                class="las la-home"
                                                style="font-size: 30px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                            <h5>{{ $new_house->address->first()->bairro }}</h5>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 3%;">

                                        <div class="col d-xl-flex justify-content-xl-center"><i class="la la-bed"
                                                style="font-size: 30px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                            <h5>{{ $new_house->rooms }} Quartos</h5>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 3%;">
                                        <div class="col d-xl-flex justify-content-xl-center"><i class="las la-toilet"
                                                style="font-size: 30px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                            <h5>{{ $new_house->bathrooms }} Banheiros</h5>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0%;">
                                        <div class="col d-flex justify-content-center"><button onclick="location.href='{{ route('casas.show',$new_house->id) }}';" class="btn btn-primary"
                                                type="button"
                                                style="font-size: 22px;background-color: rgb(155,21,25);width: 70%;"><i
                                                    class="las la-wallet" style="margin-right:3%"></i>
                                                <h5 class="display-price" style="  display: inline;
                              ">{{ number_format($new_house->price, 2, '.', '') }}</h5>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div>
                    <!-- Start: Previous --><a class="carousel-control-prev" href="#carousel-1" role="button"
                        data-slide="prev"><span class="carousel-control-prev-icon"
                            style="background-image: url(&quot;assets/img/Rectangle%2032.png&quot;);"></span><span
                            class="sr-only">Previous</span></a>
                    <!-- End: Previous -->
                    <!-- Start: Next --><a class="carousel-control-next" href="#carousel-1" role="button"
                        data-slide="next"><span class="carousel-control-next-icon"
                            style="background-image: url(&quot;assets/img/Rectangle%2031.png&quot;);"></span><span
                            class="sr-only">Next</span></a>
                    <!-- End: Next -->
                </div>
            </div>
        </div>
    </div>
    @endisset
    @isset($error)
    <div class="alert alert-danger">
        <p>{{ $error }}</p>
    </div>
    @endisset
    <!-- End: Slider -->
    <!-- Start: Card Group -->
    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3" style="margin-top: 5vh;">
        @foreach($houses as $house)
            <div class="col" style="margin-bottom:3%">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <div class="simple-slider card-img-top">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">

                                @foreach($house->image as $image)
                                    @if($loop->index < 3)
                                        <div class="swiper-slide"
                                            style="background-image:url({{ asset('images/'.$image->filename) }}); height:226px;">
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev" style="background-image: url(assets/img/Rectangle%2032.png)">
                            </div>
                            <div class="swiper-button-next" style="background-image: url(assets/img/Rectangle%2031.png)">
                            </div>
                        </div>

                    <!-- Card content -->
                    <div class="card-body">

                        <div class="col" style="margin-right: 10vw;">
                            <div class="row d-flex flex-column justify-content-center align-items-center">
                                <div class="col d-flex justify-content-center align-items-center">
                                    <h4 class="text-center" style="color: #9b1519; margin-bottom:8%;">{{ $house->title }}</h4>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 5%;">
                                <div class="col d-flex justify-content-center align-items-center"><i class="las la-home"
                                        style="font-size: 26px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                    <h6>{{ $house->address->first()->bairro }}</h6>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom: 3%;">
                                <div class="col d-flex justify-content-center"><i class="la la-bed"
                                        style="font-size: 26px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                    <h5 class="text-center">{{ $house->rooms." ".Illuminate\Support\Str::of('Quarto')->plural($house->rooms) }}</h5>
                                </div>
                            </div>

                            @if($house->garage==1)

                                <div class="row" style="margin-bottom: 3%;">
                                    <div class="col d-flex justify-content-center"><i class="la la-car"
                                            style="font-size: 26px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                        <h5 class="text-center">Com Garagem</h5>
                                    </div>
                                </div>

                            @elseif($house->recreation==1)
                                <div class="row" style="margin-bottom: 3%;">
                                    <div class="col d-flex justify-content-center"><i class="las la-table-tennis" style="font-size: 26px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                        <h5 class="text-center">Área de Lazer</h5>
                                    </div>
                                </div>

                            @else
                                <div class="row" style="margin-bottom: 3%;">
                                    <div class="col d-flex justify-content-center"><i class="las la-toilet" style="font-size: 26px;margin-right: 5%;color: rgb(0,0,0);"></i>
                                        <h5 class="text-center">{{ $house->bathrooms." ".Illuminate\Support\Str::of('Banheiro')->plural($house->bathrooms) }}</h5>
                                    </div>
                                </div>

                            @endif


                            <div class="row" style="margin-bottom: 0%;">
                                <div class="col d-flex justify-content-center"><button onclick="location.href='{{ route('casas.show',$house->id) }}';" class="btn btn-primary" type="button"
                                        style="font-size: 22px;background-color: rgb(155,21,25);width: 100%;"><i
                                            class="las la-wallet" style="margin-right:3%"></i>
                                        <h5 class="display-price" style="  display: inline;
                ">{{ number_format($house->price, 2, '.', '') }}</h5>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
        </div>

        {{ $houses->links() }}

    </div>

    <!-- End: Card Group -->



<script type="text/javascript">
    $(function () {


        $('.carousel-item').first().addClass("active");


    });

</script>

@endsection
