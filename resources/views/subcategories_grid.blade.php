@extends('layouts.app')
@section('title-block')
{{$category_name}}
@endsection
@section('content')
    <h1>{{$category_name}}</h1>
    <table class="table">
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
                    <img id="img_category" src="/storage/img/subcategories/{{$subcategories[$id-1]->img}}" alt=" ">
                    <br>{{$subcategories[$id-1]->subcategory_name}}
                </th>
                    @php $id++ @endphp
        @endfor
    </table>
@endsection
