<aside class="aside p-3">
    <div class="aside__top">
        <img src="{{ asset('images/logo_dashboard.png') }}" alt="Logo">
    </div>
    <div class="aside__hr"><hr></div>
    <div class="aside__nav">
        <nav>
            <a href="{{ route('dashboard.index') }}" class="{{ (request()->segment(2) == '') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                Tela inicial
            </a>
            @if( auth()->user()->admin )
                <a href="{{ route('dashboard.gerenciar') }}" class="{{ (request()->segment(2) == 'gerenciar') ? 'active' : '' }}">
                    <i class="fa-solid fa-desktop"></i>
                    Gerenciar site
                </a>
            @endif
            @if( auth()->user()->admin )
                <a href="{{ route('dashboard.usuarios') }}" class="{{ (request()->segment(2) == 'usuarios') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    Usuários
                </a>
            @endif
        </nav>
    </div>
    <div class="aside__hr"><hr></div>
    <div class="aside__bot">
        <div class="aside__user">
            {{ auth()->user()->name }}
        </div>
        @if( auth()->user()->admin )
            <div class="aside__adm">
                Admnistrador
            </div>
        @endif
        <a href="{{ route('logout') }}" class="aside__logout pt-2 d-block">
            <i class="fa-solid fa-right-from-bracket"></i>
            Sair
        </a>
    </div>
</aside>