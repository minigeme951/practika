@extends('layouts.app')

@section('content')
    <h1 class="d-flex justify-content-center">Каталог</h1>
    <div class="btn-group">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Фильтры
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                @foreach($cat as $obcat)
                    <li><a class="dropdown-item" href="{{url('/catalog/filter')}}/{{$obcat->id}}">{{$obcat->name}}</a>
                    </li>
                @endforeach
                <li><a class="dropdown-item" href="{{'/Catalog'}}">сборосить фильтр</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Сортировка по
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <li><a class="dropdown-item" href="{{url('/catalog/filter')}}/{{$obcat->id}}">{{$obcat->name}}</a>
                </li>
                <li><a class="dropdown-item" href="{{url('/catalog')}}">сборосить фильтр</a></li>
            </ul>
        </div>

    </div>

    <div class="list">
        <div class="row">
            @foreach($prod as $obprod)
                <div class="col-md-2">
                    <div class="card d-flex" style="width: 18rem;">
                        <img src="{{$obprod->img_url}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$obprod->name}}</h5>
                            <p class="card-text">Цена:{{$obprod->price}}руб</p>
                            <a href="#" class="btn btn-primary">купить</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
