@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-around">

            <div class="col-4">
                @foreach($prod as $obprod)
                    <img class="h-100 w-100" src="{{url('/img')}}/{{$obprod->img_url}}" alt="">
                @endforeach
            </div>
            <div class="col-4">
                @foreach($prod as $obprod)
                    <h2>{{$obprod->name}}</h2>
                    <h2>Цена: {{$obprod->price}}рублей.</h2>
                    @if (auth()->check())
                    @if($obprod->count>0)
                        <a href="{{Route('cartAdd', $obprod->id) }}" class="btn btn-primary">Добавить в корзину</a>
                    @else
                        <a class="btn btn-primary disabled" href="">НЕТ В НАЛИЧИИ</a>
                    @endif
                    @else
                        <a href="{{url('/login')}}"class="btn btn-info">Авторизируйтесь</a>
                    @endif
                @endforeach
                <h3>Характеристики</h3>
                <h4>Дата производства: {{$obprod->year_of_production}}</h4>
                <h4>Страна производитель: {{$obprod->country_of_origin}}</h4>
                <h4>Модель:{{$obprod->model}}</h4>
                @if($obprod->count>0)
                    <p>В наличии: {{$obprod->count}}</p>
                @else
                    <p>Нет в наличии</p>
                @endif
            </div>
        </div>
    </div>
@endsection
