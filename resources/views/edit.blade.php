@extends('layouts.edit')
@section('content')
<div class="container">
    <!-- Start: Slider -->

    <!-- End: Slider -->
    <!-- Start: Card Group -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row justify-content-center">

                                <a class="btn btn-success" href="{{ route('admin.create') }}">Adicionar nova</a>

    </div>
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
                            
                            <form action="{{ route('admin.destroy',$house->id) }}" method="POST">
                                <a class="btn btn-info ml-1" href="{{ route('admin.edit',$house->id) }}">Editar</a>
                                {{-- <a class="btn btn-danger ml-1" href="{{ route('admin.destroy',$house->id) }}">Excluir</a> --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-1">Excluir</button>

                            </form>
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

        $('.display-price').priceFormat({
            prefix: 'R$ ',
            centsSeparator: ',',
            thousandsSeparator: '.'
        });

        $('.carousel-item').first().addClass("active");


    });

</script>

@endsection
