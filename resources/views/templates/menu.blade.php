<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('product*', 'index')>
                    <a href="{{route('index')}}">Все товары</a>
                </li>

                <li @routeactive('categor*')>
                    <a href="{{route('categories')}}">Категории</a>
                </li>
                <li @routeactive('basket*')>
                    <a href="{{route('basket')}}">В корзину</a>
                </li>
                <li><a href="{{route('reset_db')}}">Сбросить проект в начальное состояние</a></li>
                <li><a href="http://internet-shop.tmweb.ru/locale/en">en</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">₽<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/USD">$</a></li>
                        <li><a href="http://internet-shop.tmweb.ru/currency/EUR">€</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{route('login')}}">Войти</a></li>
                @else
                    @admin
                    <li><a href="{{route('home')}}">Панель администратора</a></li>
                    @else
                        <li><a href="{{route('person.orders.index')}}">Мои заказы</a></li>
                        @endadmin

                        <li><a href="{{route('logout')}}">Выйти</a></li>
                    @endguest

            </ul>
        </div>
    </div>
</nav>
