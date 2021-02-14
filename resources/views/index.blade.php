@extends('layouts.master')

@section('title', 'Список товаров')

@section('content')

    <h1>Все товары</h1>
    @include('templates.form-search')
    <div class="row">
        @foreach($products as $product)
            @include('templates.card', compact('product'))
        @endforeach
    </div>
    {{$products->links()}}

@endsection
