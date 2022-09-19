@extends('layouts.app')
@section('title-block')
{{$category_name}}
@endsection
@section('content')
    <h1>{{$category_name}}</h1>
    <table class="table mb-5">
        @foreach($subcategories as $subcategory)
        @php
            $id = $subcategory->subcategory_id;
            break;
        @endphp
        @endforeach
        @for($i = 0; $i < count($subcategories);$i++)
            @if ($i % 3 == 0)
                     <thead>
                     <tr class="row">
                     </tr>
                     </thead>
            @endif
                <th class="col-3 text-center">
                    <img id="img_category" src="/upload/subcategory_images/{{$subcategories[$id-1]->img}}" alt=" ">
                    <br><a class="nav-link text-dark" href="{{route('subcategory_id',["id" => $subcategories[$id-1]->subcategory_id])}}">{{$subcategories[$id-1]->subcategory_name}}</a>
                </th>
                    @php $id++ @endphp
        @endfor
    </table>
@endsection
