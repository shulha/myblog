@extends('layout.main')

@section('contentCatalog')
    @include('partials.carousel')

    @if(!empty($categories))
    <div class="row" data-columns>
        @foreach($categories as $category)
            <div class="col-sm-4" style="margin-bottom:20px;">
            <a href="/category/{{$category->id}}"  class="thumbnail1 text-center" style="display:block;">
					<span style="width:200px; height:200px; overflow:hidden; margin:0 auto; display: inline-block; vertical-align: middle;">
						<img style="vertical-align: middle; max-height: 200px; display:inline;" src="http://placehold.it/200x200" title={{$category->name}}/>
					</span>
                <span style="height:38px; display:block;"><h3>{{$category->name}}</h3></span>
            </a>
            </div>
        @endforeach
    </div>

    @else
    <p class="alert alert-danger">
        Sorry, there are nothing to display yet...
    </p>
    @endif

@stop