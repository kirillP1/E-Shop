@extends('layouts.master-admin')

@section('title', 'Категория: '.$category->name)

@section('content')
    <div class="col-md-12">
        <h1>Категория {{$category->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Название en</td>
                <td>{{ $category->name_en }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Описание en</td>
                <td>{{ $category->description_en }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="@isset($category->image)
                    {{\Illuminate\Support\Facades\Storage::url($category->image)}}
                    @else
                        http://internet-shop.tmweb.ru/storage/categories/{{$category->code}}.jpg
                         @endisset"
                         height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
