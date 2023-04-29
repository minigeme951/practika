@extends('layouts.app')
@section('content')
    <div class="container">


        <h1 class="d-flex justify-content-center">Корзина
            пользователя: {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
        <div class="cart">
            <div class="card-header">
                <div class="row">
                    <div class="col">название товара</div>
                    <div class="col d-flex justify-content-center">количество товара</div>
                    <div class="col">Цена за еденицу товара</div>
                    <div class="col">Цена за товар</div>
                    <div class="col d-flex justify-content-center">Удалить товар из корзинны</div>
                </div>
            </div>
            <div class="card-body">
                @foreach($cart_items as $item)
                    <div class="row">
                        <div class="col">{{$item->prod->name}}</div>
                        <div class="col d-flex justify-content-center">
                            <div class="btn-group">
                                <form action="{{ route('cartUpadate', $item->id) }}" method="POST">
                                    @csrf
                                    <div>
                                        <button type="submit" name="count" class="btn btn-danger"
                                                value="{{ $item->count - 1 }}">-
                                        </button>
                                        <span>{{ $item->count }}</span>
                                        <button type="submit" class="btn btn-success" name="count"
                                                value="{{ $item->count + 1 }}">+
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col">{{$item->prod->price}}</div>
                        <div class="col">{{$item->prod->price* $item->count}}</div>
                        <div class="col d-flex justify-content-center">


                            <a href="{{url('cart/remove')}}/{{$item->id}}" class="btn btn-danger">Удалить</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="row">
            <form action="">

              <button class="btn-success btn">Сформироввать заказ</button>
            </form>


        </div>
    </div>

@endsection
