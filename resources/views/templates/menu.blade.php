<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ \Illuminate\Support\Facades\Request::is('/') || \Illuminate\Support\Facades\Request::is('product/*') ? 'active' : '' }}"><a href="{{route('index')}}">Все товары</a></li>

                <li class="{{ \Illuminate\Support\Facades\Request::is('categories') || \Illuminate\Support\Facades\Request::is('category/*') ? 'active' : '' }}"><a href="{{route('categories')}}">Категории</a>
                </li>
                <li class="{{ \Illuminate\Support\Facades\Request::is('basket') || \Illuminate\Support\Facades\Request::is('basket/*') ? 'active' : '' }}"><a href="{{route('basket')}}">В корзину</a></li>
                <li><a href="{{route('index')}}">Сбросить проект в начальное состояние</a></li>
                <li><a href="http://internet-shop.tmweb.ru/locale/en">en</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">₽<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="http://internet-shop.tmweb.ru/login">Войти</a></li>

            </ul>
        </div>
    </div>
</nav>
