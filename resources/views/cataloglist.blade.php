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
                <li><a class="dropdown-item" href="{{url('/catalog')}}">сборосить фильтр</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Сортировка
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                <li><a class="dropdown-item" href="{{url('/catalog/sort')}}/id/desc"/>от недавно добавленных к
                    старым</a>
                </li>
                <li><a class="dropdown-item" href="{{url('/catalog/sort')}}/id/asc"/>от старых к недавно добавленым</a>
                </li>
                <li><a class="dropdown-item" href="{{url('/catalog/sort')}}/price/asc"/>от дешевых к дорогим</a>
                </li>
                <li><a class="dropdown-item" href="{{url('/catalog/sort')}}/price/desc"/>от дорогих к дешевым</a>
                </li>
                <li><a class="dropdown-item" href="{{url('/catalog/sort')}}/year_of_production/desc"/>от недавно
                    вышедшим к старым</a>
                </li>
                <li><a class="dropdown-item" href="{{url('/catalog/sort')}}/year_of_production/asc"/>от старых к недавно
                    вышедшим</a>
                </li>
                <li><a class="dropdown-item" href="{{url('/catalog')}}">сборосить фильтр</a></li>
            </ul>
        </div>

    </div>

    <div class="list">
        <div class="row">
            @foreach($prod as $obprod)
                <div class="col-md-2">
                    <div class="card h-100 d-flex" style="width: 18rem;">
                        <img src="{{url('/img')}}/{{$obprod->img_url}}" class="card-img-top h-75 " alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$obprod->name}}</h5>
                            <p class="card-text">Цена:{{$obprod->price}}руб</p>
                            <div class="btn-group">
                            <a href="{{url('/catalog/product')}}/{{$obprod->id}}" class="btn btn-primary">Подробнее</a>
                                @if (auth()->check())
                                    @if($obprod->count>0)
                                        <a href="{{Route('cartAdd', $obprod->id) }}" class="btn btn-primary">Добавить в корзину</a>
                                    @else
                                        <a class="btn btn-primary disabled" href="">НЕТ В НАЛИЧИИ</a>
                                    @endif
                                @else
                                    <a href="{{url('/login')}}"class="btn btn-info">Авторизируйтесь</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
