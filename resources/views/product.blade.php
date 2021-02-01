@extends('layouts.master')

@section('title','iPhone X 64GB')

@section('content')

<div class="container">
    <div class="starter-template">
        <h1>iPhone X 64GB</h1>
        <h2>Мобильные телефоны</h2>
        <h3>{{$product}}</h3>
        <p>Цена: <b>71990 ₽</b></p>
        <img alt="iphone" src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
        <p>Отличный продвинутый телефон с памятью на 64 gb</p>

        <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
            <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>

            <input type="hidden" name="_token" value="UmLkczUeWhLgp7mwVr9FnPBKzWfm9evokBe4dn0x">        </form>
    </div>
</div>
@endsection

