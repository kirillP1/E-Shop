<nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{route('index')}}">
            Вернуться на сайт
        </a>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Зарегистрироваться</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
