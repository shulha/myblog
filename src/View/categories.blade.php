@extends('layout.main')

@section('content')

    <?php if(!empty($categories)): ?>
    <div class="col-xs-3">
        <ul class="nav nav-pills nav-stacked">
        <?php foreach($categories as $category): ?>
        <p>
            <li><a href="/category/{{$category->id}}">
                {{ $category->name }}
            </a></li>
        </p>
        <?php endforeach; ?>
        </ul>
    </div>

    <?php else: ?>
    <p class="alert alert-danger">
        Sorry, there are nothing to display yet...
    </p>
    <?php endif; ?>

@stop