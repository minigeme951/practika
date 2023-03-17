@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-mb-8"></div>
            <div class="card">
                <div class="card-header ">Отказано в доступе</div>
                <div class="card-body">
                    <div class="row justify-content-center">У вас не достаточно прав доступа к данной странице</div>
                    <div class="row"><a href="{{url('/')}}" class="btn btn-danger">Вернуться на главную страницу</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
