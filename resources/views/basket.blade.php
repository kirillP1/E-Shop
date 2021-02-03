@extends('layouts.master')

@section('title','Корзина')

@section('content')
    <div class="container">
        <div class="starter-template">
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
                    @php
                        $totalPrice = 0
                    @endphp
                    @if(!empty($order))
                        @foreach($order->products as $product)
                            @include('templates.card-basket')
                            @php
                                $totalPrice = $totalPrice + $product->price
                            @endphp
                        @endforeach
                    @else
                        <p>Нет товаров в корзине</p>
                    @endif


                    <tr>
                        <td colspan="3">Общая стоимость:</td>
                        <td>{{$totalPrice}} ₽</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href="{{route('order')}}">Оформить заказ</a>
                </div>
            </div>
        </div>
    </div>
@endsection
