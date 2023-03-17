@extends('layouts.app')
@section('content')
    <div class="container">


    <h1 class="d-flex justify-content-center">Корзина пользователя: {{\Illuminate\Support\Facades\Auth::user()->name}}</h1>
        <div class="cart">
            <div class="card-header">
                <div class="row">
                    <div class="col">название товара</div>
                    <div class="col">количество товара</div>
                    <div class="col">Удалить товар из корзинны</div>
                </div>
            </div>
            <div class="card-body">
                @foreach($cart_items as $item)
                <div class="row">
                    <div class="col">{{$item->prod->name}}</div>
                    <div class="col"><div class="btn-group">
                            <form action="{{ route('cartUpadate', $item->id) }}" method="POST">
                                @csrf
                                <div>
                                    <button type="submit" name="count" class="btn btn-danger" value="{{ $item->count - 1 }}">-</button>
                                    <span>{{ $item->count }}</span>
                                    <button type="submit" class="btn btn-success" name="count" value="{{ $item->count + 1 }}">+</button>
                                </div>
                            </form>
                        </div></div>
                    <div class="col">


                    <a  href="{{url('cart/remove')}}/{{$item->id}}" class="btn btn-danger">Удалить</a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>





@endsection
