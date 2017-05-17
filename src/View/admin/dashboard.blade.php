@extends('layout.admin')

@section('content')
    <h2>Товары</h2>
        <ul>
            {{--<li><a href="/adminzone/articles">Все статьи</a></li>--}}
            <li><a href="/adminzone/articles/create">Добавить товар</a></li>
        </ul>
    <h2>Категории</h2>
        <ul>
            <li><a href="/adminzone/categories">Все категории</a></li>
            <li><a href="/adminzone/categories/create">Добавить категорию</a></li>
        </ul>
    <h2>Комментарии</h2>
        <ul>
            <li><a href="/adminzone/comments">Все комментарии</a></li>
        </ul>
    <h2>Страницы</h2>
        <ul>
            <li><a href="#">Все страницы</a></li>
            <li><a href="#">Добавить категорию</a></li>
        </ul>
@stop