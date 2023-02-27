@extends('layouts.app')

@section('content')
    <h1 class="d-flex justify-content-center">Каталог</h1>
    <div class="filter"></div>
    <div class="order"></div>
    <div class="list">
        @foreach($prod as $obprod)
            <div class="card d-flex" style="width: 18rem;">
                <img src="{{$obprod->img_url}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$obprod->name}}</h5>
                    <p class="card-text">Цена:{{$obprod->price}}руб</p>
                    <a href="#" class="btn btn-primary">купить</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
