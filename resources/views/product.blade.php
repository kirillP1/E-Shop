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
    <img alt="{{$product->name}}" src="http://internet-shop.tmweb.ru/storage/products/{{$product->code}}.jpg">
    <p>{{$product->description}}</p>

    <form action="http://internet-shop.tmweb.ru/basket/add/{{$product->id}}" method="POST">
        <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

        <input type="hidden" name="_token" value="UmLkczUeWhLgp7mwVr9FnPBKzWfm9evokBe4dn0x">
    </form>

@endsection

