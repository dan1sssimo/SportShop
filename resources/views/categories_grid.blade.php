@extends('layouts.app')
@section('title-block')
    Каталог
@endsection
@section('content')
    <h1>Каталог</h1>
    <table class="table">
        @php
            $id = $categories[0]->category_id;
        @endphp
        @for($i = 0; $i < count($categories);$i++)
            @if ($i % 3 == 0)
                <thead>
                <tr class="row">
                </tr>
                </thead>
            @endif
            <th class="col-3 text-center">
                <img id="img_category" src="/upload/category_images/{{$categories[$id-1]->img}}" alt=" ">
                <br><a class="nav-link text-dark"
                       href="{{route('category_id',["id" => $categories[$id-1]->category_id])}}">{{$categories[$id-1]->category_name}}</a>
            </th>
            @php $id++ @endphp
        @endfor
    </table>
@endsection
