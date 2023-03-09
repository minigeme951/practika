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
                    <div class="col">{{$item->pro->name}}</div>
                    <div class="col">{{$item->count}}</div>
                    <div class="col">
                    <a  href="{{url('cart/remove')}}/{{$item->id}}" class="btn btn-danger">Удалить</a>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>



    <table>
        <thead>
        <tr>
            <th>Название продукта</th>
            <th>Цена</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

    @foreach ($cart_items as $item)

        <tr>
            <td>{{ $item->pro->name }}</td>
            <td>{{ $item->pro->price }}</td>
            <td><a  href="{{url('cart/remove')}}/{{$item->id}}">Удалить</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection
