@extends('layouts.master')

@section('title', 'Категория: ' . $category->name)

@section('content')
<div class="container">
    <div class="starter-template">
        <h1>
            {{$category->name}}
        </h1>
        <p>
            {{$category->description}}
        </p>
        <div class="row">
            @include('templates.card', ['category' => $category])
        </div>
    </div>
</div>
@endsection
