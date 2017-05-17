@extends('layout.admin')

@section('content')
    <form method="POST" action="{{route('store_category')}}"/>
        Название категории<br>
        <p><input type="text" name="name"/></p>
        Родительская категория<br>
        <p><select size="1" name="parent_id">
            <option disabled>Выберите родительскую категорию</option>
            <option selected value="0">Нет категории</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
        </select></p>
        {{--<input type="hidden" name="_token" value="{{csrf_token()}}"/>--}}
        <p><input type="submit" value="Сохранить"></p>
    </form>
@endsection