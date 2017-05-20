@extends('layout.main')

@section('content')
    <div class="row masonry" data-columns>
        @foreach($products as $product)
            <div class="col-md-3">
                <div class="thumbnail">
                    <img height=100 src="{{explode(';',$product->preview)[0]}}" alt="">
                    <div class="caption">
                        <h3>{{$product->title}}</h3>
                        <p>Цена:<span class="price"> {{$product->price}}</span> USD</p>
                        <p>
                            @if($product->selected)
                                <a href="#" class="btn btn-primary buy-btn" id="{{$product->id}}" role="button">Купить</a>
                            @endif
                            <a href="/product/show/{{$product->id}}" class="btn btn-default" role="button">Подробнее</a>
                            <div class="btn-group">
                                <a href="/adminzone/products/edit/{{$product->id}}" class="btn btn-warning" role="button">Редактировать</a>
                                <span class="btn btn-danger del_product" id="{{$product->id}}" role="button">Удалить</span>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection