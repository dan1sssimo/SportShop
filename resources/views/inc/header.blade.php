<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">SportShop</span>
        </a>
        <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('home') }}">Головна</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('contact') }}">Контакти</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('about') }}">Про нас</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('login') }}">Вхід</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('register') }}">Реєстрація</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('dashboard') }}">Особистий кабінет</a>
        </nav>
</div>
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-responsive-nav-link :href="route('logout')"
                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-responsive-nav-link>
</form>
