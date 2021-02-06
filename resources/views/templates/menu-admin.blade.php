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
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                Администратор
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout')}}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout')}}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endguest
            </ul>

        </div>
    </div>
</nav>
