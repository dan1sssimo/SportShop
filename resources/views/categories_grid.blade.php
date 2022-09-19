@extends('layouts.app')
@section('title-block')
    Каталог
@endsection
@section('content')
    <h1>Каталог</h1>
    <table class="table">
        @foreach($categories as $category)
            @php
                $id = $category->category_id;
                break;
            @endphp
        @endforeach
        @for($i = 0; $i < count($categories);$i++)
            @if ($i % 3 == 0)
                <thead>
                <tr class="row">
                </tr>
                </thead>
            @endif
            <th class="col-3 text-center">
<<<<<<< HEAD
                <img id="img_category" src="/storage/img/categories/{{$categories[$id-1]->img}}" alt=" ">
                <br><a class="nav-link" href="{{route('category_id',["id" => $categories[$id-1]->category_id])}}">{{$categories[$id-1]->category_name}}</a>
=======
                <img id="img_category" src="/upload/category_images/{{$categories[$id-1]->img}}" alt=" ">
                <br><a class="nav-link text-dark" href="{{route('category_id',["id" => $categories[$id-1]->category_id])}}">{{$categories[$id-1]->category_name}}</a>
>>>>>>> main
            </th>
            @php $id++ @endphp
        @endfor
    </table>
@endsection
