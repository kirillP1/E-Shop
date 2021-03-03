<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('product*', 'index')>
                    <a href="{{route('index')}}">@lang('main.menu.all')</a>
                </li>

                <li @routeactive('categor*')>
                    <a href="{{route('categories')}}">@lang('main.menu.categories')</a>
                </li>
                <li @routeactive('basket*')>
                    <a href="{{route('basket')}}">@lang('main.menu.basket')</a>
                </li>
                <li><a href="{{route('reset_db')}}">@lang('main.menu.initial')</a></li>
                <li><a href="{{route('locale', __('main.menu.language'))}}">@lang('main.menu.language')</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">{{App\Services\CurrencyConversion::getCurrencySymbol()}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach(App\Services\CurrencyConversion::getCurrencies() as $currency)
                            <li><a href="{{ route('currency', $currency->code)}}">{{$currency->symbol}}</a></li>
                        @endforeach
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
