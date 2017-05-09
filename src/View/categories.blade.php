@extends('layout')

@section('content')

    <?php if(!empty($categories)): ?>
    <?php foreach($categories as $cat): ?>
    <p>
        <a href="/category/{{$cat->id}}">
            {{ $cat->name }}
        </a>
    </p>
    <?php endforeach; ?>
    <?php else: ?>
    <p class="uk-alert uk-alert-primary">
        Sorry, there are nothing to display yet...
    </p>
    <?php endif; ?>

@stop