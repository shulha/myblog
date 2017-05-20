@extends('layout.main')

@section('content')
    <h2>Товары</h2>
        <ul>
            <li><a href="{{route('last_product')}}">Последние добавленные</a></li>
            <li><a href="{{route('create_product')}}">Добавить товар</a></li>
        </ul>
    <h2>Категории</h2>
        <ul>
            <li><a href="{{route('all_categories')}}">Все категории</a></li>
            <li><a href="{{route('create_category')}}">Добавить категорию</a></li>
        </ul>
    <h2>Параметры</h2>
        <ul>
            {{--<li><a href="{{route('all_parameters')}}">Все параметры</a></li>--}}
        </ul>
    <h2>Страницы</h2>
        <ul>
            <li><a href="#">Все страницы</a></li>
            <li><a href="#">Добавить страницу</a></li>
        </ul>
@stop