@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-around">

            <div class="col-4">
                @foreach($prod as $obprod)
                    <img class="h-50" src="{{$obprod->img_url}}" alt="">
                @endforeach
            </div>
            <div class="col-4">
                @foreach($prod as $obprod)
                    <h2>{{$obprod->name}}</h2>
                    <h2>Цена: {{$obprod->price}}рублей.</h2>
                    @if($obprod->count>0)
                        <a href="" class="btn btn-primary">В карзину</a>
                    @else
                        <a class="btn btn-primary disabled" href="">НЕТ В НАЛИЧИИ</a>
                    @endif
                @endforeach
                <h3>Характеристики</h3>
                <p>Дата производства: {{$obprod->year_of_production}}</p>
                <p>Страна производитель: {{$obprod->country_of_origin}}</p>
                <p>Модель:{{$obprod->model}}</p>
                @if($obprod->count>0)
                    <p>В наличии: {{$obprod->count}}</p>
                @else
                    <p>Нет в наличии</p>
                @endif
            </div>
        </div>
    </div>
@endsection
