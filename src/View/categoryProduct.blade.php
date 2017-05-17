@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="thumbnail">
                    <img height=100 src="{{explode(';',$product->preview)[0]}}" alt="">
                    <div class="caption">
                        <h3>{{$product->title}}</h3>
                        <p>Цена:<span class="price">{{$product->price}}</span> USD</p>
                        <p>
                            @if(!$product->selected)
                                <a href="#" class="btn btn-primary buy-btn" id="{{$product->id}}" role="button">Купить</a>
                            @endif
                            <a href="/show/{{$product->id}}" class="btn btn-default" role="button">Подробнее</a>
                            <div class="btn-group">
                                <a href="#" class="btn btn-warning" role="button">Редактировать</a>
                                <a href="#" class="btn btn-danger" role="button">Удалить</a>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection