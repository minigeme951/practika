@extends('layouts.app')
@section('content')
    <div class="container">


    <h1 class="d-flex justify-content-center">Корзина</h1>
        <div class="cart">
            <div class="card-header">
                <div class="row">
                    <div class="col">название</div>
                    <div class="col">количество</div>
                    <div class="col">Удалить</div>
                </div>
            </div>
            <div class="card-body">
                @foreach($cart_items as $item)
                <div class="row">
                    <div class="col">{{$item->prod->name}}</div>
                    <div class="col">{{$item->count}}</div>
                    <div class="btn-group">
                        <form action="{{ route('cartUpadate', $item->id) }}" method="POST">
                            @csrf
                            <div>
                                <button type="submit" name="count" class="btn btn-danger" value="{{ $item->count - 1 }}">-</button>
                                <span>{{ $item->quantity }}</span>
                                <button type="submit" class="btn btn-success" name="count" value="{{ $item->count + 1 }}">+</button>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                    <a  href="{{url('cart/remove')}}/{{$item->id}}" class="btn btn-danger">Удалить</a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>





@endsection
