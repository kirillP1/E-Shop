@extends('layouts.master')

@section('title')
    @if(isset($product))
        {{ $product->name}}
    @endif
@endsection

@section('content')

    <h1>{{$product->name}}</h1>
    <h2>{{$product->category->name}}</h2>
    <p>Цена: <b>{{$product->price}} ₽</b></p>
    <img alt="{{$product->name}}" src="@isset($product->image)
    {{\Illuminate\Support\Facades\Storage::url($product->image)}}
    @else
        http://internet-shop.tmweb.ru/storage/products/{{$product->code}}.jpg
                         @endisset}}.jpg">
    <p>{{$product->description}}</p>


    @if($product->isAvailable())
        <form action="{{route('basket-add', $product->id)}}" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
        </form>
        @csrf
    @else
        <p>Товар не доступен</p>
        <span>Сообщить мне, когда товар появится в наличии: </span>
        <div class="warning">
            @if($errors->get('email'))
                {!! $errors->get('email')[0] !!}
            @endif
        </div>
        <form action="{{route('subscription', $product->id)}}" method="POST">
            <input type="text" name="email">
            <button type="submit">Отправить</button>
            @csrf
        </form>
    @endif
@endsection

