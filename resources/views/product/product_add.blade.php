@extends('layouts.app')
@section('title-block')
    Додавання продуктів
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Додавання продуктів</h4>
                            <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">product_name</label>
                                    <div class="col-sm-10">
                                        <input name="product_name" class="form-control" type="text"
                                               placeholder="Artisanal kale"
                                               value="" id="product_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input"
                                           class="col-sm-2 col-form-label">product_count</label>
                                    <div class="col-sm-10">
                                        <input name="product_count" class="form-control" type="number"
                                               placeholder="Artisanal kale"
                                               value="" id="product_count">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input"
                                           class="col-sm-2 col-form-label">product_price</label>
                                    <div class="col-sm-10">
                                        <input name="product_price" class="form-control" type="text"
                                               placeholder="Artisanal kale"
                                               value="" id="product_price">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input"
                                           class="col-sm-2 col-form-label">product_description</label>
                                    <div class="col-sm-10">
                                        <input name="product_description" class="form-control" type="text"
                                               placeholder="Artisanal kale"
                                               value="" id="product_description">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input"
                                           class="col-sm-2 col-form-label">product_character</label>
                                    <div class="col-sm-10">
                                        <input name="product_character" class="form-control" type="text"
                                               placeholder="Artisanal kale"
                                               value="" id="product_character">
                                    </div>
                                </div>





                                <div class="form-group">
                                    <label for="category">Виберіть категорію: </label>
                                    <select class="form-control" id="category">
                                        <option>Виберіть категорію</option>
                                        @foreach($categories as $category)
                                            <option
                                                value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="subcategory">Виберіть підкатегорію</label>
                                    <select class="form-control" id="subcategory">
                                        <option></option>
                                    </select>
                                </div>




                                <div class="row mb-3">
                                    <label for="example-text-input"
                                           class="col-sm-2 col-form-label">product_image</label>
                                    <div class="col-sm-10">
                                        <input name="product_image" class="form-control" type="file"
                                               placeholder="Artisanal kale"
                                               id="image">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-xl"
                                             src="{{url('upload/no_image.jpg')  }}"
                                             alt="Card image cap">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info waves-effect waves-light"
                                       value="Додати продукт">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    <script type="text/javascript">
        $("#category").change(function () {
            var category_id = $(this).val();
            var token = $("input[name='_token']").val();

            $.ajax({
                url: "{{ route('product.store') }}",
                method: 'POST',
                data: {category_id: category_id, _token: token},
                success: function (data) {
                    $("#subcategory").html('');
                    $("#subcategory").html(data.options);
                }
            });
        });
    </script>
@endsection
