@extends('layout.main')

@section('content')

    <?php if(!empty($categories)): ?>
    <?php foreach($categories as $category): ?>
    <p>
        <a href="/category/{{$category->id}}">
            {{ $category->name }}
        </a>
    </p>
    <?php endforeach; ?>
    <?php else: ?>
    <p class="alert alert-danger">
        Sorry, there are nothing to display yet...
    </p>
    <?php endif; ?>

@stop