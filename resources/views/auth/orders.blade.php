@extends('layouts.master-admin')

@section('title', 'Заказы')

@section('content')
    <div class="col-md-12">
        <h1>Заказы</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Телефон</th>
                <th scope="col">Когда отправлен</th>
                <th scope="col">Сумма</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->created_at->format('H:m d/m/Y')}}</td>
                    <td>{{$order->totalPrice()}} ₽</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="/" class="btn btn-success" type="button">Открыть</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
