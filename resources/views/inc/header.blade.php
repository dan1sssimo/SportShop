<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
<<<<<<< HEAD
        <a class="navbar-brand" href="{{route("home")}}">SportShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
=======
        <a class="navbar-brand text-dark" href="{{route("home")}}">SportShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
>>>>>>> main
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
<<<<<<< HEAD
                    <a class="nav-link active1" href="{{route('category_all')}}">
=======
                    <a class="nav-link active1 text-dark" href="{{route('category_all')}}">
>>>>>>> main
                        Каталог
                    </a>
                    <ul class="submenu">
                        @foreach(\App\Models\Category::all() as $category)
<<<<<<< HEAD
                            <li class="submenu-link"><a class="nav-link" href="{{route('category_id',["id" => $category->category_id])}}" role="button">{{$category->category_name}}</a>
                                <ul class="submenu">
                                    @foreach(\App\Models\SubCategory::all()->where("category_id", $category->category_id) as $subcategory)
                                        <li class="submenu-link"><a class="nav-link" href="{{route('subcategory_id',["id" => $category->category_id])}}" role="button">{{$subcategory->subcategory_name}}</a>
                                        <ul class="submenu">
                                            @foreach(\App\Models\SubSubCategory::all()->where("subcategory_id", $subcategory->subcategory_id) as $subsubcategory)
                                                <li><a class="nav-link" href="#">{{$subsubcategory->subsubcategory_name}}</a></li>
                                            @endforeach
                                        </ul>
=======
                            <li class="submenu-link"><a class="nav-link"
                                                        href="{{route('category_id',["id" => $category->category_id])}}"
                                                        role="button">{{$category->category_name}}</a>
                                <ul class="submenu">
                                    @foreach(\App\Models\Subcategories::all()->where("category_id", $category->category_id) as $subcategory)
                                        <li class="submenu-link"><a class="nav-link"
                                                                    href="{{route('subcategory_id',["id" => $category->category_id])}}"
                                                                    role="button">{{$subcategory->subcategory_name}}</a>
                                            <ul class="submenu">
                                                @foreach(\App\Models\Subsubcategories::all()->where("subcategory_id", $subcategory->subcategory_id) as $subsubcategory)
                                                    <li><a class="nav-link"
                                                           href="#">{{$subsubcategory->subsubcategory_name}}</a></li>
                                                @endforeach
                                            </ul>
>>>>>>> main
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-dark" aria-current="page" href="{{ route('contact') }}">Контакти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="{{ route('about') }}">Про нас</a>
                </li>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </ul>
<<<<<<< HEAD
            <div class="nav-item">
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('login') }}">Вхід</a>
            </div>
            <div class="nav-item">
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('register') }}">Реєстрація</a>
            </div>
            <div class="nav-item">
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('dashboard') }}">Особистий кабінет</a>
<<<<<<< HEAD
=======
            @if(empty(Auth::user()))
            <div class="nav-item">
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('login') }}">Вхід</a>
            </div>
            <div class="nav-item">
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('register') }}">Реєстрація</a>
            </div>
            @endif
            <div class="nav-item">
                <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('dashboard') }}">Особистий
                    кабінет</a>
>>>>>>> main
            </div>
        </div>
    </div>
</nav>


<<<<<<< HEAD
=======
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('product.add') }}">Додати товар</a>
        </nav>
</div>
>>>>>>> origin/prelast
=======
>>>>>>> main
