@extends('layouts.master')

@section('title','Корзина')

@section('content')

    <h1>Корзина</h1>
    <p>Оформление заказа</p>
    <div class="panel">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Стоимость</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($order))
                @foreach($order->products as $product)
                    @include('templates.card-basket')
                @endforeach
            @else
                <p>Нет товаров в корзине</p>
            @endif


            <tr>
                <td colspan="3">Общая стоимость:</td>
                @if(!empty($order))
                    <td>{{$order->totalPrice()}} ₽</td>
                @else
                    <td>0 ₽</td>
                @endif
            </tr>
            </tbody>
        </table>
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{route('basket-order')}}">Оформить заказ</a>
        </div>
    </div>

@endsection
