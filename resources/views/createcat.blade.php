@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-mb-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="d-flex justify-content-center">Создание категории</h2>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('createcat')}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-form-label col-md-4 text-mb-end">Название категории</label>
                                <div class="col-md-6">
                                    <input class="form-control" id="name" type="text" name="name" required autofocus>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Создать категорию') }}
                                    </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
