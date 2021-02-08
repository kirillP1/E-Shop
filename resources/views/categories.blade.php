@extends('layouts.master')

@section('title','Категории')

@section('content')

    @foreach($categories as $category)
        <div class="panel">
            <a href="{{route('category', $category->code)}}">
                <img alt="mobile"
                     src="@isset($category->image)
                     {{\Illuminate\Support\Facades\Storage::url($category->image)}}
                     @else
                         http://internet-shop.tmweb.ru/storage/categories/{{$category->code}}.jpg
                         @endisset
                         " height="40px">
                <h2>{{$category->name}}</h2>
            </a>
            <p>
                {{$category->description}}
            </p>
        </div>
    @endforeach

@endsection
