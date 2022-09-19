@extends('layouts.app')
@section('title-block')
    {{$subcategory_name}}
@endsection
@section('content')
    <h1>{{$subcategory_name}}</h1>
    <table class="table mb-5">
        @foreach($subsubcategories as $subsubcategory)
            @php
                $id = $subsubcategory->subsubcategory_id;
                break;
            @endphp
        @endforeach
        @for($i = 0; $i < count($subsubcategories);$i++)
            @if ($i % 4 == 0)
                <thead>
                <tr class="row">
                </tr>
                </thead>
            @endif
            <th class="col-3 text-center">
                <img id="img_category" src="/upload/subsubcategory_images/{{$subsubcategories[$id-1]->img}}" alt=" ">
                <br><a class="nav-link text-dark"
                       href="">{{$subsubcategories[$id-1]->subsubcategory_name}}</a>
            </th>
            @php $id++ @endphp
        @endfor
    </table>
@endsection
