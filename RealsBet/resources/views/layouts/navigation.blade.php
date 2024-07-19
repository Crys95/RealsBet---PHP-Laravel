<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <!-- Link duplicado removido -->
            </ul>

            <div class="d-flex">
                @if (Auth::check())
                    <span class="navbar-text mr-3">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Deslogar</button>
                    </form>
                @else
                    <span class="navbar-text text-warning">Usuário não autenticado</span>
                @endif
            </div>
        </div>
    </div>
</nav>
