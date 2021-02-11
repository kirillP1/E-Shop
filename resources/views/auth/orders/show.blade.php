@extends('layouts.master-admin')

@section('title', 'Заказ' . $order->id)

@section('content')
    <div class="justify-content-center">
        <div class="panel">
            <h1>Заказ №{{ $order->id }}</h1>
            <p>Заказчик: <b>{{ $order->name }}</b></p>
            <p>Номер теелфона: <b>{{ $order->phone }}</b></p>
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
                @foreach ($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('product', $product) }}">
                                <img height="56px"
                                     src="@isset($product->image)
                                     {{\Illuminate\Support\Facades\Storage::url($product->image)}}
                                     @else
                                         http://internet-shop.tmweb.ru/storage/products/{{$product->code}}.jpg
                         @endisset">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td><span class="badge">{{$product->pivot->count}}</span></td>
                        <td>{{ $product->price }} руб.</td>
                        <td>{{ $product->getPriceForCount()}} руб.</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Общая стоимость:</td>
                    <td>{{ $order->totalPrice() }} руб.</td>
                </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>
@endsection
