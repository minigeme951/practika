@extends('layouts.app')

@section('content')
    <div class="container">
    <h2 class="d-flex justify-content-center">О нас</h2>
    <h3 class="d-flex justify-content-center">Дивиз компании</h3>
    <h2 class="d-flex justify-content-center">Наши новинки</h2>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner justify-content-center">
            @foreach($prod as $obprod)
                @if($loop->first)
                    <div class="carousel-item active">
                        @else
                            <div class="carousel-item">
                                @endif
                                <img src="{{url('img')}}/{{$obprod->img_url}}" class="d-block    carousel-img"
                                     alt="...">
                                <p class="d-flex justify-content-around">{{$obprod->name}}</p>
                            </div>

                            @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Предыдущий</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Следующий</span>
                    </button>
        </div>
    </div>
@endsection
