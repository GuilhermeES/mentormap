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
            <a href="{{ route('dashboard.testes') }}" class="{{ (request()->segment(2) == 'testes') ? 'active' : '' }}">
                <i class="fa-solid fa-clipboard"></i>
                Meus testes
            </a>
            @if( auth()->user()->admin )
                <a href="{{ route('dashboard.gerenciar') }}" class="{{ (request()->segment(2) == 'gerenciar') ? 'active' : '' }}">
                    <i class="fa-solid fa-desktop"></i>
                    Gerenciar site
                </a>
            @endif
            @if( auth()->user()->admin )
                <a href="{{ route('dashboard.gerenciar-testes') }}" class="{{ (request()->segment(2) == 'gerenciar-testes') ? 'active' : '' }}">
                    <i class="fa-solid fa-clipboard"></i>
                    Gerenciar testes
                </a>
            @endif
            @if( auth()->user()->admin )
                <a href="{{ route('dashboard.gerenciar-resultados') }}" class="{{ (request()->segment(2) == 'gerenciar-resultados') ? 'active' : '' }}">
                    <i class="fa-solid fa-clipboard"></i>
                    Gerenciar Resultados
                </a>
            @endif
            @if( auth()->user()->admin )
                <a href="{{ route('dashboard.usuarios') }}" class="{{ (request()->segment(2) == 'usuarios') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    Usuários
                </a>
            @endif
                <a href="{{ route('dashboard.perfil') }}" class="{{ (request()->segment(2) == 'perfil') ? 'active' : '' }}">
                    <i class="fa-solid fa-user"></i>
                    Meus dados
                </a>
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