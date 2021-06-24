<nav class="navbar-wrapper">
    <ul class="nav-list">
        <li>
            <a href="">
                O nas
            </a>
        </li>
        <li>
            <a href="">
                Oferta
            </a>
        </li>
        <li>
            <a href="/">
                {{ config('app.name') }}
            </a>
        </li>
        <li>
            <a href="">
                Atrakcje
            </a>
        </li>
        <li>
            <a href="">
                Kontakt
            </a>
        </li>
    </ul>
</nav>
<a href="#" class="toggle-button">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</a>

<div class="">
    @auth
    <p>Zalogowano jako {{ auth()->user()->email }}</p>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endauth
    @guest
        <a href="{{  route('login') }}">Zaloguj</a>
        <a href="{{  route('register') }}">Zarejestruj</a>
    @endguest

</div>