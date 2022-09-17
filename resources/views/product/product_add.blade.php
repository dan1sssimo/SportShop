@extends('layouts.app')
@section('title-block')
    Додавання продуктів
@endsection
@section('content')
    <body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="#" class="auth-logo">
                                <img src="{{asset('logo/logo.png')}}" width="75px">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Додати товар</b></h4>

                    <div class="p-3">

                        <form class="form-horizontal mt-3" method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Назва
                                    продукту</label>
                                <div class="col-sm-10">
                                    <input name="product_name" class="form-control" type="text"
                                           placeholder="Гантеля"
                                           value="dasdasdasdsa" id="product_name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input"
                                       class="col-sm-2 col-form-label">Кількість продуктів</label>
                                <div class="col-sm-10">
                                    <input name="product_count" class="form-control" type="number"
                                           placeholder="100"
                                           value="22" id="product_count">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input"
                                       class="col-sm-2 col-form-label">Ціна продукту</label>
                                <div class="col-sm-10">
                                    <input name="product_price" class="form-control" type="text"
                                           placeholder="499.99"
                                           value="dsadasdsa" id="product_price">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input"
                                       class="col-sm-2 col-form-label">Опис продукту</label>
                                <div class="col-sm-10">
                                    <input name="product_description" class="form-control" type="text"
                                           placeholder="Виготовлена з нержавіючої сталі"
                                           value="sdadsaddsa" id="product_description">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input"
                                       class="col-sm-2 col-form-label">Характеристика продукту</label>
                                <div class="col-sm-10">
                                    <input name="product_character" class="form-control" type="text"
                                           placeholder="Вага: 5 кг. Колір: білий."
                                           value="dsaddsads" id="product_character">
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
                                <label for="subcategory"></label>
                                <select class="form-control" id="subcategory" style="display: none">
                                    <option>Виберіть категорію</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label></label>
                                <select class="form-control" id="subsubcategory" style="display: none"
                                        name="subsubcategory">
                                    <option>Виберіть категорію</option>
                                </select>
                            </div>


                            <div class="row mb-3">
                                <label for="example-text-input"
                                       class="col-sm-2 col-form-label">Зображення продукту</label>
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
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{asset('backend/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('backend/assets/js/app.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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
            console.log(category_id);
            console.log(token);

            $.ajax({
                url: "{{ route('product.subcategory') }}",
                method: 'POST',
                data: {category_id: category_id, _token: token},
                success: function (data) {
                    $("#subcategory").html('');
                    $("#subcategory").html(data.options);
                    $("#subcategory").css("display", "inherit");
                    $("#subsubcategory").css("display", "none");
                }
            });
        });
    </script>

    <script type="text/javascript">
        $("#subcategory").change(function () {
            var subcategory_id = $(this).val();
            var token = $("input[name='_token']").val();
            console.log(subcategory_id);
            console.log(token);

            $.ajax({
                url: "{{ route('product.subsubcategory') }}",
                method: 'POST',
                data: {subcategory_id: subcategory_id, _token: token},
                success: function (data) {
                    $("#subsubcategory").html('');
                    $("#subsubcategory").html(data.options);
                    $("#subsubcategory").css("display", "inherit");
                }
            });
        });
    </script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
        @endif
    </script>
@endsection
